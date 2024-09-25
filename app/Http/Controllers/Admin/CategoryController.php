<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        request()->user()->categories()->create($request->validated());
        return to_route('admin.category.index')->withSuccess(__('Category created successfully'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return to_route('admin.category.index')->withSuccess(__('Category updated successfully'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.category.index')->withSuccess(__('Category deleted successfully'));
    }
}
