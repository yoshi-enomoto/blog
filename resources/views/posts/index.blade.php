@extends('layouts.default')
    {{-- 共通部品の指定 --}}

{{-- @endsectionとの間に差し込みたい個別パーツを入れる --}}
@section('title', 'Blog Posts')
    {{-- 短い場合は上記の様にすると、1行で書ける --}}

@section('content')
    <h1>
        <a href="{{ route('posts.create') }}" class="header-menu">New Post</a>
        Blog Posts
    </h1>
    <ul>
        {{-- レコードのカラムに空がある場合の構造 --}}
        @forelse ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>

                {{-- 削除を確認無しで行う場合 --}}
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                        <input type="submit" class="del" value="[x]">
                            {{-- 削除表示がボタンとなる。 --}}
                </form>

            </li>
                {{-- 推奨：『artisan route:list』に表示されるnameで記載可能。
                      →動的に対応しているので、静的なURLが変更されてもnameの紐付きは変わらない為。
                      →routeのnameは指定が可能。（resourceで生成時、自動で付与されている）
                --}}
            {{-- 下記、それ以外の記載の仕方 --}}
{{--
            <li><a href="{{ action('PostController@show', $post) }}">{{ $post->title }}</a></li>
            <li><a href="{{ url('/posts', $post) }}">{{ $post->title }}</a></li>
--}}
        @empty
            <li>No posts</li>
        @endforelse

        {{-- レコードのカラムに空がない場合の構造 --}}
  {{--
        @foreach ($posts as $post)
          <li><a href="">{{ $post->title }}</a></li>
        @endforeach
   --}}
        {{-- 下記の形だと連想配列で取り出す --}}
        {{-- <li>{{$post}}</li> --}}
    </ul>
@endsection
