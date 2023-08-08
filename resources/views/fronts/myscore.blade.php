@extends('layouts.layout_front')

@section('description', 'マイスコアの確認ができます。')

@section('keywords')

@section('title', 'マイスコア｜タイプコード')

@section('pageCss')
    <link href="{{ asset('assets/css/myscore.css') }}" rel="stylesheet">
@endsection

@section('key_visual')
@endsection

{{-- メインコンテンツの内容 --}}
@section('content')


    <main class="main" id="main">



        <div class="mainContent">
            <!-- パンくずリスト -->
            <ol class="breadCrumb-001">
                <li><a href="{{ route('top') }}">ホーム</a></li>
                <li><a href="{{ route('myscore') }}">マイスコア</a></li>
            </ol>


            {{-- <div>
            <form action="{{ route('game') }}" method="POST">
                @csrf
                <div>成績：<input type="text" name="score" value="100"></div>
                <div>言語ID：<input type="text" name="language_id" value="1"></div>
                <div>レベル：<input type="text" name="level_id" value="1"></div>
                <div>ユーザーID：<input type="text" name="user_id" value="0"></div>
                <div>名前：<input type="text" name="username" value="test"></div>
                <div><input type="submit" value="OK"></div>
            </form>
        </div> --}}

            <!-- タイトル -->
            <section class="info">
                <h2>マイスコア</h2>
                <p>ランキングコースに挑戦し、ユーザーネームを登録するとこのページに反映されます。<br>自己ベスト更新目指して頑張ろう！</p>
            </section>

            {{-- レベル切り替えボタン --}}
            <div class="levelButtons">
                <a class="levelButton {{ request()->query('level_id') == 1 || !request()->has('level_id') ? 'active' : '' }}"
                    href="{{ route('myscore', ['level_id' => 1]) }}">初級</a>
                <a class="levelButton {{ request()->query('level_id') == 2 ? 'active' : '' }}"
                    href="{{ route('myscore', ['level_id' => 2]) }}">中級</a>
            </div>

            <!-- 言語選択 -->
            <nav class="word">
                <div>
                    <img alt="↓ボタン" src="{{ asset('assets/images/arrow.png') }}">
                    <a href="#html">HTML</a>
                </div>
                <div>
                    <img alt="↓ボタン" src="{{ asset('assets/images/arrow.png') }}">
                    <a href="#css">css</a>
                </div>
                <div>
                    <img alt="↓ボタン" src="{{ asset('assets/images/arrow.png') }}">
                    <a href="#javascript">JavaScript</a>
                </div>
                <div>
                    <img alt="↓ボタン" src="{{ asset('assets/images/arrow.png') }}">
                    <a href="#php">PHP</a>
                </div>
                <div>
                    <img alt="↓ボタン" src="{{ asset('assets/images/arrow.png') }}">
                    <a href="#python">Python</a>
                </div>
                <div>
                    <img alt="↓ボタン" src="{{ asset('assets/images/arrow.png') }}">
                    <a href="#engword">プログラミングでよく使う英単語</a>
                </div>
            </nav>


            <!-- ここから動的 -->
            <section class="scoreWrap">

                <!-- ユーザーネーム -->
                <!-- 人とゆーざーを囲うdiv -->
                {{-- <div class="usernameWrap"> --}}
                <!-- <div class="usernameInner"> -->
                <!-- 人のシルエット背景 -->
                {{-- <div class="icon">
                    <img src="{{ asset('assets/images/human.png') }}" alt="人アイコン">
                </div> --}}

                {{-- <div class="usernameItem">
                    <div class="itemFirst">
                        <p>ユーザーネーム</p>
                    </div>
                    <div class="itemSecond">
                        <p>しんちゃん</p>
                    </div>
                </div> --}}
                <!-- </div> -->
                {{--
            </div> --}}

                <!--カード全体を囲う枠 -->
                <div class="cardWrap">
                    <div class="cardList">

                        <div class="listInner">
                            <div class="cardInner">
                                <div class="history">
                                    <h3 id="html">HTML</h3>
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
                                            @if (isset($_GET['level_id']))
                                                @if ($_GET['level_id'] == 1)
                                                    @if (request()->hasCookie('saved_data1'))
                                                        <p class="score">{{ request()->cookie('saved_data1') }}点</p>
                                                    @endif
                                                @elseif($_GET['level_id'] == 2)
                                                    @if (request()->hasCookie('saved_data7'))
                                                        <p class="score">{{ request()->cookie('saved_data7') }}点</p>
                                                    @endif
                                                @else
                                                    @if (request()->hasCookie('saved_data1'))
                                                        <p class="score">{{ request()->cookie('saved_data1') }}点</p>
                                                    @endif
                                                @endif
                                            @else
                                                @if (request()->hasCookie('saved_data1'))
                                                    <p class="score">{{ request()->cookie('saved_data1') }}点</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="listInner">

                            <div class="cardInner">
                                <div class="history">
                                    <h3 id="css">CSS</h3>
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
                                            @if (isset($_GET['level_id']))
                                                @if ($_GET['level_id'] == 1)
                                                    @if (request()->hasCookie('saved_data2'))
                                                        <p class="score">{{ request()->cookie('saved_data2') }}点</p>
                                                    @endif
                                                @elseif($_GET['level_id'] == 2)
                                                    @if (request()->hasCookie('saved_data8'))
                                                        <p class="score">{{ request()->cookie('saved_data8') }}点</p>
                                                    @endif
                                                @else
                                                    @if (request()->hasCookie('saved_data2'))
                                                        <p class="score">{{ request()->cookie('saved_data2') }}点</p>
                                                    @endif
                                                @endif
                                            @else
                                                @if (request()->hasCookie('saved_data2'))
                                                    <p class="score">{{ request()->cookie('saved_data2') }}点</p>
                                                @endif
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

                            <div class="cardInner">
                                <div class="history">
                                    <h3 id="javascrip">JavaScript</h3>
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
                                            @if (isset($_GET['level_id']))
                                                @if ($_GET['level_id'] == 1)
                                                    @if (request()->hasCookie('saved_data3'))
                                                        <p class="score">{{ request()->cookie('saved_data3') }}点</p>
                                                    @endif
                                                @elseif($_GET['level_id'] == 2)
                                                    @if (request()->hasCookie('saved_data9'))
                                                        <p class="score">{{ request()->cookie('saved_data9') }}点</p>
                                                    @endif
                                                @else
                                                    @if (request()->hasCookie('saved_data3'))
                                                        <p class="score">{{ request()->cookie('saved_data3') }}点</p>
                                                    @endif
                                                @endif
                                            @else
                                                @if (request()->hasCookie('saved_data3'))
                                                    <p class="score">{{ request()->cookie('saved_data3') }}点</p>
                                                @endif
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

                            <div class="cardInner">
                                <div class="history">
                                    <h3 id="php">PHP</h3>
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
                                            @if (isset($_GET['level_id']))
                                                @if ($_GET['level_id'] == 1)
                                                    @if (request()->hasCookie('saved_data4'))
                                                        <p class="score">{{ request()->cookie('saved_data4') }}点</p>
                                                    @endif
                                                @elseif($_GET['level_id'] == 2)
                                                    @if (request()->hasCookie('saved_data10'))
                                                        <p class="score">{{ request()->cookie('saved_data10') }}点</p>
                                                    @endif
                                                @else
                                                    @if (request()->hasCookie('saved_data4'))
                                                        <p class="score">{{ request()->cookie('saved_data4') }}点</p>
                                                    @endif
                                                @endif
                                            @else
                                                @if (request()->hasCookie('saved_data4'))
                                                    <p class="score">{{ request()->cookie('saved_data4') }}点</p>
                                                @endif
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
                            <div class="cardInner">
                                <div class="history">
                                    <h3 id="python">Python</h3>
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
                                            @if (isset($_GET['level_id']))
                                                @if ($_GET['level_id'] == 1)
                                                    @if (request()->hasCookie('saved_data5'))
                                                        <p class="score">{{ request()->cookie('saved_data5') }}点</p>
                                                    @endif
                                                @elseif($_GET['level_id'] == 2)
                                                    @if (request()->hasCookie('saved_data11'))
                                                        <p class="score">{{ request()->cookie('saved_data11') }}点</p>
                                                    @endif
                                                @else
                                                    @if (request()->hasCookie('saved_data5'))
                                                        <p class="score">{{ request()->cookie('saved_data5') }}点</p>
                                                    @endif
                                                @endif
                                            @else
                                                @if (request()->hasCookie('saved_data5'))
                                                    <p class="score">{{ request()->cookie('saved_data5') }}点</p>
                                                @endif
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
                            <div class="cardInner">
                                <div class="history">
                                    <h3 id="engword">プログラミングでよく使う英単語</h3>
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
                                            @if (isset($_GET['level_id']))
                                                @if ($_GET['level_id'] == 1)
                                                    @if (request()->hasCookie('saved_data6'))
                                                        <p class="score">{{ request()->cookie('saved_data6') }}点</p>
                                                    @endif
                                                @elseif($_GET['level_id'] == 2)
                                                    @if (request()->hasCookie('saved_data12'))
                                                        <p class="score">{{ request()->cookie('saved_data12') }}点</p>
                                                    @endif
                                                @else
                                                    @if (request()->hasCookie('saved_data6'))
                                                        <p class="score">{{ request()->cookie('saved_data6') }}点</p>
                                                    @endif
                                                @endif
                                            @else
                                                @if (request()->hasCookie('saved_data6'))
                                                    <p class="score">{{ request()->cookie('saved_data6') }}点</p>
                                                @endif
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

                        {{-- テスト --}}
                        {{-- <div class="listInner">
                            <div class="cardInner">
                                <table>
                                    <tr>
                                        <td colspan="3">
                                            <div class="history">
                                                <h3 id="html">TEST</h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tbody class="scoreList">
                                        <tr class="scoreLine">
                                            <td>
                                                <div class="scoreItem">
                                                    <p>Score</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="scoreItem">
                                                    <p class="triangle">▶▶▶</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="scoreItem">5555点
                                                    @if (isset($_GET['level_id']))
                                                        @if ($_GET['level_id'] == 1)
                                                            @if (request()->hasCookie('saved_data1'))
                                                                <p class="score">{{ request()->cookie('saved_data1') }}点
                                                                </p>
                                                            @endif
                                                        @elseif($_GET['level_id'] == 2)
                                                            @if (request()->hasCookie('saved_data7'))
                                                                <p class="score">{{ request()->cookie('saved_data7') }}点
                                                                </p>
                                                            @endif
                                                        @else
                                                            @if (request()->hasCookie('saved_data1'))
                                                                <p class="score">{{ request()->cookie('saved_data1') }}点
                                                                </p>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if (request()->hasCookie('saved_data1'))
                                                            <p class="score">{{ request()->cookie('saved_data1') }}点</p>
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}



                    </div>
                </div>

            </section>

            <!-- ランキング、マイスコアボタン -->
            <div class="btnWrap">
                <div class="gameChallenge">
                    <a class="challengeBtn" href="{{ route('game') }}">ゲームに挑戦</a>
                </div>
                <div class="viewMyscore">
                    <a class="viewBtn" href="{{ route('ranking') }}">ランキングを見る</a>
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
