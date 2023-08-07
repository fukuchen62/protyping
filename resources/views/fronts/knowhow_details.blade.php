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
        <!-- パンくずリスト  -->
        <ol class="breadCrumb-001">
            <li><a href="{{ route('top') }}">ホーム</a></li>
            <li><a href="{{ route('knowhow') }}">知っトク情報一覧</a></li>
            <li>
                @if($_GET['param'] == 4)
                <a href="{{ route('details') . '?param=' . request()->query('param') }}">環境セットアップ</a>
                @elseif($_GET['param'] == 5)
                <a href="{{ route('details') . '?param=' . request()->query('param') }}">WordPress</a>
                @elseif($_GET['param'] == 6)
                <a href="{{ route('details') . '?param=' . request()->query('param') }}">おすすめWebアプリ</a>
                @elseif($_GET['param'] == 7)
                <a href="{{ route('details') . '?param=' . request()->query('param') }}">おすすめWebサイト</a>
                @elseif($_GET['param'] == 8)
                <a href="{{ route('details') . '?param=' . request()->query('param') }}">ショートカット</a>
                @elseif($_GET['param'] == 9)
                <a href="{{ route('details') . '?param=' . request()->query('param') }}">資格</a>
                @elseif($_GET['param'] == 10)
                <a href="{{ route('details') . '?param=' . request()->query('param') }}">Chrome拡張機能</a>
                @elseif($_GET['param'] == 11)
                <a href="{{ route('details') . '?param=' . request()->query('param') }}">卒業生の作品</a>
                @else
                <a href="{{ route('details') . '?param=' . request()->query('param') }}">？？？</a>
                @endif
            </li>
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

                {{ $items->links() }}
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
                    <li class="subMenu1 {{ request()->query('param') == 4 ? 'active' : '' }}"><a href="{{ route('details') . '?param=' . 4 }}">開発環境<br>セットアップ</a></li>
                    <li class="subMenu2 {{ request()->query('param') == 5 ? 'active' : '' }}"><a href="{{ route('details') . '?param=' . 5 }}">WordPress</a></li>
                    <li class="subMenu3 {{ request()->query('param') == 6 ? 'active' : '' }}"><a href="{{ route('details') . '?param=' . 6 }}">おすすめ<br>Webアプリ</a></li>
                    <li class="subMenu4 {{ request()->query('param') == 7 ? 'active' : '' }}"><a href="{{ route('details') . '?param=' . 7 }}">おすすめ<br>Webサイト</a></li>
                    <li class="subMenu5 {{ request()->query('param') == 8 ? 'active' : '' }}"><a href="{{ route('details') . '?param=' . 8 }}">ショートカット</a></li>
                    <li class="subMenu6 {{ request()->query('param') == 9 ? 'active' : '' }}"><a href="{{ route('details') . '?param=' . 9 }}">資格</a></li>
                    <li class="subMenu7 {{ request()->query('param') == 10 ? 'active' : '' }}"><a href="{{ route('details') . '?param=' . 10 }}">Chrome拡張機能</a></li>
                    <li class="subMenu8 {{ request()->query('param') == 11 ? 'active' : '' }}"><a href="{{ route('details') . '?param=' . 11 }}">卒業生の作品</a></li>

                </ul>
            </aside>
        </div>
    </div>
</main>
@endsection

@section('pageJs')
<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
