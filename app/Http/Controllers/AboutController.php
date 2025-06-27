<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutSection;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Show the About section on the frontend.
     */
    public function about()
    {
        $about = AboutSection::first(); // Fetch first record
        return view('about', compact('about'));
    }

    /**
     * Show the edit form for the About section.
     */
    public function edit()
    {
        $about = AboutSection::first();
        if (!$about) {
            return redirect()->back()->with('error', 'About section not found.');
        }
        return view('admin.about_form', compact('about'));
    }

    /**
     * Delete the About section.
     */
    public function destroy($id)
    {
        $about = AboutSection::findOrFail($id);

        // Delete image if it exists
        if ($about->image) {
            $imagePath = public_path($about->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
        }

        // Delete the about section record
        $about->delete();
        
        return redirect()->route('aboutshow')->with('success', 'About section deleted successfully!');
    }

    /**
     * Store a new About section.
     */
    public function store8(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload Image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Store in Database
        AboutSection::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'images/' . $imageName,
        ]);

        return redirect()->back()->with('success', 'About section added successfully!');
    }

    /**
     * Update an existing About section.
     */
    public function update(Request $request, $id)
    {
        $about = AboutSection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($about->image) {
                $oldImagePath = public_path($about->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        $about->update($data);

        return redirect()->back()->with('success', 'About Section Updated Successfully!');
    }

    /**
     * Show the add About section form.
     */
    public function addabout()
    {
        return view('addabout');
    }

    /**
     * Show the About section management page.
     */
    public function aboutshow()
    {
        $abouts = AboutSection::all(); // Fetch all About records
        return view('aboutshow', compact('abouts'));
    }
}
