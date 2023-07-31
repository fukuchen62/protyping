<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    {{-- ディスカッション --}}
    <meta name="description" content="">

    {{-- キーワード --}}
    <meta name="keywords" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <!-- faviconを読み込む -->
    <link rel="icon" href="{{ asset('assets/images/icon/favicon.ico') }}" id="favicon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/icon/apple_touch_icon_180x180.png') }}">

    {{-- ページタイトル --}}
    <title>@yield('title')</title>

    <!-- 共通CSS -->
    <!-- reset.cssファイルを読み込む -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
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
</head>

<body>
    {{-- ヘッダー --}}
    @include('includes.front_top_header')

    {{-- メインコンテンツ --}}
    @yield('content')

    {{-- サイドコンテンツ --}}
    @yield('sidecontent')

    {{-- フッター --}}
    @include('includes.front_footer')

    <!-- 共通のjsファイル -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{-- 独自のJSファイルを読み込む --}}
    @yield('pageJs')
</body>

</html>
