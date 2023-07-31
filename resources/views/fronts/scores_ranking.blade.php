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
            <!-- パンくずリスト -->
            <div class="breadCrumb">パンくずリスト</div>

            <!-- タイトル -->
            <section class="info">
                <h2>ランキング</h2>
                <p>ランキングコースに挑戦し、ユーザーネームを登録するとこのページに反映されます。<br>ランキング1位目指して自分の限界に挑戦しよう！</p>
            </section>

            <!-- プルダウンメニュー -->
            <div class="selectWrap">
                <!-- <select name="word"> -->
                <select name="word" required>
                    <!-- required：選択必須を指定 -->
                    <option value="初級">初級</option>
                    <option value="中級">中級</option>
                </select>
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
            <section class="rankingWrap">
                <div class="rankingInner">
                    <!-- プログラミングでよく使う英単語 -->
                    <div class="card">
                        <h3 id="engword">プログラミングでよく使う英単語</h3>
                        <div class="cardInner">
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/gold_crown.png" alt="1位王冠">
                                    <p>1位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/silver_crown.png" alt="2位王冠">
                                    <p>2位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/bronze_crown.png" alt="3位王冠">
                                    <p>3位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>4位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>5位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>6位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>7位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>8位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>9位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>10位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                        </div>
                    </div>

                    <!-- HTML -->
                    <div class="card">
                        <h3 id="html">HTML</h3>
                        <div class="cardInner">
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/gold_crown.png" alt="1位王冠">
                                    <p>1位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/silver_crown.png" alt="2位王冠">
                                    <p>2位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/bronze_crown.png" alt="3位王冠">
                                    <p>3位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>4位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>5位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>6位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>7位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>8位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>9位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>10位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                        </div>
                    </div>

                    <!-- CSS -->
                    <div class="card">
                        <h3 id="css">CSS</h3>
                        <div class="cardInner">
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/gold_crown.png" alt="1位王冠">
                                    <p>1位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/silver_crown.png" alt="2位王冠">
                                    <p>2位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/bronze_crown.png" alt="3位王冠">
                                    <p>3位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>4位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>5位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>6位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>7位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>8位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>9位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>10位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                        </div>
                    </div>

                    <!-- Javascrip -->
                    <div class="card">
                        <h3 id="javascript">JavaScrip</h3>
                        <div class="cardInner">
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/gold_crown.png" alt="1位王冠">
                                    <p>1位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/silver_crown.png" alt="2位王冠">
                                    <p>2位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/bronze_crown.png" alt="3位王冠">
                                    <p>3位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>4位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>5位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>6位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>7位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>8位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>9位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>10位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                        </div>
                    </div>

                    <!-- PHP -->
                    <div class="card">
                        <h3 id="php">PHP</h3>
                        <div class="cardInner">
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/gold_crown.png" alt="1位王冠">
                                    <p>1位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/silver_crown.png" alt="2位王冠">
                                    <p>2位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/bronze_crown.png" alt="3位王冠">
                                    <p>3位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>4位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>5位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>6位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>7位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>8位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>9位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>10位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                        </div>
                    </div>

                    <!-- Python -->
                    <div class="card">
                        <h3 id="python">Python</h3>
                        <div class="cardInner">
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/gold_crown.png" alt="1位王冠">
                                    <p>1位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/silver_crown.png" alt="2位王冠">
                                    <p>2位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                            <div class="cardItem">
                                <div class="position">
                                    <img src="../assets/images/bronze_crown.png" alt="3位王冠">
                                    <p>3位</p>
                                </div>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>4位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>5位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>6位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>7位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>8位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>9位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>

                            <div class="cardItem">
                                <p>10位</p>
                                <p class="userName">しんちゃん</p>
                                <p class="score">00点</p>
                            </div>
                        </div>
                    </div>
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



            <div id="btn">
                <a href="#">
                    <div class="arrow_up"></div><!-- クラス名変更必要 -->
                </a>
            </div>
        </div>
    </main>


@endsection

@section('pageJs')
