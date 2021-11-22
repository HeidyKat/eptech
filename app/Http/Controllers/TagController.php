<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //SE ESTÁ UTILIZANDO DATA TABLE
        $tags = Tag::get();
        return view('admin.tag.index', compact('tags'));
    }
    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request, Tag $tag)
    {
        $tag ->my_store($request);
        return redirect()->route('tags.index');
    }
    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }
    public function update(Request $request, Tag $tag)
    {
        $tag->my_update($request);
        return redirect()->route('tags.index');
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
