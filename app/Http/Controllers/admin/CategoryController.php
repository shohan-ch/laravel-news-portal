<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        return view('admin.pages.categories.index')->with('categories', Category::all());
    }


    public function create()
    {
        return view('admin.pages.categories.create');
    }


    public function store(Request $request)
    {
        Category::create($this->validateCategory($request));
        return redirect(route('category.index'))->with('success', 'Category added successpully');
    }


    public function show(Category $category)
    {
        return view('admin.pages.categories.show')->with('category', $category);
    }


    public function edit(Category $category)
    {
        return view('admin.pages.categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $category->update($this->validateCategory($request));
        return redirect(route('category.index'))->with('success', 'Category updated successpully');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'))->with('success', 'Category deleted successfully.');
    }

    public function validateCategory(Request $request)
    {

        return $request->validate([
            'name' => 'required|alpha|unique:categories'
        ]);
    }
}