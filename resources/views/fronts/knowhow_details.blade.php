@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title', '知っトク記事詳細')

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/css/shittoku_details.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/sittokubase.css') }}">
@endsection

@section('key_visual')
@endsection

{{-- メインコンテンツの内容 --}}
@section('content')
<main id="main" class="main">
    <div class="wrap">
        <p class="margin"><a href="{{ route('knowhow') }}">知っトク情報一覧</a></p>

        <!-- パンくずリスト  -->
        <ol class="breadCrumb-001">
            <li><a href="{{ route('top') }}">ホーム</a></li>
            <li><a href="{{ route('knowhow') }}">知っトク情報一覧</a></li>
            <li><a href="{{ route('details') . '?param=' . request()->query('param') }}">カテゴリ詳細</a></li>
        </ol>

        <!-- flexbox -->

        <div class="mainInner">
            <article class="mainContainer">
                <section class="titleArea">
                    <!-- タイトルコーナー -->
                    <h2 class="title">{{ $items[0]->title }}</h2>
                    <p class="overview">{!! $items[0]->summary_detail !!}</p>
                </section>

                @foreach ($items as $item)
                <section>
                    <p>{!! $item->content !!}</p>
                </section>
                @endforeach

                <!-- 一覧を見る -->
                <div class="linkBtnBox">
                    <a href="{{ route('knowhow') }}" class="linkBtn">一覧に戻る</a>
                </div>
            </article>

            <!-- サイドバー -->
            <aside class="sidebar">
                <!-- <nav class="globalNav">辞書</nav> -->
                <ul>
                    {{-- pram値の仕様を決めて入力する --}}
                    <li class="subMenu1 active"><a href="{{ route('details') . '?param=' . 1 }}">開発環境<br>セットアップ</a></li>
                    <li class="subMenu2"><a href="{{ route('details') . '?param=' . 2 }}">WordPress</a></li>
                    <li class="subMenu3"><a href="{{ route('details') . '?param=' . 3 }}">おすすめ<br>Webアプリ</a></li>
                    <li class="subMenu4"><a href="{{ route('details') . '?param=' . 4 }}">おすすめ<br>Webサイト</a></li>
                    <li class="subMenu5"><a href="{{ route('details') . '?param=' . 5 }}">ショートカット</a></li>
                    <li class="subMenu6"><a href="{{ route('details') . '?param=' . 6 }}">資格</a></li>
                    <li class="subMenu7"><a href="{{ route('details') . '?param=' . 7 }}">Chrome拡張機能</a></li>
                    <li class="subMenu8"><a href="{{ route('details') . '?param=' . 8 }}">卒業生の作品</a></li>
                </ul>
            </aside>
        </div>
    </div>
</main>
@endsection

@section('pageJs')
<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
