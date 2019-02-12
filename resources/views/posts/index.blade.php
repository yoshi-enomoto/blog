@extends('layouts.default')
    {{-- 共通部品の指定 --}}

{{-- @endsectionとの間に差し込みたい個別パーツを入れる --}}
@section('title', 'Blog Posts')
    {{-- 短い場合は上記の様にすると、1行で書ける --}}

@section('content')
    <h1>
        <a href="{{ route('posts.create') }}" class="header-menu">New Post</a>
        <a href="{{ route('tags.index') }}" class="header-menu">Tag List</a>
        Blog Posts
        {{ $dt }}
    </h1>

    {{-- @includeを使うサブビュー --}}
    <div style="border-bottom: 1px solid #ddd; margin-bottom: 15px; padding-bottom: 10px">
        {{-- 静的挿入 --}}
        @include('partials.section1')
        <br>
        {{-- 動的挿入 --}}
        @include('partials.section2', [
            'type' => 'success',
            'name' => 'システム部',
        ])
    </div>

    {{-- コンポーネントとスロット --}}
        {{-- @~@の間の値をテンプレートに渡すことができる --}}
    <div style="border-bottom: 1px solid #ddd; margin-bottom: 15px; padding-bottom: 10px">
        @component('components.alert1')
            This is the alert message here.also just write letters.<br>
            but I don't know why this line is only one.<br>
            it's confuse.<br>
        @endcomponent
        @component('components.alert2')
            <strong>エラー！</strong><br>
            ログイン情報が間違っています。<br>
            <strong>これを含めた3文はindexから渡している。</strong>
        @endcomponent
        @component('components.alert3')
            何か間違いが生じてるってよ！<br>
            @slot('title')
                渓谷！
            @endslot
            <br>
            上記2つを逆転させて記載してみた<br>
            その事から考察出来る事は、<br>
            ・&#64;component~&#64;endcomponent間は値として渡される。<br>
            ・その間に&#64;slot()~&#64;endslotがあると、<br>引数で与えている変数に渡された先で代入される？
        @endcomponent
        <br>
        <br>
        下記、定義したカスタムディレクティブ<br>
        @aiko('osaka')<br>
        @aiko('tokyo')<br>
        {{-- @aiko(['kyoto']) --}}
    </div>

    {{-- searchフォーム --}}
    <form action="{{ route('posts.index') }}" method="get" style="border-bottom: 1px solid #ddd; padding-bottom: 10px;
  margin-bottom: 15px;
">
        {{-- search --}}
        <label for="keyword" style="font-weight: bold;">search title</label>
        <input type="text" name="filter[keyword]" id="keyword" value="{{ request('filter.keyword') }}" style="width: 150px;">
        <button type="submit">search</button>
            {{-- formタグで『posts.index』アクセス、かつクエリを送信 --}}
        {{-- searchクリア --}}
        <a class="searchButton" href="{{ route('posts.index') }}">clear</a>
            {{-- aタグリンクで『posts.index』アクセスして、クエリをリセット --}}
    </form>

    <ul>
        {{-- レコードのカラムに空がある場合の構造 --}}
        @forelse ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                <a href="{{ route('posts.edit', $post) }}" classs="edit">[edit]</a>

                {{-- リンク先をダミーにして、formで行う --}}
                {{-- その場合、aタグとformタグを紐付ける記述（属性）を書く --}}
                {{-- 普段は、「type="submit"」のボタンを押下すると、<form>タグのaction属性で設定されたプログラムを呼び出す処理が始まる。 --}}
                <a href="#" class="del" data-id="{{ $post->id }}" onclick="return window.confirm('本当にこの登録を消しますか？')">[x]</a>
                    {{-- data属性を仕込む。
                         →特定の [x] をクリックした時に対応する form の id を取得する為に。
                         ＝生成後、『』となる。
                      --}}
                <form action="{{ route('posts.destroy', $post) }}" method="post" id="form_{{ $post->id }}">
                    {{-- id属性を付ける。
                         →jsで submit する為に。
                     --}}
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                </form>

                {{-- 削除を確認無しで行う場合 --}}
{{--
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                        <input type="submit" class="del" value="[x]">
 --}}
                            {{-- 削除表示がボタンとなる。 --}}
                {{-- </form> --}}

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

    <div>
        <add-test :posts="{{ json_encode($posts, JSON_FORCE_OBJECT) }}" :value="{{ json_encode(old('post_id', null), JSON_FORCE_OBJECT) }}">
            <template slot="delete-button-text"><i class="fa fa-times"></i> 削除</template>
            <template slot="add-button-text"><i class="fa fa-plus"></i> 追加</template>
        </add-test>
    </div>

    <script src="/js/main.js"></script>
        {{-- 削除機能に対応するjsを読み込ませる --}}
@endsection
