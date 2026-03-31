<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'icon'             => 'nullable|string|max:100',
            'cover_image'      => 'nullable|image|max:2048',
            'sector'           => 'nullable|string|max:255',
            'company'          => 'nullable|string|max:255',
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'features'         => 'nullable|array',
            'features.*'       => 'string|max:255',
            'order'            => 'nullable|integer|min:0',
            'is_active'        => 'boolean',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:320',
            'meta_keywords'    => 'nullable|string|max:255',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['features']  = array_values(array_filter($request->input('features', [])));

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Hizmet oluşturuldu.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'icon'             => 'nullable|string|max:100',
            'cover_image'      => 'nullable|image|max:2048',
            'sector'           => 'nullable|string|max:255',
            'company'          => 'nullable|string|max:255',
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'features'         => 'nullable|array',
            'features.*'       => 'string|max:255',
            'order'            => 'nullable|integer|min:0',
            'is_active'        => 'boolean',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:320',
            'meta_keywords'    => 'nullable|string|max:255',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['features']  = array_values(array_filter($request->input('features', [])));

        if ($request->hasFile('cover_image')) {
            if ($service->cover_image && !str_starts_with($service->cover_image, 'assets/')) {
                Storage::disk('public')->delete($service->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Hizmet güncellendi.');
    }

    public function destroy(Service $service)
    {
        if ($service->cover_image && !str_starts_with($service->cover_image, 'assets/')) {
            Storage::disk('public')->delete($service->cover_image);
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Hizmet silindi.');
    }
}
