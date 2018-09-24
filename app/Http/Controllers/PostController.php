<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        // 定義内で使用しないなら、引数は渡される必要はない。
    {
        // $posts = \App\Post::all();
            // 『use』で定義していない場合の記述
        // $posts = Post::all();
            // 『use』で定義している場合の記述

        $posts = Post::latest()->get();
            // 下記と同じ意味
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts =[];
            // 空の配列（デバック用）

        // dd($posts);
            // デバック法（オブジェクト）
        // dd($posts->toArray());
            // デバック法（配列に格納して表示）

        return view('posts.index', compact('posts'));
            // 下記と同じ
        // return view('posts.index', ['posts' => $posts]);
            // viewヘルパへの第一引数は、routesのビューファイルと対応。『〜.〜』でネストした記述に対応。第二引数は、ビューで使用するデータの配列。
            // 第二引数は配列以外に、compact関数、withメソッドでの記述が可能。
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
