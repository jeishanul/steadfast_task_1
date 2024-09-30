<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        request()->user()->categories()->create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return to_route('admin.category.index')->withSuccess(__('Category created successfully'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        
        return to_route('admin.category.index')->withSuccess(__('Category updated successfully'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.category.index')->withSuccess(__('Category deleted successfully'));
    }
}
