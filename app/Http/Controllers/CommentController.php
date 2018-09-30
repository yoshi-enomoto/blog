<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
    // request型を専用に作成した為、削除&書き換え
use \App\Http\Requests\StoreCommentRequest;
use \App\Post;
use \App\Comment;


class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request, Post $post)
        // 渡されるのは、$request と $postである！
    {
        // $comment->body = $request->body;
        // $comment->save();

        // $comment = new Comment();
            // 直接値を渡すことが可能なので、下記のようにも記述できる。
        $comment = new Comment(['body' => $request->body]);
        $post->comments()->save($comment);
            // $postに紐付いた形でセーブの意味。
            // 『->comments()』はモデルPostで定めたメソッド。

        return redirect()->route('posts.show', $post);
            // 第２引数に該当するパラメータを指定することで渡すことが可能。（routeメソッド）
            // 違うアクションに対してリダイレクトさせる場合、下記もある。
            // return redirect()->action('PostController@show',$post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.show', $post);
            // 元の画面に戻るだけだったら単に back()でも良い
            // return redirect()->back();
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // *
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response

    // public function update(Request $request, $id)
    // {
    //     //
    // }

}
