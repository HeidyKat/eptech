<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\Category\storeRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('can:categories.create')->only(['create','store']);
    //     $this->middleware('can:categories.index')->only(['index']);
    //     $this->middleware('can:categories.edit')->only(['edit','update']);
    //     $this->middleware('can:categories.show')->only(['show']);
    //     $this->middleware('can:categories.destroy')->only(['destroy']);
    // }

    public function index()
    {
        //SE ESTÁ UTILIZANDO DATA TABLE
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(storeRequest $request, Category $category)
    {
        $category ->my_store($request);
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        $subcategories = $category->subcategories;
        return view('admin.category.show', compact('category','subcategories'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->my_update($request);
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
