@extends('layouts.layout_front')

@section('description', 'スコアが良ければランキングに名前を残すことができます。')

@section('keywords')

@section('title', 'ランキング｜タイプコード')

@section('pageCss')
    <link href="{{ asset('assets/css/ranking.css') }}" rel="stylesheet">
@endsection

@section('key_visual')
    {{-- メインコンテンツの内容 --}}
@endsection

@section('content')

    <!-- ここからメイン -->
    <main class="main" id="main">
        <div class="mainContent">

            <!-- パンくずリスト html-->
            <ol class="breadCrumb-001">
                <li><a href="{{ route('top') }}">ホーム</a></li>
                <li><a href="{{ route('ranking') }}">ランキング</a></li>
            </ol>

            <!-- タイトル -->
            <section class="info">
                <h2>ランキング</h2>
                <p>ランキングコースに挑戦し、ユーザーネームを登録するとこのページに反映されます。<br>ランキング1位目指して自分の限界に挑戦しよう！</p>
            </section>

            {{-- コース選択 --}}
            <div class="levelButtons">
                <a class="levelButton {{ request()->query('level_id') == 1 || !request()->has('level_id') ? 'active' : '' }}"
                    href="{{ route('ranking', ['level_id' => 1]) }}">初級コース</a>
                <a class="levelButton {{ request()->query('level_id') == 2 ? 'active' : '' }}"
                    href="{{ route('ranking', ['level_id' => 2]) }}">中級コース</a>
            </div>

            {{-- 言語選択ボタン --}}
            {{-- <nav class="word">
                @foreach ($languages as $language)
                    <div>
                        <img alt="↓ボタン" src="{{ asset('assets/images/arrow.png') }}">
                        <a href="#language_{{ $language['id'] }}">{{ $language['language_name'] }}</a>
                    </div>
                @endforeach
            </nav> --}}

            <nav class="word">
                @foreach ($languages as $language)
                    <div style="cursor: pointer;" onclick="window.location.href = '#language_{{ $language['id'] }}';">
                        <a href="#language_{{ $language['id'] }}">
                            <img alt="↓ボタン" src="{{ asset('assets/images/arrow.png') }}">
                            {{ $language['language_name'] }}
                        </a>
                    </div>
                @endforeach
            </nav>

            <!-- ランキングカード -->
            <section class="rankingWrap">
                <div class="rankingInner">


                    @foreach ($languages as $language)
                        <div class="card">
                            <h3 id="language_{{ $language->id }}">{{ $language->language_name }}</h3>
                            <div class="cardInner">
                                @if (count($scoresByLanguage[$language->id]) > 0)
                                    <table class="scoreTable">
                                        <tbody>
                                            @foreach ($scoresByLanguage[$language->id] as $index => $score)
                                                <tr>
                                                    <td class="rank position">
                                                        @if ($index === 0)
                                                            <img alt="1位王冠"
                                                                src="{{ asset('assets/images/gold_crown.png') }}">
                                                            <div class="hirank">1位</div>
                                                        @elseif ($index === 1)
                                                            <img alt="2位王冠"
                                                                src="{{ asset('assets/images/silver_crown.png') }}">
                                                            <div class="hirank">2位</div>
                                                        @elseif ($index === 2)
                                                            <img alt="3位王冠"
                                                                src="{{ asset('assets/images/bronze_crown.png') }}">
                                                            <div class="hirank">3位</div>
                                                        @else
                                                            {{ $index + 1 }}位
                                                        @endif
                                                    </td>
                                                    <td class="userName">{{ $score->username }}</td>
                                                    <td class="score">{{ $score->score }}点</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <!-- 代替テキストを表示するためのダミーデータ -->
                                    @for ($i = 0; $i < 10; $i++)
                                        <tr>
                                            <td class="rank">{{ $i + 1 }}位</td>
                                            <td class="userName">挑戦してね！</td>
                                            <td class="score">00点</td>
                                        </tr>
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
                    <a class="challengeBtn" href="{{ route('game') }}">ゲームに挑戦</a>
                </div>
                <div class="viewMyscore">
                    <a class="viewBtn" href="{{ route('myscore') }}">マイスコアを見る</a>
                </div>
            </div>

        </div>
    </main>


@endsection

@section('pageJs')
@endsection
