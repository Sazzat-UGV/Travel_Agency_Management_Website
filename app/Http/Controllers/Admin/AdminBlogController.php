<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('blog_category:id,name')->latest('id')->get();
        return view('admin.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::latest('id')->get();
        return view('admin.pages.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|numeric',
            'short_description' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $blog = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'blog_category_id' => $request->category,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);
        $this->image_upload($request, $blog->id);
        return redirect()->route('blog.index')->with('success', 'Blog added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = BlogCategory::latest('id')->get();
        $blog = Blog::findOrFail($id);
        return view('admin.pages.blog.edit', compact('blog', 'categories'));
    }

/**
 * Update the specified resource in storage.
 */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|numeric',
            'short_description' => 'required',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'blog_category_id' => $request->category,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);
        $this->image_upload($request, $blog->id);
        return redirect()->route('blog.index')->with('success', 'Blog update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->photo != '') {
            //delete old photo
            $photo_location = 'public/uploads/blog/';
            $old_photo_location = $photo_location . $blog->photo;
            unlink(base_path($old_photo_location));
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Blog delete successfully');
    }

    public function image_upload($request, $blog_id)
    {
        $blog = Blog::findorFail($blog_id);

        if ($request->hasFile('photo')) {
            if ($blog->photo != '') {
                //delete old photo
                $photo_location = 'public/uploads/blog/';
                $old_photo_location = $photo_location . $blog->photo;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/blog/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $check = $blog->update([
                'photo' => $new_photo_name,
            ]);
        }
    }
}
