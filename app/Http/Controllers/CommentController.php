<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function store(Request $request, Post $post)
        // 渡されるのは、$request と $postである！
    {
        // $comment = new Comment();
        // $comment->body = $request->body;
        // $comment->save();

        $comment = new Comment(['body' => $request->body]);
        $post->comments()->save($comment);

        return redirect()->route('posts.show', $post);
            // 第２引数に該当するパラメータを指定することで渡すことが可能。（routeメソッド）

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
