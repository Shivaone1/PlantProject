<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
class PageController extends Controller
{
    public function index()
    {
        $data = Category::orderByDesc('id')->get();
        return view('UI/index',compact('data'));
    }

    // public function contertDate()
    // {
    //     $mdy = convertYmdToMdy('2024-04-04');
    //     var_dump('Convert to "MDY" : ' . $mdy);

    //     $ymd = convertMdyToYmd('04-04-2024');
    //     var_dump('Convert to "YMD" : ' . $ymd);
    //     return response()->json(['Status'=>true,'Message'=>DATA_STORE]);
    // }
}
