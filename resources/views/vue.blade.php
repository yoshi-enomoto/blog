@extends('layouts.default')

@section('title', 'Vue')

@section('content')
        <!-- example-component はLaravelに入っているサンプルのコンポーネント -->
        <example-component></example-component>
            <!-- div id="app"の中にコンポーネントを書くのが必須 -->
            <!-- default.blade.phpの大枠にid="app"を指定することで、それを満たす。 -->

        <br>
        {{-- 関連付けとnew Vue()はapp.jsで行う --}}
        {{-- id="app"のルート設置はdefault.blade.phpに設置している --}}
        {{-- bladeファイルには、『.vue』を定義したものを差し込むのみ --}}
        <vue0-component></vue0-component>
        <br>
        <vue1-component></vue1-component>
        <br>
        <vue2-component></vue2-component>
        <br>
        <vue3-component></vue3-component>
        <br>
        <vue4-component></vue4-component>
        <br>
        <vue5-component></vue5-component>
        <br>
        <vue6-component></vue6-component>
        <br>
        <h2>count</h2>
        <vue7-component></vue7-component>
        <vue7-component></vue7-component>
        <vue7-component></vue7-component>
@endsection
