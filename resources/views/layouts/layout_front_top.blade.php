<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    {{-- ディスカッション --}}
    {{-- <meta name="description" content="@yield('description')"> --}}
    <meta name="description" content="徳島県内の「道の駅」情報を発信していています。施設一覧やお土産特集などおさえておきたいコンテンツが盛りだくさんで観光やドライブに役立つこと間違いなし。">

    {{-- キーワード --}}
    {{-- <meta name="keywords" content="@yield('keywords')"> --}}
    <meta name="keywords" content="道の駅、情報、施設、一覧、お土産、観光">

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

    <!-- 共通のCSSファイル -->
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">

    {{-- バックエンドテスト用CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/test.css') }}">

    {{-- 独自のCSSファイルを読み込む --}}
    @yield('pageCss')

    <!-- jqueryライブラリ -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.3.min.js') }}"></script>

    {{-- トークンを読み込む --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    {{-- ヘッダー --}}
    @include('includes.front_top_header')

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
