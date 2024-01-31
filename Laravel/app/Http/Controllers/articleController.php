<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = DB::table('articles');

        $categories=DB::table('categories')->get();
        $authors=DB::table('authors')->get();
        if ($request->keyword != null) {
            $articles = $articles->orwhere('articles.name', 'like', '%' . $request->keyword . '%');
            // $articles = $articles->orwhere('authors.name', 'like', '%' . $request->keyword . '%');
            // $articles = $articles->orwhere('categories.name', 'like', '%' . $request->keyword . '%');
        }
        if ($request->author != null) {
            // $articles = $articles->where('articles.fk_author_id', $request->author);
            $articles = $articles->where('authors.name', $request->author);
        }
        if ($request->category != null) {
            // $articles = $articles->where('articles.fk_category_id', $request->category);
            $articles = $articles->where('categories.name', $request->category);
        }

        $articles = $articles
            ->select('articles.*', 'authors.name as authorName', 'categories.name as categoryName')
            ->leftjoin('authors', 'authors.id', 'articles.fk_author_id')
            ->leftjoin('categories', 'categories.id', 'articles.fk_category_id')
            ->get();
        return view('article', ['articles' => $articles,'Categories'=>$categories,'Authors'=>$authors]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
// 