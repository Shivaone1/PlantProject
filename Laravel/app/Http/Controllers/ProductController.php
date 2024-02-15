<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function searchProducts($keyword)
    {
        try {
            $products = Product::where('title', 'like', "%$keyword%")
                ->orWhereHas('category', function ($query) use ($keyword) {
                    $query->where('title', 'like', "%$keyword%");
                })
                ->orWhereHas('subCategory', function ($query) use ($keyword) {
                    $query->where('title', 'like', "%$keyword%");
                })
                ->orWhereHas('brand', function ($query) use ($keyword) {
                    $query->where('title', 'like', "%$keyword%");
                })
                ->get();
            return response()->json(['Status' => true, 'Message' => DATA_FETCHED, 'Data' => $products], 200);
        } catch (\Throwable $th) {
            return response()->json(['Status' => false, 'Message' => $th], 301);
        }
        // return view('products.index', ['products' => $products]);
    }
}
