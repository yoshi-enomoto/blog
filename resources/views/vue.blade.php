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
@endsection
