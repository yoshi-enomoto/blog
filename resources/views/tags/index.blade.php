@extends('layouts.default')

@section('title', 'Tags List')

@section('content')
    <h1>
        <a href="{{ route('posts.index') }}" class="header-menu">back</a>
        Tags List
    </h1>

    <ul>
        @forelse ($tags as $tag)
            <li>
                {{ $tag->title }}
                <a href="#" class="del" data-id="{{ $tag->id }}" onclick="return window.confirm('本当にこのタグを消しますか？')">[x]</a>
                <form action="{{ route('tags.destroy', $tag) }}" method="post" id="form_{{ $tag->id }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                </form>
            </li>
        @empty
            <li>No tags</li>
        @endforelse
    </ul>

    <form action="{{ route('tags.store') }}" method="post">
        {{ csrf_field() }}
        @for ($i = 0; $i <3 ; $i++)
            <p>
                <input type="text" name="tags[{{ $i }}]" placeholder="type a tag if you have" value="{{ old('tags.$i') }}">
                <span class="error">{{ $errors->first('tags.$i') }}</span>
            </p>
        @endfor
        <input type="submit" value="add">
    </form>


    <script src="/js/main.js"></script>
        {{-- 削除機能に対応するjsを読み込ませる --}}
@endsection
