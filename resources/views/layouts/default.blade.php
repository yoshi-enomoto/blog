{{-- 部品共通化用ファイル --}}
{{-- ページごとに変えたい・表示したい箇所に特殊な命令を書く --}}
{{-- @yield('~~~') --}}

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
