@extends('layouts.layout_front_top')

@section('description', 'プライバシーポリシーページ表示')

@section('keywords', 'キーワード1,キーワード2・・・')

@section('title', 'トップページ')

@section('pageCss')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/typingstyle.css') }}"> --}}
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
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
                        <img alt="王冠" src="{{ asset('assets/images/whitecrown.png') }}">
                        <h3>ランキング</h3>
                        <img alt="王冠" src="{{ asset('assets/images/whitecrown.png') }}">
                    </div>
                    <div class="selectWrap">
                        <form action="{{ route('top') }}" method="GET">
                            <select name="level_id" onchange="this.form.submit()" required>
                                <option {{ $selectedLevel == 1 ? 'selected' : '' }} value="1">初級コース</option>
                                <option {{ $selectedLevel == 2 ? 'selected' : '' }} value="2">中級コース</option>
                            </select>
                        </form>
                    </div>

                    @foreach ($languages as $language)
                        <div class="rankingArea">
                            <p class="rankingWordCategory">{{ $language->language_name }}</p>
                            <ul class="topWordRanking">
                                @php
                                    $scores = $scoresByLanguage[$language->id];
                                    $dummyDataCount = 3 - count($scores); // 3位までの表示に足りないデータの数
                                @endphp

                                @for ($i = 0; $i < 3; $i++)
                                    @if ($i === 0 && isset($scores[$i]))
                                        <li class="firstRank">
                                            <p class="rank rankingFontSize">{{ $i + 1 }}位</p>
                                            <p class="name rankingFontSize">{{ $scores[$i]->username }}</p>
                                            <p class="score rankingFontSize">{{ $scores[$i]->score }}点</p>
                                        </li>
                                    @elseif ($i === 1 && isset($scores[$i]))
                                        <li class="secondRank">
                                            <p class="rank  rankingFontSize">{{ $i + 1 }}位</p>
                                            <p class="name rankingFontSize">{{ $scores[$i]->username }}</p>
                                            <p class="score rankingFontSize">{{ $scores[$i]->score }}点</p>
                                        </li>
                                    @elseif ($i === 2 && isset($scores[$i]))
                                        <li class="thirdRank">
                                            <p class="rank rankingFontSize">{{ $i + 1 }}位</p>
                                            <p class="name rankingFontSize">{{ $scores[$i]->username }}</p>
                                            <p class="score rankingFontSize">{{ $scores[$i]->score }}点</p>
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
                    <p class="gameExplain">プログラミングでよく使う英単語のタイピングゲームができるWEBアプリです</p>
                    <div class="box" id="makeImg">
                        <div class="circle"></div>
                        @php
                            $path = route('game');
                        @endphp
                        <button id="startBtn" onclick="location.href='{{ $path }}'" type="button">
                            ゲームをする
                        </button>
                        <div class="circleBottom"></div>
                    </div>

                    <p class="warning">※こちらはパソコンで遊べるゲームです。</p>
                    <img alt="キャラクター" class="gameChara" src="{{ asset('assets/images/ptag_teup.svg') }}">
                    <img alt="キャラクター" class="gameChara2" src="{{ asset('assets/images/atag_teup.svg') }}">
                </section>

                <section class="gameSummary">
                    <p>プログラミングでよく使う英単語のタイピングゲームができるWEBアプリです。基本的な動きはJavaScriptで実装しております。何度も繰り返し挑戦することで、プログラミングで使う英単語のスペル習得、専門用語とタイピング速度の向上と意味の3つの力がつくと共にIT業界で、役立つ基本的な情報(知っトク情報)も喝采しておりますので、WEB関係の仕事を目指す方々の助けになれれば幸いです。
                    </p>
                </section>

                <section class="topRanking2">
                    <div class="ranking2">
                        <img alt="王冠" src="{{ asset('assets/images/whitecrown.png') }}">
                        <h3>ランキング</h3>
                        <img alt="王冠" src="{{ asset('assets/images/whitecrown.png') }}">
                    </div>
                    <div class="topRankingArea2">
                        <div class="selectWrap2">
                            <a class="{{ $selectedLevel == 1 ? 'selected' : '' }}"
                                href="{{ route('top') }}?level_id=1">初級コース</a>
                            <a class="{{ $selectedLevel == 2 ? 'selected' : '' }}"
                                href="{{ route('top') }}?level_id=2">中級コース</a>
                        </div>

                        <div class="ranking-panel">
                            @foreach ($languages as $language)
                                <div class="rankingArea2">
                                    <p class="rankingWordCategory">{{ $language->language_name }}</p>
                                    <table class="topWordRanking2">
                                        @php
                                            $scores = $scoresByLanguage[$language->id];
                                            $dummyDataCount = 3 - count($scores); // 3位までの表示に足りないデータの数
                                        @endphp
                                        @for ($i = 0; $i < 3; $i++)
                                            @if ($i === 0 && isset($scores[$i]))
                                                <tr class="firstRank">
                                                    <td class="rank">{{ $i + 1 }}位</td>
                                                    <td class="name">{{ $scores[$i]->username }}</td>
                                                    <td class="score">{{ $scores[$i]->score }}点</td>
                                                </tr>
                                            @elseif ($i === 1 && isset($scores[$i]))
                                                <tr class="secondRank">
                                                    <td class="rank">{{ $i + 1 }}位</td>
                                                    <td class="name">{{ $scores[$i]->username }}</td>
                                                    <td class="score">{{ $scores[$i]->score }}点</td>
                                                </tr>
                                            @elseif ($i === 2 && isset($scores[$i]))
                                                <tr class="thirdRank">
                                                    <td class="rank">{{ $i + 1 }}位</td>
                                                    <td class="name">{{ $scores[$i]->username }}</td>
                                                    <td class="score">{{ $scores[$i]->score }}点</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td class="rank">{{ $i + 1 }}位</td>
                                                    <td class="name">挑戦してね！</td>
                                                    <td class="score">00点</td>
                                                </tr>
                                            @endif
                                        @endfor
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                {{-- 知っトク情報 --}}
                <section class="infoNews">
                    <h3>知っトク情報</h3>
                    <div class="listBtn"><a href="{{ route('knowhow') }}">一覧を見る</a></div>
                    <p class="explain">サイト内の日々の更新をUPしていきます</p>
                    <p class="yellowLine"></p>
                    <ul class="infoList">
                        <!-- $items を使った表示や処理 -->
                        @if (isset($knowhows))
                            @foreach ($knowhows['items2'] as $item2)
                                <li><a href="{{ route('knowhow') }}?id={{ $item2->id }}">
                                        <img alt="{{ $item2->title }}" class="info-pho"
                                            src="{{ asset('storage/images') }}/{{ $item2->thumbnail }}">
                                        <span class="info-title">【{{ $item2->title }}】</span>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </section>

                {{-- 新着情報 --}}
                <section class="updateNews">

                    <h3>更新情報</h3>
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
                                {{-- <li><a href="{{ route('article') }}">{{ $timestamp->format('Y年m月d日') }}
                                        <span class="info-title">{{ $item->title }}</span></a>
                                    <p class="info-content">{{ $item->content }}</p>
                                </li> --}}
                                <li>{{ $timestamp->format('Y年m月d日') }}
                                    <span class="info-title">{{ $item->title }}</span>
                                    <p class="info-content">{{ $item->content }}</p>
                                </li>
                                {{-- <p class="updateLine"></p> --}}
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
