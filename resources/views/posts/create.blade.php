@extends('layouts.default')

@section('title', 'New Posts')

@section('content')
    <h1>
        <a href="{{ route('posts.index') }}" class="header-menu">back</a>
        {{-- <a href="{{ url('posts') }}" class="header-menu">BACK</a> --}}
            {{-- urlの引数は静的な文字列が対応する（現在、『/posts』がindexページに値する --}}
        New Posts
    </h1>
    <form action="{{ route('posts.store') }}" method="post">
        {{ csrf_field() }}
          {{-- 認証用のトークンを埋め込む記述 --}}
          {{-- 悪意のある不正な投稿を防ぐためにデフォルトで CSRF 対策が施されている為、フォームにはそのためのトークンを仕込む必要がある。 --}}
          {{-- csrf：クロスサイトリクエストフォージェリ：偽（forgery）
               →攻撃者が全く異なるウェブページを作成し、訪れたユーザに対してニセのリンクを踏ませ、気づかぬうちに別のサイトへ書き込みを行わせる等の攻撃手法。
               ＝サイトAに書き込むつもりが、全然違うサイトBに書き込まされていたってことが起こり得る。
               対策：フォーム生成時にサーバからの認証用のtokenを埋め込み、リクエスト送信時に一緒にサーバに返し、正しいtokenが送られてきているか検証を行う。
           --}}

        {{-- 入力フォーム数＋ボタン分の<p>タグを先に生成。その後整形。 --}}
        <p>
            <input type="text" name="title" placeholder="enter title" value="{{ old('title') }}">
                {{-- 『old()』で、エラーが出てフォームに戻る際に元の値が保持される --}}
            @if ($errors->has('title'))
                {{-- エラーメッセージは『$errors』内の対応プロパティに入ってくる --}}
                <span class="error">{{ $errors->first('title') }}</span>
                    {{-- エラーは複数入ってくる可能性があるので、『first』でエラーが無くなるまで、最初のものだけを表示してあげる。 --}}
            @endif
        </p>
        <p>
            <textarea name="body" placeholder="enter body">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
                <span class="error">{{ $errors->first('body') }}</span>
            @endif

        </p>
        <p>
            <input type="submit" value="Add">
        </p>
    </form>
@endsection
