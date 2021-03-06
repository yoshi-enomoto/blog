@extends('layouts.default')

@section('title', $post->title)

@section('content')
    <h1>
        <a href="{{ route('posts.index') }}" class="header-menu">back</a>
        {{-- <a href="{{ url('posts') }}" class="header-menu">BACK</a> --}}
            {{-- urlの引数は静的な文字列が対応する（現在、『/posts』がindexページに値する --}}
        {{ $post->title }}<br>
        作成日時：{{ $post->created_at->format('Y/m/d') }}
    </h1>
    {{-- <p>{{ $post->body }}</p> --}}
      {{-- 上記の記述だと、カラム内に改行が入っていた場合、改行が認識されない --}}
    <p>{!! nl2br(e($post->body)) !!}</p>
      {{-- 基本は『{{~~}}』により、htmlエンティティにエスケープするべき。
           →上記を行うと特殊文字が単なる文字列変換される
            ＝<>などが文字数列に置き換わり、タグとして生成されなくなる。
            =フォームなどで悪意のあるスクリプト送信を防いでくれる。（XSS攻撃とも言う？）
       --}}
      {{-- 場合によってはhtmlエンティティにエスケープしたくない事がある（表示の場合）
           その時に『{!!~!!}』を用いる。
       --}}

      {{-- 『htmlspecialchars()』：HTMLエンティティ化する関数。
            ＝ 特殊な意味を持つ特殊文字（>や""など）を単なる文字列に変換すること。
            <ex> echo htmlspecialchars('<a href="#">HTMLエンティティ化する。</a>');
              → 『&lt;a href=&quot;#&quot;&gt;HTMLエンティティ&lt;/a&gt;』
        --}}
      {{-- 『{!!〜〜!!}』：中身をエスケープしないで値を出力する命令（データ・文章の改行をbrタグに変換したい為） --}}
      {{-- エスケープ処理：通常の記法では出力できない文字を出力させる処理のこと。
            <ex>『'』：'今日もA\'は元気だ。'
                 →「‘」以外に改行やタブなど、普段出力を意識しないような文字にも利用される。
         --}}

      {{-- 『{!!〜〜!!}』：中身をエスケープしないで値を出力する命令（データ・文章の改行をbrタグに変換したい為） --}}
      {{-- 『e()』：指定された文字列にhtmlspecialcharsを実行します。 --}}
      {{-- 『nl2br()』：改行文字をbrタグに変換 --}}


      {{-- 作成日が今日より昔なら赤字、そうでなければ黒字で表示 --}}
        @if ($dataCreated->gt($dataToday))
          <p>{!! nl2br(e($post->body)) !!}</p>
        @else
          <p style="color: red;">{!! nl2br(e($post->body)) !!}</p>
        @endif
    <h2>Tags</h2>
    <p>
        @forelse ($tags as $tag)
            <span>-{{ $tag->title }}-</span>
        @empty
            no tags
        @endforelse
    </p>


    <h2>Comments</h2>
    <ul>
        @forelse ($post->comments as $comment)
            <li>
                {{ $comment->body }}
                <a href="#" class="del" data-id="{{ $comment->id }}">[x]</a>
                <form action="{{ route('posts.comments.destroy', [$post, $comment]) }}" method="post" id="form_{{ $comment->id }}">
                    {{-- パラメータは2つ渡す必要がある（route参照） --}}
                    {{-- 渡す際、第二引数に全て渡す記述にする必要あり『[〜]とする事！』 --}}
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                </form>
            </li>
        @empty
            <li>No comments yet</li>
        @endforelse
    </ul>

    <form action="{{ route('posts.comments.store', $post) }}" method="post">
        {{-- 第２引数に該当するパラメータを指定することで渡すことが可能。（routeメソッド） --}}
        {{-- あくまでも、括弧の中に記述する！ --}}
        {{ csrf_field() }}
        <p>
            <input type="text" name="body" placeholder="enter comment" value="{{ old('body') }}">
            @if ($errors->has('body'))
                <span class="error">{{ $errors->first('body') }}</span>
            @endif
        </p>
        <p>
            <input type="submit" value="Add Comment">
        </p>
    </form>
    <script src="/js/main.js"></script>
        {{-- 削除機能に対応するjsを読み込ませる --}}
        {{-- indexのものがそのまま転用可能 --}}
@endsection
