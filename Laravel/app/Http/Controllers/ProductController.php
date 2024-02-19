<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
        try {
            $data = Product::orderByDesc('id')->with('category', 'brand')->get();
            return response()->json(['Status' => true, 'Message' => DATA_FETCHED, 'Data' => $data], 200);
        } catch (\Throwable $th) {
            return response()->json(['Status' => false, 'Message' => $th], 402);
        }
    }
    public function search(Request $Request)
    {
        $validation=validator::make($Request->all(),[
            'product_id'=>'required|exists:products,id',
            'keyword'=>'required'
        ]);
        if ($validation->fails()) {
            $errors = $validation->errors()->first();
            return responseStatus('', false, $errors, 301);
        }
        try {
            $keyword=$Request->keyword;
            $products = Product::where('title', 'like', "%$keyword%")
                ->orWhereHas('brand', function ($query) use ($keyword) {
                    $query->where('title', 'like', "%$keyword%");
                })
                // ->orWhereHas('categories', function ($query) use ($keyword) {
                //     $query->where('category_id', 'like', "%$keyword%");
                // })
                // ->orWhereHas('subCategory', function ($query) use ($keyword) {
                //     $query->where('title', 'like', "%$keyword%");
                // })
                ->first();
            return responseStatus($products,true,SEARCHED,200);
        } catch (\Throwable $th) {
            return responseStatus('',false,$th,301);
        }
        // return view('products.index', ['products' => $products]);
    }
}
