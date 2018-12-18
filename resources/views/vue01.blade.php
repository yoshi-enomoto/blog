@extends('layouts.default')

@section('title', 'Vue01:practice')

@section('content')
    <h2>コンポーネント例</h2>
    <small>・example-component箇所</small>
    <example-component></example-component>

    <h2>コンポーネント、その1</h2>
    <small>・テキスト入力とhtmlテキストの連動</small><br>
    <small>・ボタン押下による固定文字列へ変更</small>
    <aiko-pony></aiko-pony>

    <h2>コンポーネント、その2</h2>
    <small>・selectボックス</small><br>
    <small>・ボタン押下による固定選択肢へ変更</small>
    <love-like-pop></love-like-pop>
@endsection
