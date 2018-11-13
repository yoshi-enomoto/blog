<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
    // 新規作成したRequestクラスにより、使用しなくなった為、コメアウト実行。
use \App\Post;
// 新たに作成したStorePostRequestクラスを短い記述で使用する為にこれを記述。
use \App\Http\Requests\StorePostRequest;
use \App\Http\Requests\UpdatePostRequest;
use \App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
    // indexの引数で使用する為、再度使用。
use \App\Tag;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        // searchでの入力内容を$requestで受け取る為
    // public function index()
        // ルーティングのURLパラメータで値を渡していないなら、引数は必要はない。
    {
        // $posts = \App\Post::all();
            // 『use』で定義していない場合の記述
        // $posts = Post::all();
            // 『use』で定義している場合の記述

        // indexからsearchワードを受け取る
        $filterSearch = $request->input('filter.keyword');
            // 配列の入力フォームは、ドット記法で配列へアクセスできる。

        // whereメソッドを追加して、テーブルを絞り込む
        $posts = Post::latest()->where('title', 'like', "%$filterSearch%")->get();
            // like句を使用。かつ、ワイルドカードを前後に用いる。

        // $posts = Post::latest()->get();
            // 下記と同じ意味
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts =[];
            // 空の配列（デバック用）

        // dd($posts);
            // デバック法（オブジェクト）
        // dd($posts->toArray());
            // デバック法（配列に格納して表示）

        $dt = Carbon::now();
        $dt = Carbon::now('Asia/Tokyo');

        return view('posts.index', compact('posts', 'dt'));
            // 下記と同じ
        // return view('posts.index', ['posts' => $posts]);
        // return view('posts.index')->with('posts', $posts);
            // viewヘルパへの第一引数は、routesのビューファイルと対応。『〜.〜』でネストした記述に対応。第二引数は、ビューで使用するデータの配列。
            // 第二引数は配列以外に、compact関数、withメソッドでの記述が可能。
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Comment $comment)
        // ルーティングのURLパラメータで値を渡しているので、引数が必要。
        // ルーティングで『post』を渡している場合。
        // →暗黙的にモデルをデータに結びつけられる Implicit Binding という仕組み。
    // public function show($id)
        // 引数を『$id』で渡す場合。
    {
        // showの引数が『$id』ではないなら下記3つは不要。無しでviewに渡せる。
        // $post = Post::find($id);
        // $post = Post::findOrFail($id);
            // $idでデータが見つからなかった場合に例外を返す場合。
        // $post = Post::find($post);


    // Carbonによるテストソーン
        // $dt = new Carbon('today');
        // $dt = Carbon::now();
        $dataToday = Carbon::now()->format('Y-m-d');
            // stringで取得
        $dataToday = Carbon::create(2000, 12, 12);
        $dataToday = Carbon::now();
            // objectで取得

        $dataCreated = $post->created_at;
            // objectで取得
            // いつもの見にくい形式
        $dataCreated = $post->created_at->format('Y-m-d');
            // stringで取得
            // そのバリューのみ取得
        $dataCreated = Carbon::create(2000, 11, 12);
        $dataCreated = $post->created_at;
            // objectで取得

        // dd($dataCreated);
        // dd(gettype($dataToday));
            // 型の判断

        var_dump($dataCreated->gt($dataToday));
            // objectで比較する必要あり

        // var_dump($dt1->gt($dt2));
            // 「より大きい」：左が右より大きいか＝右の日付が後か
        // var_dump($dt1->gte($dt2));
            // 「以上」
        // var_dump($dt1->lt($dt2));
            // 「より小さい」：左が右より小さいか＝右の日付が先か
    // Carbonによるテストソーン

        $tags = $post->tags;

        return view('posts.show', compact('post', 'dataCreated', 'dataToday', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
        // 新たに作成したStorePostRequestクラスを使用。変数の記述はそのまま。
    // public function store(Request $request)
        // フォームから送信されたデータはRequest型で渡ってくる。
    {
        // requestファイル内に移動
        // $this->validate($request, [
        //     'title' => 'required|min:3',
        //     'body' => 'required'
        // ]);

        // 書き方1
        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->save();

        // 書き方2
        $post = Post::create(
            array(
                'title' => $request->title,
                'body' => $request->body,
            )
        );
        // 送られてくるtagsの中で、nullがあった場合除外する
        $checkArray=array_filter($request->tags);
        // post_idにcheckを通過した配列を要素1つずつ中間テーブルに保存する処理
        $post->tags()->attach($checkArray);
        // Post::create(
        //     [
        //         'title' => $request->title,
        //         'body' => $request->body,
        //     ]
        // );

        // ※書き方3
        // $post = Post::create( $request->all() );
            // 1行で書けるが、許可してないパラメータまでも受け取り、場合によっては危険。(fillableで許可することとは異なる)

        // リダイレクト：ルーティングを通り、コントローラ→ビューと流れる。
        //  ＝ビュー内の変数が表示可能。
        return redirect()->route('posts.index');
        // return redirect('/');
            // 引数に渡すことで、そこにアクセスする。

        // 『view』はビューページのみを出力する（レンダリング）
        //  ＝ビュー内の変数情報は渡されていない。
        // 今回、returnに『view』を用いる場合、『$posts』情報が必要となる。
        // $posts = Post::latest()->get();

        // return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    // public function update(Request $request, Post $post)
        // 引数には、 form からの Request と、actionに渡す Post 型の post を設定する。
    {
        // dd($post);
        // ここでチェックをすると分かるとおり、まだ『$post』には更新値が入っていない。

        // updateの書き方1
        // $post->title = $request->title;
        // $post->body = $request->body;
        // // dd($post);
        // // ここでチェックでは、『$post』の規定の場所に更新値が入っている。
        // $post->save();

        // updateの書き方2
        $post->update(
            array(
                'title' => $request->title,
                'body' => $request->body,
            )
        );

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // destroyの書き方1
        $post->delete();

        // destroyの書き方2
        // Post::destroy($post->id);

        return redirect()->route('posts.index');
    }
}
