<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Subcategory\StoreRequest;
use App\Http\Requests\Subcategory\UpdateRequest;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        //SE ESTÁ UTILIZANDO DATA TABLE
        $subcategories = Subcategory::get();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        return view('admin.subcategories.create');
    }

    public function store(StoreRequest $request, Subcategory $subcategory)
    {
        $subcategory ->my_store($request);
        return back();
        //return redirect()->route('subcategories.index');
    }

    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategories.show', compact('subcategories'));
    }

    public function edit(Category $category, Subcategory $subcategory)
    {
        return view('admin.subcategories.edit', compact('category','subcategory'));
    }


    public function update(UpdateRequest $request, Category $category, Subcategory $subcategory)
    {
        $subcategory->my_update($request);
        return redirect()->route('categories.show', $category);
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return back();
        // return redirect()->route('subcategories.index');
    }
}
