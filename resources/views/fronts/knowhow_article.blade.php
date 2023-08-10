@extends('layouts.layout_front')

@section('description',
    'Web業界に進むための知識が欲しい、タイピング速度の向上のためのスキルを磨きたい人向けの知っトク情報！開発環境やおすすめのWebアプリ、ショートカットや便利な資格など多彩な知っトク情報を発信中です！')

@section('keywords')

@section('title', '知っトク情報一覧｜タイピングゲーム「タイプコード」')

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
                <h2 class="title">知っトク情報一覧 ({{ $count }})</h2>

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
                            @foreach ($knowhows as $item)
                                <section class="flexItem flexItem1">
                                    <h3 class="flexItemTitle">{{ $item->title }}</h3>
                                    <a href="{{ route('details') }}?id={{ $item->id }}">
                                        <img alt="{{ $item->thumbnail }}" class="flexItemImage"
                                            src="{{ asset('storage/images') }}/{{ $item->thumbnail }}">
                                    </a>
                                    <p class="flexItemText">{!! $item->summary !!}</p>
                                </section>
                            @endforeach

                        </div>
                    </div>
                </div>

                <!-- サイドバー -->
                <aside class="sidebar">
                    <ul>
                        <li class="globalNav">知っトク情報カテゴリ</li>
                        <li class="subMenu {{ $cate_id == 0 ? 'active' : '' }}"><a
                                href="{{ route('knowhow') }}?cate_id=0">全記事</a>
                        </li>
                        @foreach ($post_category as $key => $item)
                            <li class="subMenu {{ $item->id == $cate_id ? 'active' : '' }}">
                                <a href="{{ route('knowhow') }}?cate_id={{ $item->id }}">{{ $item->category_name }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </aside>
            </div>
        </div>
    </main>
@endsection

@section('pageJs')
@endsection
