@extends('layouts.layout_front')

@section('description',
    'Web業界に進むための知識が欲しい、タイピング速度の向上のためのスキルを磨きたい人向けの知っトク情報！開発環境やWordPressの説明、おすすめのWebアプリやサイトやショートカット、役立つ資格やChromeの拡張機能、過去の卒業生の作品を掲載しております！')

@section('keywords')

@section('title', '知っトク情報詳細｜タイピングゲーム「タイプコード」')

@section('pageCss')
    <link href="{{ asset('assets/css/shittoku_details.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sittokubase.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet">
@endsection

@section('key_visual')
@endsection

{{-- メインコンテンツの内容 --}}
@section('content')
    <main class="main" id="main">
        <div class="wrap">
            <!-- パンくずリスト  -->
            <ol class="breadCrumb-001">
                <li><a href="{{ route('top') }}">ホーム</a></li>
                <li><a href="{{ route('knowhow') }}">知っトク情報一覧</a></li>
            </ol>

            <!-- flexbox -->

            <div class="mainInner">
                <article class="mainContainer">
                    <!-- タイトルコーナー -->
                    <h2 class="">{{ $post->title }}</h2>

                    <section class="titleArea">
                        <div class="">{!! $post->summary_detail !!}</div>
                    </section>

                    <section class="shittokuFlex">
                        <div class="contentBox">{!! $post->content !!}</div>


                        <!-- サイドバー -->
                        <aside class="sidebar">
                            <!-- <nav class="globalNav">辞書</nav> -->
                            <ul>
                                <li class="globalNav">その他の知っトク情報</li>

                                @foreach ($posts as $key => $item)
                                    <li class="subMenu{{ $key + 1 }} }}"><a
                                            href="{{ route('details') }}?id={{ $item->id }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </aside>
                    </section>

                    {{-- {{ $items->links() }} --}}

                    <!-- 一覧を見る -->
                    <div class="linkBtnBox">
                        <a class="linkBtn" href="{{ route('knowhow') }}">一覧に戻る</a>
                    </div>
                </article>
            </div>
        </div>
    </main>
@endsection

@section('pageJs')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
