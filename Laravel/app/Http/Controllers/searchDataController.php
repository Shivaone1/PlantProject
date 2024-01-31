<?php

namespace App\Http\Controllers;

use App\Models\search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchDataController extends Controller
{
    public function article(Request $request)
    {
        $articles = DB::table('articles')
            ->select('articles.*', 'author.name as authorName', 'categories.name as categoryName')
            ->leftjoin('authors', 'authors.id', 'articles.fk_author_id')
            ->leftjoin('categories', 'categories.id', 'articles.fk_categories_id')
            ->get();
        dd($articles);
        return view('article', ['articles' => $articles]);
    }
}
