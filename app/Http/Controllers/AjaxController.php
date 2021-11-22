<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function get_subcategories(Request $request){
        // dd($request->category);
        if($request->ajax()){
            $subcategories = Subcategory::where('category_id', $request->category)->get();
            return response()->json($subcategories);
        }
    }

    public function get_products_by_subcategory(Request $request){
        if($request->ajax()){
            // $products = Product::where('subcategory_id', $request->subcategory_id)->get();
            // return response()->json($products);

            return datatables()->of(Product::where('subcategory_id', $request->subcategory_id)->get())
            ->addColumn('btn','admin.category._actions')
            ->rawColumns(['btn'])
            ->toJson();
        }
    }
}
