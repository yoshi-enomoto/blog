@extends('layouts.default')

@section('title', 'Vue')

@section('content')
        <!-- example-component はLaravelに入っているサンプルのコンポーネント -->
        <example-component></example-component>
            <!-- div id="app"の中にコンポーネントを書くのが必須 -->
            <!-- default.blade.phpの大枠にid="app"を指定することで、それを満たす。 -->
@endsection
