<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'author')
            ->latest()
            ->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::active()->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'cover_image'      => 'nullable|image|max:2048',
            'is_featured'      => 'boolean',
            'is_active'        => 'boolean',
            'published_at'     => 'nullable|date',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:320',
            'meta_keywords'    => 'nullable|string|max:255',
        ]);

        $data['user_id']    = Auth::id();
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Blog yazısı oluşturuldu.');
    }

    public function edit(Post $post)
    {
        $categories = BlogCategory::active()->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'cover_image'      => 'nullable|image|max:2048',
            'is_featured'      => 'boolean',
            'is_active'        => 'boolean',
            'published_at'     => 'nullable|date',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:320',
            'meta_keywords'    => 'nullable|string|max:255',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) {
                Storage::disk('public')->delete($post->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Blog yazısı güncellendi.');
    }

    public function destroy(Post $post)
    {
        if ($post->cover_image) {
            Storage::disk('public')->delete($post->cover_image);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Blog yazısı silindi.');
    }
}
