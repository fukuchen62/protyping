@extends('layouts.layout_front_top')

@section('discription')

@section('keywords')

@section('title', 'トップページ')

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/css/typingstyle.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endsection

@section('key_visual')
@endsection

{{-- メインコンテンツの内容 --}}
@section('content')

<div class="wrap">
    <main class="main">

        <section class="topRanking">
            <div class="topRankingArea">
                <div class="ranking">
                    <img src="../assets/images/whitecrown.png" alt="王冠">
                    <h6>ランキング</h6>
                    <img src="../assets/images/whitecrown.png" alt="王冠">
                </div>
                <div class="selectWrap">
                    <nav class="word">
                        <div style="display: inline-block;">
                            <a href="{{ route('top', ['level_id' => 1]) }}" style="display: inline-block; padding: 10px 20px; background-color: #3490dc; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 16px;">
                                初級
                            </a>
                        </div>
                        <div style="display: inline-block;">
                            <a href="{{ route('top', ['level_id' => 2]) }}" style="display: inline-block; padding: 10px 20px; background-color: #3490dc; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 16px;">
                                中級
                            </a>
                        </div>
                    </nav>
                </div>


                @foreach ($languages as $language)
                <div class="rankingArea">
                    <p class="rankingWordCategory">{{ $language->language_name }}</p>
                    <ul class="topWordRanking">
                        @php
                        $scores = $scoresByLanguage[$language->id];
                        $dummyDataCount = 3 - count($scores); // 3位までの表示に足りないデータの数
                        @endphp

                        @for ($i = 0; $i < 3; $i++) @if ($i===0 && isset($scores[$i])) <li class="firstRank">
                            <p class="rank">{{ $i + 1 }}位</p>
                            <p class="name">{{ $scores[$i]->username }}</p>
                            <p class="score">{{ $scores[$i]->score }}点</p>
                            </li>
                            @elseif ($i === 1 && isset($scores[$i]))
                            <li class="secondRank">
                                <p class="rank">{{ $i + 1 }}位</p>
                                <p class="name">{{ $scores[$i]->username }}</p>
                                <p class="score">{{ $scores[$i]->score }}点</p>
                            </li>
                            @elseif ($i === 2 && isset($scores[$i]))
                            <li class="thirdRank">
                                <p class="rank">{{ $i + 1 }}位</p>
                                <p class="name">{{ $scores[$i]->username }}</p>
                                <p class="score">{{ $scores[$i]->score }}点</p>
                            </li>
                            @else
                            <li>
                                <p class="rank">{{ $i + 1 }}位</p>
                                <p class="name">挑戦してね！</p>
                                <p class="score">00点</p>
                            </li>
                            @endif
                            @endfor
                    </ul>
                </div>
                @endforeach


            </div>
        </section>



        <!-- ゲーム画面１ -->
        <div class="topLeftArea">
            <section id="gameBody">
                <h2 id="gameTitle">GAME</h2>
                <div class="box" id="makeImg">
                    <div class="circle"></div>
                    <button id="startBtn" type="button">
                        <a href="{{ route('game') }}">
                            <p>ゲームをする</p>
                        </a>
                    </button>
                    <div class="circleBottom"></div>
                </div>
                <!-- <button id="startBtn" type="button">
                    <a href="../html/typing_game.html">ゲームをする</a>
                </button> -->
                <p class="warning">※こちらはパソコンで遊べるゲームです。</p>
                <img class="gameChara" src="../assets/images/cat.jpg" alt="">
            </section>

            <section class="gameSummary">
                <p>プログラミングでよく使う英単語のタイピングゲームができるWEBアプリです。基本的な動きはJavaScriptで実装しております。何度も繰り返し挑戦することで、プログラミングで使う英単語のスペル習得、専門用語とタイピング速度の向上と意味の3つの力がつくと共にIT業界で、役立つ基本的な情報(知っトク情報)も喝采しておりますので、WEB関係の仕事を目指す方々の助けになれれば幸いです。
                    </p>
            </section>

            {{-- 知っトク情報 --}}
            <section class="infoNews">
                <h5>知っトク情報</h5>
                <div class="listBtn"><a href="{{ route('knowhow') }}">一覧を見る</a></div>
                <p class="explain">サイト内の日々の更新をUPしていきます</p>
                <p class="yellowLine"></p>
                <ul class="infoList">
                    <!-- $items を使った表示や処理 -->
                    @if (isset($knowhows))
                    @foreach ($knowhows['items2'] as $item2)
                    <li> <a href="../html/shittoku.html"><img src="assets/images/thumbnail/{{ $item2->thumbnail }}" alt="{{ $item2->title }}">
                            <span>【{{ $item2->title }}】</span></a>
                    </li>

                    @endforeach
                    @endif
                </ul>
            </section>

            {{-- 新着情報 --}}
            <section class="updateNews">

                <h5>更新情報</h5>
                <div class="listBtn"><a href="{{ route('article') }}">一覧を見る</a></div>
                <p class="explain">サイト内の日々の更新をUPしていきます</p>
                <p class="yellowLine"></p>
                <!-- $items を使った表示や処理 -->
                @if (isset($news))
                @foreach ($news['items'] as $item)
                @php
                $timestamp = \Carbon\Carbon::parse($item->created_at);
                @endphp
                <ul class="updateList">
                    <li> <a href="{{ route('article') }}">{{ $timestamp->format('Y年m月d日') }}<br>
                            <span>{{ $item->title }}</span></a>
                    </li>
                    <p class="updateLine"></p>
                </ul>
                @endforeach
                @endif
            </section>
        </div>
    </main>
</div>

@endsection

@section('pageJs')
@endsection
