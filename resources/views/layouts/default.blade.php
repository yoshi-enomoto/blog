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
    {{-- 追記 --}}
    @if (session('flash_message'))
      <div class="flash_message" onclick="this.classList.add('hidden')">{{ session('flash_message') }}</div>
    @endif

    {{-- 参照 --}}
{{--     @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Errors:</strong>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success">
            <strong>Success:</strong> {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('failure'))
        <div class="alert alert-danger">
            <strong>Failure:</strong> {{ Session::get('failure') }}
        </div>
    @endif --}}

    <div class="container">
        @yield('content')
    </div>
</body>
