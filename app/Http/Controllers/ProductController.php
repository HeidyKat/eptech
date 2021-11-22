<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Tag;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\Product\storeRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('can:product.create')->only(['create','store']);
    //     $this->middleware('can:product.index')->only(['index']);
    //     $this->middleware('can:product.edit')->only(['edit','update']);
    //     $this->middleware('can:product.show')->only(['show']);
    //     $this->middleware('can:product.destroy')->only(['destroy']);

    //     $this->middleware('can:change.status.products')->only(['change_status']);
    // }


    public function index()
    {
        //SE ESTÁ UTILIZANDO DATA TABLE
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        $tags = Tag::all();
        return view('admin.product.create', compact('categories','tags'));
    }

    public function store(StoreRequest $request, Product $product)
    {
        $product->my_store($request);
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $tags = Tag::all();
        return view('admin.product.edit', compact('product','categories','tags'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product->my_update($request);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
    public function change_status(Product $product)
    {
        if($product->estado == 'ACTIVADO'){
            $product->update(['estado'=>'DESACTIVADO']);
            return redirect()->back();
        } else {
            $product->update(['estado'=>'ACTIVADO']);
            return redirect()->back();
        }
    }
    public function get_products_by_barcode(Request $request){
        if($request ->ajax()){
            $products = Product::where('codigo',$request->codigo)->firstOrFail();
        return response()->json($products);
        }
    }
    public function get_products_by_id(Request $request)
    {
        if($request->ajax()){
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }
    public function print_barcode()
    {
        $products = Product::get();
        $pdf = PDF::loadView('admin.product.barcode',compact('products'));
        return $pdf->download('codigos_de_barra.pdf');
    }

    public function upload_image(Request $request, $id){

        $product = Product::findOrFail($id);
       if($request->hasFile('image')){
           $file =$request->file('image');
           $image_name =time().'_'.$file->getClientOriginalName();
           $file->move(public_path("/image"),$image_name);
           $urlimage='/image/'.$image_name;
       }
        $product ->images()->create([
            'url'=>$urlimage,
        ]);
    }
}
