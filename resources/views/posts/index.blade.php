<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Blog Posts</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <div class="container">
    <h1></h1>
    <ul>
      {{-- レコードのカラムに空がある場合の構造 --}}
      @forelse ($posts as $post)
        <li><a href="">{{ $post->title }}</a></li>
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
