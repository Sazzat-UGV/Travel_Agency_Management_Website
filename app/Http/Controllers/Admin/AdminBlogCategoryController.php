<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog_categories = BlogCategory::latest('id')->get();
        return view('admin.pages.blog_category.index', compact('blog_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.blog_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blog_categories,name',
        ]);
        BlogCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('blog_category.index')->with('success', 'Blog category added successfully');
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
        $blog_category = BlogCategory::findOrFail($id);
        return view('admin.pages.blog_category.edit', compact('blog_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog_category = BlogCategory::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:blog_categories,name,' . $blog_category->id,
        ]);
        $blog_category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('blog_category.index')->with('success', 'Blog category update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $total = Blog::where('blog_category_id', $id)->count();
        if ($total > 0) {
            return redirect()->back()->with('error', 'This category has some blog.');
        }
        $blog_category = BlogCategory::findorFail($id);
        $blog_category->delete();
        return redirect()->back()->with('success', 'Blog category delete successfully');
    }
}
