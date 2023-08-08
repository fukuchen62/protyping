@extends('layouts.layout_front')

@section('description',
    'WEB業界に進むための知識が欲しい、タイピング速度の向上のためのスキルを磨きたい人向けの知っトク情報！開発環境やおすすめのWEBアプリ、ショートカットや便利な資格など多彩な知っトク情報を発信中です！')

@section('keywords')

@section('title', '知っトク情報一覧')

@section('pageCss')
    <link href="{{ asset('assets/css/shittoku.css') }}" rel="stylesheet">
@endsection

@section('key_visual')
@endsection

{{-- メインコンテンツの内容 --}}
@section('content')
    <main class="main" id="main">
        <div class="wrap">
            <!-- パンくずリスト html-->
            <ol class="breadCrumb-001">
                <li><a href="{{ route('top') }}">ホーム</a>
                </li>
                <li><a href="{{ route('knowhow') }}">知っトク情報一覧</a></li>
            </ol>


            <section>
                <h2 class="title">知っトク情報一覧</h2>

                <p class="overview">こんにちは！私たちのサイトにお越しいただきありがとうございます！このページではIT業界に進んでいく上で知っトクと便利な情報を載せています！ぜひ活用して下さい(^^)!
                </p>
            </section>

            <!-- 大枠の Flexbox（親） -->
            <div class="shittokuFlex">
                <!-- メインコンテンツ 100%-176px -->
                <div class="mainContainer">
                    <div class="mainContainerInner">

                        <!-- 画像の Flexbox（親） -->
                        <div class="imgFlex">
                            <!--  1 開発環境セットアップ  -->
                            <section class="flexItem flexItem1">
                                <h3 class="flexItemTitle">開発環境セットアップ</h3>
                                <a href="{{ route('details', ['param' => '4']) }}">
                                    <img alt="環境開発セットアップ" class="flexItemImage"
                                        src="{{ asset('assets/images/shittoku_dami-.jpg') }}">
                                </a>
                                @foreach ($items as $key => $item)
                                    @if ($key == 3)
                                        <p class="flexItemText">{!! $item->summary !!}</p>
                                    @endif
                                @endforeach
                            </section>
                            <!-- 2  WordPress  -->
                            <section class="flexItem flexItem1">
                                <h3 class="flexItemTitle">wordpress</h3>
                                <a href="{{ route('details', ['param' => '5']) }}">
                                    <img alt="wordpress" class="flexItemImage"
                                        src="{{ asset('assets/images/shittoku_dami-.jpg') }}">
                                </a>
                                @foreach ($items as $key => $item)
                                    @if ($key == 4)
                                        <p class="flexItemText">{!! $item->summary !!}</p>
                                    @endif
                                @endforeach
                            </section>
                            <!-- 3 おすすめWebアプリ  -->
                            <section class="flexItem flexItem1">
                                <h3 class="flexItemTitle">おすすめWebアプリ</h3>
                                <a href="{{ route('details', ['param' => '6']) }}">
                                    <img alt="おすすめWebアプリ" class="flexItemImage"
                                        src="{{ asset('assets/images/shittoku_dami-.jpg') }}">
                                </a>
                                @foreach ($items as $key => $item)
                                    @if ($key == 5)
                                        <p class="flexItemText">{!! $item->summary !!}</p>
                                    @endif
                                @endforeach
                            </section>
                            <!--  4 おすすめWebサイト-->
                            <section class="flexItem flexItem1">
                                <h3 class="flexItemTitle">おすすめWebサイト</h3>
                                <a href="{{ route('details', ['param' => '7']) }}">
                                    <img alt="おすすめWebサイト" class="flexItemImage"
                                        src="{{ asset('assets/images/shittoku_dami-.jpg') }}">
                                </a>
                                @foreach ($items as $key => $item)
                                    @if ($key == 6)
                                        <p class="flexItemText">{!! $item->summary !!}</p>
                                    @endif
                                @endforeach
                            </section>
                            <!-- 5 ショートカット -->
                            <section class="flexItem flexItem1">
                                <h3 class="flexItemTitle">ショートカット</h3>
                                <a href="{{ route('details', ['param' => '8']) }}">
                                    <img alt="ショートカット" class="flexItemImage"
                                        src="{{ asset('assets/images/shittoku_dami-.jpg') }}">
                                </a>
                                @foreach ($items as $key => $item)
                                    @if ($key == 7)
                                        <p class="flexItemText">{!! $item->summary !!}</p>
                                    @endif
                                @endforeach
                            </section>
                            <!-- 6 資格 -->
                            <section class="flexItem flexItem1">
                                <h3 class="flexItemTitle">資格</h3>
                                <a href="{{ route('details', ['param' => '9']) }}">
                                    <img alt="資格" class="flexItemImage"
                                        src="{{ asset('assets/images/shittoku_dami-.jpg') }}">
                                </a>
                                @foreach ($items as $key => $item)
                                    @if ($key == 8)
                                        <p class="flexItemText">{!! $item->summary !!}</p>
                                    @endif
                                @endforeach
                            </section>
                            <!-- 7 Chrome拡張機能 -->
                            <section class="flexItem flexItem1">
                                <h3 class="flexItemTitle">Chrome拡張機能</h3>
                                <a href="{{ route('details', ['param' => '10']) }}">
                                    <img alt="Chrome拡張機能" class="flexItemImage"
                                        src="{{ asset('assets/images/shittoku_dami-.jpg') }}">
                                </a>
                                @foreach ($items as $key => $item)
                                    @if ($key == 9)
                                        <p class="flexItemText">{!! $item->summary !!}</p>
                                    @endif
                                @endforeach
                            </section>
                            <!-- 8 卒業生の作品 -->
                            <section class="flexItem flexItem1">
                                <h3 class="flexItemTitle">卒業生の作品</h3>
                                <a href="{{ route('details', ['param' => '11']) }}">
                                    <img alt="卒業生の作品" class="flexItemImage"
                                        src="{{ asset('assets/images/shittoku_dami-.jpg') }}">
                                </a>
                                @foreach ($items as $key => $item)
                                    @if ($key == 10)
                                        <p class="flexItemText">{!! $item->summary !!}</p>
                                    @endif
                                @endforeach
                            </section>

                        </div>
                    </div>
                </div>


                <!-- サイドバー -->
                <aside class="sidebar">
                    <!-- <nav class="globalNav">辞書</nav> -->
                    <ul>
                        <li class="globalNav">知っトク情報一覧</li>
                        <li class="subMenu1"><a href="{{ route('details', ['param' => '4']) }}">開発環境セットアップ</a></li>
                        <li class="subMenu2"><a href="{{ route('details', ['param' => '5']) }}">WordPress</a></li>
                        <li class="subMenu3"><a href="{{ route('details', ['param' => '6']) }}">おすすめWebアプリ</a></li>
                        <li class="subMenu4"><a href="{{ route('details', ['param' => '7']) }}">おすすめWebサイト</a></li>
                        <li class="subMenu5"><a href="{{ route('details', ['param' => '8']) }}">ショートカット</a></li>
                        <li class="subMenu6"><a href="{{ route('details', ['param' => '9']) }}">資格</a></li>
                        <li class="subMenu7"><a href="{{ route('details', ['param' => '10']) }}">Chrome拡張機能</a></li>
                        <li class="subMenu8"><a href="{{ route('details', ['param' => '11']) }}">卒業生の作品</a></li>
                    </ul>
                </aside>
            </div>
        </div>
    </main>
@endsection

@section('pageJs')
@endsection
