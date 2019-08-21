<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('parent_id')->get();
        if (request()->wantsJson()) {
            return $categories;
        }
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        Category::create(
                request()->validate([
                    'name' => 'required|unique:categories',
                    'slug' => 'required|unique:categories',
                    'parent_id' => 'required',
                    'is_active' => 'required | boolean',
                    'meta_title' => 'nullable',
                    'meta_keywords' => 'nullable',
                    'meta_description' => 'nullable',
                ])
        );
        return response('دسته بندی ایجاد شد');
    }

    public function edit(Category $category)
    {
        $categories = Category::orderBy('parent_id')->get();
        if (request()->wantsJson()) {
            return $category;
        }
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Category $category)
    {
        $category->update(
            request()->validate([
                'name' => 'required | unique:categories,id,' . $category->id,
                'slug' => ['required', Rule::unique('categories')->ignore($category->id)],
                'parent_id' => 'required',
                'is_active' => 'required | boolean',
                'meta_title' => 'nullable',
                'meta_keywords' => 'nullable',
                'meta_description' => 'nullable',
            ])
        );
        return response('دسته بندی ویرایش شد');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        cache()->forget('categories');

        return back()->with('flash', 'دسته بندی حذف شد');
    }
}
