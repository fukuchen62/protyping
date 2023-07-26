<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    {{-- デディスクリプション --}}
    <!-- <meta name="description" content="@yield('description')"> -->
    <meta name="description" content="徳島県内の「道の駅」の検策、体験、グルメ、お土産、特産品、工芸品、レビューなど。アクティビティを体験したり実際に訪れて感じた事をテーマにしたブログは必見！">

    {{-- キーワード --}}
    <!-- <meta name="keywords" content="@yield('keywords')"> -->
    <meta name="keywords" content="道の駅、検索、徳島、エリア検索、人気、道の駅一覧">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <!-- ファビコン -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">

    {{-- ページタイトル --}}
    <title>@yield('title')</title>

    <!-- reset.cssファイルを読み込む -->
    <link rel=" stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <!-- 共通のCSSファイル -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}"> --}}

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
