{{-- 部品共通化用ファイル --}}
{{-- ページごとに変えたい・表示したい箇所に特殊な命令を書く --}}
{{-- @yield('~~~') --}}

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <!-- Headタグ内に足す:vue -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/styles.css">
    <!-- Headタグ内に足す:vue -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <div id="app" class="container">
        @yield('content')
    </div>
</body>

<!-- body タグの最後に足す:vue -->
<script src=" {{ mix('js/app.js') }} "></script>
