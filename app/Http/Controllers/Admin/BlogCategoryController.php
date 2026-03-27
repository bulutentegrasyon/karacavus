<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::withCount('posts')->latest()->paginate(20);
        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100',
            'is_active' => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');

        BlogCategory::create($data);

        return redirect()->route('admin.blog-categories.index')->with('success', 'Kategori oluşturuldu.');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100',
            'is_active' => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');

        $blogCategory->update($data);

        return redirect()->route('admin.blog-categories.index')->with('success', 'Kategori güncellendi.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return redirect()->route('admin.blog-categories.index')->with('success', 'Kategori silindi.');
    }
}
