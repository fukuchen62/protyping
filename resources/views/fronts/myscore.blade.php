@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title', 'マイスコア')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('assets/css/myscore.css') }}">
@endsection

@section('key_visual')
@endsection

{{-- メインコンテンツの内容 --}}
@section('content')


    <main id="main" class="main">



        <div class="mainContent">
            <!-- パンくずリスト -->
            <ol class="breadCrumb-001">
                <li><a href="{{ route('top') }}">ホーム</a></li>
                <li><a href="{{ route('myscore') }}">マイスコア</a></li>
            </ol>


            <div>
                <form action="{{ route('game') }}" method="POST">
                    @csrf
                    <div>成績：<input type="text" name="score" value="100"></div>
                    <div>言語ID：<input type="text" name="language_id" value="1"></div>
                    <div>レベル：<input type="text" name="level_id" value="1"></div>
                    <div>ユーザーID：<input type="text" name="user_id" value="0"></div>
                    <div>名前：<input type="text" name="username" value="test"></div>
                    <div><input type="submit" value="OK"></div>
                </form>
            </div>

            <!-- タイトル -->
            <section class="info">
                <h2>マイスコア</h2>
                <p>ランキングコースに挑戦し、ユーザーネームを登録するとこのページに反映されます。<br>自己ベスト更新目指して頑張ろう！</p>
            </section>

            {{-- レベル切り替えボタン --}}
            <div class="levelButtons">
                <a href="{{ route('myscore', ['level_id' => 1]) }}"
                    class="levelButton {{ request()->query('level_id') == 1 ? 'active' : '' }}">初級</a>
                <a href="{{ route('myscore', ['level_id' => 2]) }}"
                    class="levelButton {{ request()->query('level_id') == 2 ? 'active' : '' }}">中級</a>
            </div>

            <!-- 言語選択 -->
            <nav class="word">
                <div>
                    <img src="../assets/images/arrow.png" alt="↓ボタン">
                    <a href="#engword">プログラミングで使う英単語</a>
                </div>
                <div>
                    <img src="../assets/images/arrow.png" alt="↓ボタン">
                    <a href="#html">HTML</a>
                </div>
                <div>
                    <img src="../assets/images/arrow.png" alt="↓ボタン">
                    <a href="#css">css</a>
                </div>
                <div>
                    <img src="../assets/images/arrow.png" alt="↓ボタン">
                    <a href="#javascript">JavaScript</a>
                </div>
                <div>
                    <img src="../assets/images/arrow.png" alt="↓ボタン">
                    <a href="#php">PHP</a>
                </div>
                <div>
                    <img src="../assets/images/arrow.png" alt="↓ボタン">
                    <a href="#python">Python</a>
                </div>
            </nav>


            <!-- ここから動的 -->
            <section class="scoreWrap">

                <!-- ユーザーネーム -->
                <!-- 人とゆーざーを囲うdiv -->
                <div class="usernameWrap">
                    <!-- <div class="usernameInner"> -->
                    <!-- 人のシルエット背景 -->
                    <div class="icon">
                        <img src="{{ asset('assets/images/human.png') }}" alt="人アイコン">
                    </div>

                    {{-- <div class="usernameItem">
                    <div class="itemFirst">
                        <p>ユーザーネーム</p>
                    </div>
                    <div class="itemSecond">
                        <p>しんちゃん</p>
                    </div>
                </div> --}}
                    <!-- </div> -->
                </div>

                <!--カード全体を囲う枠 -->
                <div class="cardWrap">
                    <div class="cardList">

                        <div class="listInner">
                            <h3 id="html">HTML</h3>
                            <div class="cardInner">
                                <div class="history">
                                    {{-- <p>履歴（過去Best3）</p> --}}
                                </div>
                                <div class="scoreList">
                                    <div class="scoreLine">
                                        <div class="scoreItem">
                                            <p>Score</p>
                                        </div>
                                        <div class="scoreItem">
                                            <p class="triangle">▶▶▶</p>
                                        </div>
                                        <div class="scoreItem">
                                            @if (request()->hasCookie('saved_data1'))
                                                <p class="score">{{ request()->cookie('saved_data1') }}点</p>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="scoreLine">

                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div>
                                <div class="scoreLine">
                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="listInner">
                            <h3 id="css">CSS</h3>
                            <div class="cardInner">
                                <div class="history">
                                    {{-- <p>履歴（過去Best3）</p> --}}
                                </div>
                                <div class="scoreList">
                                    <div class="scoreLine">
                                        <div class="scoreItem">
                                            <p>Score</p>
                                        </div>
                                        <div class="scoreItem">
                                            <p class="triangle">▶▶▶</p>
                                        </div>
                                        <div class="scoreItem">
                                            @if (request()->hasCookie('saved_data2'))
                                                <p class="score">{{ request()->cookie('saved_data2') }}点</p>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="scoreLine">

                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div>
                                <div class="scoreLine">
                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="listInner">
                            <h3 id="javascrip">JavaScript</h3>
                            <div class="cardInner">
                                <div class="history">
                                    {{-- <p>履歴（過去Best3）</p> --}}
                                </div>
                                <div class="scoreList">
                                    <div class="scoreLine">
                                        <div class="scoreItem">
                                            <p>Score</p>
                                        </div>
                                        <div class="scoreItem">
                                            <p class="triangle">▶▶▶</p>
                                        </div>
                                        <div class="scoreItem">
                                            @if (request()->hasCookie('saved_data3'))
                                                <p class="score">{{ request()->cookie('saved_data3') }}点</p>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="scoreLine">

                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div>
                                <div class="scoreLine">
                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="listInner">
                            <h3 id="php">PHP</h3>
                            <div class="cardInner">
                                <div class="history">
                                    {{-- <p>履歴（過去Best3）</p> --}}
                                </div>
                                <div class="scoreList">
                                    <div class="scoreLine">
                                        <div class="scoreItem">
                                            <p>Score</p>
                                        </div>
                                        <div class="scoreItem">
                                            <p class="triangle">▶▶▶</p>
                                        </div>
                                        <div class="scoreItem">
                                            @if (request()->hasCookie('saved_data4'))
                                                <p class="score">{{ request()->cookie('saved_data4') }}点</p>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="scoreLine">

                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div>
                                <div class="scoreLine">
                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="listInner">
                            <h3 id="python">Python</h3>
                            <div class="cardInner">
                                <div class="history">
                                    {{-- <p>履歴（過去Best3）</p> --}}
                                </div>
                                <div class="scoreList">
                                    <div class="scoreLine">
                                        <div class="scoreItem">
                                            <p>Score</p>
                                        </div>
                                        <div class="scoreItem">
                                            <p class="triangle">▶▶▶</p>
                                        </div>
                                        <div class="scoreItem">
                                            @if (request()->hasCookie('saved_data5'))
                                                <p class="score">{{ request()->cookie('saved_data5') }}点</p>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="scoreLine">

                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div>
                                <div class="scoreLine">
                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="listInner">

                            <h3 id="engword">プログラミングで使う英単語</h3>
                            <div class="cardInner">
                                <div class="history">
                                    {{--
                                <p>履歴（過去Best3）</p> --}}
                                </div>
                                <div class="scoreList">
                                    <div class="scoreLine">
                                        <div class="scoreItem">
                                            <p>Score</p>
                                        </div>
                                        <div class="scoreItem">
                                            <p class="triangle">▶▶▶</p>
                                        </div>
                                        <div class="scoreItem">
                                            @if (request()->hasCookie('saved_data6'))
                                                <p class="score">{{ request()->cookie('saved_data6') }}点</p>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="scoreLine">
                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div>
                                <div class="scoreLine">
                                    <div class="scoreItem">
                                        <p>Score</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="triangle">▶▶▶</p>
                                    </div>
                                    <div class="scoreItem">
                                        <p class="score">00点</p>
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- ランキング、マイスコアボタン -->
            <div class="btnWrap">
                <div class="gameChallenge">
                    <a href="{{ route('game') }}" class="challengeBtn">ゲームに挑戦</a>
                </div>
                <div class="viewMyscore">
                    <a href="{{ route('ranking') }}" class="viewBtn">ランキングを見る</a>
                </div>
            </div>

        </div>
    </main>




    {{--
<h1>マイスコア</h1>

@if (request()->hasCookie('saved_data'))
<p>クッキーに保存された直近の値: {{ request()->cookie('saved_data') }}</p>
@endif --}}


    {{-- テスト用 --}}
    {{-- @if (isset($data))
<p>フォームから：{{ $data }}</p>
@endif
<form action="{{ route('myscore') }}" method="post">
    @csrf
    <input type="text" name="data" placeholder="保存するデータを入力">
    <button type="submit">保存</button>
</form> --}}
@endsection

@section('pageJs')
@endsection
