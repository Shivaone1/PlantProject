<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('UI/index');
    }
    public function contertDate()
    {
        $mdy = convertYmdToMdy('2024-04-04');
        var_dump('Convert to "MDY" : ' . $mdy);

        $ymd = convertMdyToYmd('04-04-2024');
        var_dump('Convert to "YMD" : ' . $ymd);
    }
}
