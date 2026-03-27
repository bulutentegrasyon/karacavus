<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->orderBy('id')->paginate(20);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'author_name'    => 'required|string|max:255',
            'author_company' => 'nullable|string|max:255',
            'content'        => 'required|string',
            'rating'         => 'required|integer|min:1|max:5',
            'order'          => 'nullable|integer|min:0',
            'is_active'      => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Yorum eklendi.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'author_name'    => 'required|string|max:255',
            'author_company' => 'nullable|string|max:255',
            'content'        => 'required|string',
            'rating'         => 'required|integer|min:1|max:5',
            'order'          => 'nullable|integer|min:0',
            'is_active'      => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Yorum güncellendi.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Yorum silindi.');
    }
}
