@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title', 'ランキング')

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/css/ranking.css') }}">
<style>
    .levelButtons {
        text-align: center;
        margin-bottom: 20px;
    }

    .levelButton {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 10px;
        text-decoration: none;
        color: #fff;
        background-color: #26567c;
        border-radius: 5px;
        font-size: 2em;
    }

    .levelButton.active {
        background-color: #5FBFED;
    }
</style>
@endsection

@section('key_visual')
{{-- メインコンテンツの内容 --}}
@endsection

@section('content')

<!-- ここからメイン -->
<main id="main" class="main">
    <div class="mainContent">
        <!-- パンくずリスト -->
        <div class="breadCrumb">パンくずリスト</div>

        <!-- タイトル -->
        <section class="info">
            <h2>ランキング</h2>
            <p>ランキングコースに挑戦し、ユーザーネームを登録するとこのページに反映されます。<br>ランキング1位目指して自分の限界に挑戦しよう！</p>
        </section>

        <!-- プルダウンメニュー -->
        <div class="selectWrap">
            <select onchange="window.location.href = this.value;">
                <option value="{{ route('ranking', ['level_id' => 1]) }}" {{ request()->query('level_id') == 1 ? 'selected' : '' }}>初級</option>
                <option value="{{ route('ranking', ['level_id' => 2]) }}" {{ request()->query('level_id') == 2 ? 'selected' : '' }}>中級</option>
            </select>
        </div>

        <!-- 言語選択 -->
        <nav class="word">
            <div>
                <img src="../assets/images/arrow.png" alt="↓ボタン">
                <a href="#language_6">プログラミングで使う英単語</a>
            </div>
            <div>
                <img src="../assets/images/arrow.png" alt="↓ボタン">
                <a href="#language_1">HTML</a>
            </div>
            <div>
                <img src="../assets/images/arrow.png" alt="↓ボタン">
                <a href="#language_2">css</a>
            </div>
            <div>
                <img src="../assets/images/arrow.png" alt="↓ボタン">
                <a href="#language_3">JavaScript</a>
            </div>
            <div>
                <img src="../assets/images/arrow.png" alt="↓ボタン">
                <a href="#language_4">PHP</a>
            </div>
            <div>
                <img src="../assets/images/arrow.png" alt="↓ボタン">
                <a href="#language_5">Python</a>
            </div>
        </nav>

        <!-- ここから動的 -->
        <section class="rankingWrap">
            <div class="rankingInner">


                @foreach ($languages as $language)
                <div class="card">
                    <h3 id="language_{{ $language->id }}">{{ $language->language_name }}</h3>
                    <div class="cardInner">
                        @if (count($scoresByLanguage[$language->id]) > 0)
                        @foreach ($scoresByLanguage[$language->id] as $index => $score)
                        <div class="cardItem">
                            <div class="position">
                                @if ($index === 0)
                                <img src="{{ asset('assets/images/gold_crown.png') }}" alt="1位王冠">
                                <p>1位</p>
                                @elseif ($index === 1)
                                <img src="{{ asset('assets/images/silver_crown.png') }}" alt="2位王冠">
                                <p>2位</p>
                                @elseif ($index === 2)
                                <img src="{{ asset('assets/images/bronze_crown.png') }}" alt="3位王冠">
                                <p>3位</p>
                                @else
                                <p>{{ $index + 1 }}位</p>
                                @endif
                            </div>
                            <p class="userName">{{ $score->username }}</p>
                            <p class="score">{{ $score->score }}点</p>
                        </div>
                        @endforeach
                        @else
                        <!-- 代替テキストを表示するためのダミーデータ -->
                        @for ($i = 0; $i < 10; $i++) <div class="cardItem">
                            <div class="position">
                                <p>{{ $i + 1 }}位</p>
                            </div>
                            <p class="userName">挑戦してね！</p>
                            <p class="score">00点</p>
                    </div>
                    @endfor
                    @endif
                </div>
            </div>
            @endforeach


    </div>
    </section>

    <!-- ランキング、マイスコアボタン -->
    <div class="btnWrap">
        <div class="gameChallenge">
            <a href="" class="challengeBtn">ゲームに挑戦</a>
        </div>
        <div class="viewMyscore">
            <a href="" class="viewBtn">マイスコアを見る</a>
        </div>
    </div>

    </div>
</main>


@endsection

@section('pageJs')
@endsection
