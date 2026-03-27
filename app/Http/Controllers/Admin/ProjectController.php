<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'category'         => 'nullable|string|max:100',
            'client'           => 'nullable|string|max:100',
            'location'         => 'nullable|string|max:100',
            'year'             => 'nullable|digits:4',
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'cover_image'      => 'nullable|image|max:4096',
            'gallery.*'        => 'nullable|image|max:4096',
            'is_featured'      => 'boolean',
            'is_active'        => 'boolean',
            'order'            => 'nullable|integer|min:0',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:320',
            'meta_keywords'    => 'nullable|string|max:255',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('projects/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Proje oluşturuldu.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'category'         => 'nullable|string|max:100',
            'client'           => 'nullable|string|max:100',
            'location'         => 'nullable|string|max:100',
            'year'             => 'nullable|digits:4',
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'cover_image'      => 'nullable|image|max:4096',
            'gallery.*'        => 'nullable|image|max:4096',
            'is_featured'      => 'boolean',
            'is_active'        => 'boolean',
            'order'            => 'nullable|integer|min:0',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:320',
            'meta_keywords'    => 'nullable|string|max:255',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($project->gallery) {
                foreach ($project->gallery as $old) {
                    Storage::disk('public')->delete($old);
                }
            }
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('projects/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Proje güncellendi.');
    }

    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }
        if ($project->gallery) {
            foreach ($project->gallery as $img) {
                Storage::disk('public')->delete($img);
            }
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Proje silindi.');
    }
}
