<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    {{-- ディスカッション --}}
    <!-- <meta name="description" content="@yield('description')"> -->
    <meta name="description" content="">
    {{-- キーワード --}}
    <!-- <meta name="keywords" content="@yield('keywords')"> -->
    <meta name="keywords" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <!-- faviconを読み込む -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">

    {{-- ページタイトル --}}
    <title>@yield('title')</title>

    <!-- reset.cssファイルを読み込む -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">

    <!-- 共通のCSSファイル -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

    {{-- 独自のCSSファイルを読み込む --}}
    @yield('pageCss')

    <!-- jqueryライブラリ -->
    <script src="{{ asset('assets/js/ventor/jquery-3.6.3.min.js') }}"></script>

    {{-- main.jsを読み込む --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{-- トークンを読み込む --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div id="wrap">
        {{-- ヘッダー --}}
        @include('includes.back_header')

        {{-- メインコンテンツ --}}
        <main class="main">
            {{-- メニュー --}}
            @include('includes.back_menu')

            <section class="workspace container">
                {{-- サブタイトル --}}
                <div class="subtitle mb10">
                    <h2>@yield('subtitle')</h2>
                </div>

                {{-- ワークスペース --}}
                <div class="content mb10">
                    @yield('content')
                </div>
            </section>
        </main>

        {{-- フッター --}}
        @include('includes.back_footer')
    </div>

    {{-- 独自のJSファイルを読み込む --}}
    @yield('pageJs')
</body>

</html>
