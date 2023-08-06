@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title', 'ランキング')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('assets/css/ranking.css') }}">
@endsection

@section('key_visual')
    {{-- メインコンテンツの内容 --}}
@endsection

@section('content')

    <!-- ここからメイン -->
    <main id="main" class="main">
        <div class="mainContent">

            <!-- パンくずリスト html-->
            <ol class="breadCrumb-001">
                <li><a href="../fronts/index.blade.php">ホーム</a></li>
                <li><a href="#">ランキング</a></li>
            </ol>

            <!-- タイトル -->
            <section class="info">
                <h2>ランキング</h2>
                <p>ランキングコースに挑戦し、ユーザーネームを登録するとこのページに反映されます。<br>ランキング1位目指して自分の限界に挑戦しよう！</p>
            </section>

            {{-- レベル切り替えボタン --}}
            <div class="levelButtons">
                <a href="{{ route('ranking', ['level_id' => 1]) }}"
                    class="levelButton {{ request()->query('level_id') == 1 ? 'active' : '' }}">初級</a>
                <a href="{{ route('ranking', ['level_id' => 2]) }}"
                    class="levelButton {{ request()->query('level_id') == 2 ? 'active' : '' }}">中級</a>
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

                                    {{-- @foreach ($languages as $language)
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
                                                    <div class="cardItemMoreThan">
                                                        <p>{{ $index + 1 }}位</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="nameScore">
                                                <p class="userName">{{ $score->username }}</p>
                                                <p class="score">{{ $score->score }}点</p>
                                            </div>
                                        </div>
                                    @endforeach --}}
                                @else
                                    <!-- 代替テキストを表示するためのダミーデータ -->
                                    @for ($i = 0; $i < 10; $i++)
                                        <div class="cardItem">
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
                    <a href="{{ route('myscore') }}" class="viewBtn">マイスコアを見る</a>
                </div>
            </div>

        </div>
    </main>


@endsection

@section('pageJs')
@endsection
