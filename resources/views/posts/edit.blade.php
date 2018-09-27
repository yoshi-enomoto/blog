@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
    <h1>
        <a href="{{ route('posts.index') }}" class="header-menu">back</a>
        Edit Post
    </h1>
    <form action="{{ route('posts.update', $post) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <p>
            <input type="text" name="title" placeholder="enter title" value="{{ old('title', $post->title) }}">
                {{-- 『old()』で、エラーが出てフォームに戻る際に元の値が保持される --}}
                {{-- 第二引数を加える事で、DBから値を取り出す
                    （第一引数のが無かったら、第二引数のものを表示する的な） --}}
            @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
            @endif
        </p>
        <p>
            <textarea name="body" placeholder="enter body">{{ old('body', $post->body) }}</textarea>
            @if ($errors->has('body'))
                <span class="error">{{ $errors->first('body') }}</span>
            @endif

        </p>
        <p>
            <input type="submit" value="Update">
        </p>
    </form>
@endsection
