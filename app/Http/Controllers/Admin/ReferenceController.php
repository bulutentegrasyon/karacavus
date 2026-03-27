<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::orderBy('order')->paginate(20);
        return view('admin.references.index', compact('references'));
    }

    public function create()
    {
        return view('admin.references.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'work_type'   => 'nullable|string|max:100',
            'quantity'    => 'nullable|string|max:100',
            'status'      => 'required|in:tamamlanan,devam_eden',
            'company'     => 'nullable|string|max:255',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:4096',
            'gallery.*'   => 'nullable|image|max:4096',
            'order'       => 'nullable|integer|min:0',
            'is_active'   => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['slug']      = $this->uniqueSlug($data['name']);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('references', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('references/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        Reference::create($data);

        return redirect()->route('admin.references.index')->with('success', 'Referans oluşturuldu.');
    }

    public function edit(Reference $reference)
    {
        return view('admin.references.edit', compact('reference'));
    }

    public function update(Request $request, Reference $reference)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'work_type'   => 'nullable|string|max:100',
            'quantity'    => 'nullable|string|max:100',
            'status'      => 'required|in:tamamlanan,devam_eden',
            'company'     => 'nullable|string|max:255',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:4096',
            'gallery.*'   => 'nullable|image|max:4096',
            'order'       => 'nullable|integer|min:0',
            'is_active'   => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            if ($reference->cover_image && !str_starts_with($reference->cover_image, 'assets/')) {
                Storage::disk('public')->delete($reference->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('references', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($reference->gallery) {
                foreach ($reference->gallery as $old) {
                    if (!str_starts_with($old, 'assets/')) {
                        Storage::disk('public')->delete($old);
                    }
                }
            }
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('references/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        $reference->update($data);

        return redirect()->route('admin.references.index')->with('success', 'Referans güncellendi.');
    }

    public function destroy(Reference $reference)
    {
        if ($reference->cover_image && !str_starts_with($reference->cover_image, 'assets/')) {
            Storage::disk('public')->delete($reference->cover_image);
        }
        if ($reference->gallery) {
            foreach ($reference->gallery as $img) {
                if (!str_starts_with($img, 'assets/')) {
                    Storage::disk('public')->delete($img);
                }
            }
        }
        $reference->delete();

        return redirect()->route('admin.references.index')->with('success', 'Referans silindi.');
    }

    private function uniqueSlug(string $name): string
    {
        $base = Str::slug(Str::limit($name, 60));
        $slug = $base;
        $i    = 1;
        while (Reference::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}
