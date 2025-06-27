<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // Show blogs on frontend
    public function blog() {
        $blogs = Blog::latest()->get();
        return view('blog', compact('blogs'));
    }

    // Show single blog detail
    public function showDetail($id) {
        $blog = Blog::findOrFail($id);
        return view('blog-detail', compact('blog'));
    }

    // Show all blogs in admin panel
    public function showAll() {
        $blogs = Blog::latest()->get();
        return view('blogshow', compact('blogs'));
    }

    // Show add blog form
    public function addblog() {
        return view('addblog');
    }

    // Store new blog
    public function store10(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'author' => 'required',
            'date' => 'required|date',
            'description' => 'required',
        ]);

        $data['image'] = $request->file('image')->store('blogs', 'public');

        Blog::create($data);

        return redirect()->route('blogshow')->with('success', 'Blog created successfully.');
    }

    // Show edit form
    public function edit(Blog $blog) {
        return view('blogedit', compact('blog'));
    }

    // Update blog
    public function update(Request $request, Blog $blog) {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('blogshow')->with('success', 'Blog updated successfully.');
    }

    // Delete blog
    public function destroy(Blog $blog) {
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted.');
    }
}
