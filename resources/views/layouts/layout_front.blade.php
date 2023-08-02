<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    {{-- デディスクリプション --}}
    <meta name="description" content="@yield('description')">
    {{-- <meta name="description" content="description"> --}}
    {{-- キーワード --}}
    <meta name="keywords" content="@yield('keywords')">
    {{-- <meta name="keywords" content="keywords"> --}}

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <!-- faviconを読み込む -->
    <link rel="icon" href="{{ asset('assets/images/icon/favicon.ico') }}" id="favicon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/icon/apple_touch_icon_180x180.png') }}">

    {{-- ページタイトル --}}
    <title>@yield('title')</title>

    <!-- reset.cssファイルを読み込む -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <!-- 共通CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">

    {{-- 独自のCSSファイルを読み込む --}}
    @yield('pageCss')

    <!-- jqueryライブラリ -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.3.min.js') }}"></script>

    {{-- トークンを読み込む --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- フォント設定 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap"
        rel="stylesheet">

    <!-- アイコンフォント -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script defer src="https://use.fontawesome.com/releases/v6.4.0/js/all.js"></script>

</head>

<body>

    {{-- ヘッダー --}}
    @include('includes.front_header')

    {{-- keyビジュアル --}}
    @yield('key_visual')

    {{-- メインコンテンツ --}}
    @yield('content')

    {{-- フッター --}}
    @include('includes.front_footer')

    <!-- 共通のjsファイル -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{-- 独自のJSファイルを読み込む --}}
    @yield('pageJs')
</body>

</html>
