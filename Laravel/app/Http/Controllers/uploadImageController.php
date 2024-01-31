<?php

namespace App\Http\Controllers;

use App\Models\UploadeImage;
use Illuminate\Http\Request;

class uploadImageController extends Controller
{
    public function getImage()
    {
        return response()->json(
            UploadeImage::all()
        );
    }
    public function uploadImage(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $name);
            UploadeImage::create(['image' => $name]);
            return response()->json(['status' => true, 'Message' => 'Upload Image Successfully...']);
        }
        return response()->json('Plase Try Again');
    }
}
