@extends('layouts.layout_front_top')

@section('discription')

@section('keywords')

@section('title', 'トップページ')

@section('pageCss')

@section('key_visual')

    {{-- メインコンテンツの内容 --}}
@section('content')
    <div class="wrap">
        <main class="main">
            <div>
                <!-- ゲーム画面１ -->
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
                    <p>サイト内の日々の更新をUPしていきます</p>
                    <p class="yellowLine"></p>

                    <table class="infoList">
                        <tr>
                            <th>タイトル</th>
                            <th>サムネイル</th>
                            <th>新規作成日時</th>
                        </tr>
                        <!-- $items を使った表示や処理 -->
                        @if (isset($knowhows))
                            @foreach ($knowhows['items2'] as $item2)
                                <tr>
                                    <th>{{ $item2->title }}</th>
                                    <th><img src="assets/images/thumbnail/{{ $item2->thumbnail }}"
                                            alt="{{ $item2->title }}"></th>
                                    <th>{{ $item2->created_at }}</th>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </section>

                {{-- 新着情報 --}}
                <section class="updateNews">
                    <h5>更新情報</h5>
                    <div class="listBtn"><a href="{{ route('article') }}">一覧を見る</a></div>
                    <p>サイト内の日々の更新をUPしていきます</p>
                    <p class="yellowLine"></p>
                    <table>
                        <tr>
                            <th>新規作成日時</th>
                            <th>タイトル</th>
                            <th>概要</th>
                        </tr>

                        <!-- $items を使った表示や処理 -->
                        @if (isset($news))
                            @foreach ($news['items'] as $item)
                                <tr>
                                    <th>{{ $item->created_at }}</th>
                                    <th>{{ $item->title }}</th>
                                    <th>{{ $item->summary }}</th>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </section>
            </div>
            {{-- サイドバーの内容 --}}
            <div>
                <h2>ランキング</h2>
                <div>コース選択</div>
                {{-- 検索フォーム --}}
                <form action="{{ route('top') }}" method="get">
                    <div>
                        {{-- <input type="text" name='param' value='{{  $param }}'> --}}
                        <select name="param">
                            <option value="1"selected>初級コース</option>
                            <option value="2">中級コース</option>
                        </select>
                        <input type="submit" value="コース選択">
                    </div>
                </form>
                <p>プログラミングで<br>よく使われる英単語</p>
                <table>
                    <tr>
                        <th>ユーザ名</th>
                        <th>スコア</th>
                    </tr>
                    <!-- $items を使った表示や処理 -->
                    @if (isset($_GET['param']))
                        {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
                        @if ($_GET['param'] == 2)
                            @if (isset($scoresEnglish2))
                                @foreach ($scoresEnglish2['items14'] as $item14)
                                    <tr>
                                        <th>{{ $item14->username }}</th>
                                        <th>{{ $item14->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @else
                            {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
                            @if (isset($scoresEnglish))
                                @foreach ($scoresEnglish['items13'] as $item13)
                                    <tr>
                                        <th>{{ $item13->username }}</th>
                                        <th>{{ $item13->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    @else
                        {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
                        @if (isset($scoresEnglish))
                            @foreach ($scoresEnglish['items13'] as $item13)
                                <tr>
                                    <th>{{ $item13->username }}</th>
                                    <th>{{ $item13->score }}</th>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                </table>

                <p>HTML</p>
                <table>
                    <tr>
                        <th>ユーザ名</th>
                        <th>スコア</th>
                    </tr>
                    <!-- $items を使った表示や処理 -->
                    @if (isset($_GET['param']))
                        {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
                        @if ($_GET['param'] == 2)
                            @if (isset($scoresHTML2))
                                @foreach ($scoresHTML2['items8'] as $item8)
                                    <tr>
                                        <th>{{ $item8->username }}</th>
                                        <th>{{ $item8->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @else
                            {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
                            @if (isset($scoresHTML))
                                @foreach ($scoresHTML['items3'] as $item3)
                                    <tr>
                                        <th>{{ $item3->username }}</th>
                                        <th>{{ $item3->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    @else
                        {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
                        @if (isset($scoresHTML))
                            @foreach ($scoresHTML['items3'] as $item3)
                                <tr>
                                    <th>{{ $item3->username }}</th>
                                    <th>{{ $item3->score }}</th>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                </table>
                <p>CSS</p>
                <table>
                    <tr>
                        <th>ユーザ名</th>
                        <th>スコア</th>
                    </tr>
                    <!-- $items を使った表示や処理 -->
                    @if (isset($_GET['param']))
                        {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
                        @if ($_GET['param'] == 2)
                            @if (isset($scoresCSS2))
                                @foreach ($scoresCSS2['items9'] as $item9)
                                    <tr>
                                        <th>{{ $item9->username }}</th>
                                        <th>{{ $item9->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @else
                            {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
                            @if (isset($scoresCSS))
                                @foreach ($scoresCSS['items4'] as $item4)
                                    <tr>
                                        <th>{{ $item4->username }}</th>
                                        <th>{{ $item4->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    @else
                        {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
                        @if (isset($scoresCSS))
                            @foreach ($scoresCSS['items4'] as $item4)
                                <tr>
                                    <th>{{ $item4->username }}</th>
                                    <th>{{ $item4->score }}</th>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                </table>
                <p>JavaScript</p>
                <table>
                    <tr>
                        <th>ユーザ名</th>
                        <th>スコア</th>
                    </tr>
                    <!-- $items を使った表示や処理 -->
                    @if (isset($_GET['param']))
                        {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
                        @if ($_GET['param'] == 2)
                            @if (isset($scoresJS2))
                                @foreach ($scoresJS2['items10'] as $item10)
                                    <tr>
                                        <th>{{ $item10->username }}</th>
                                        <th>{{ $item10->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @else
                            {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
                            @if (isset($scoresJS))
                                @foreach ($scoresJS['items5'] as $item5)
                                    <tr>
                                        <th>{{ $item5->username }}</th>
                                        <th>{{ $item5->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    @else
                        {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
                        @if (isset($scoresJS))
                            @foreach ($scoresJS['items5'] as $item5)
                                <tr>
                                    <th>{{ $item5->username }}</th>
                                    <th>{{ $item5->score }}</th>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                </table>
                <p>PHP</p>
                <table>
                    <tr>
                        <th>ユーザ名</th>
                        <th>スコア</th>
                    </tr>
                    <!-- $items を使った表示や処理 -->
                    @if (isset($_GET['param']))
                        {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
                        @if ($_GET['param'] == 2)
                            @if (isset($scoresPHP2))
                                @foreach ($scoresPHP2['items11'] as $item11)
                                    <tr>
                                        <th>{{ $item11->username }}</th>
                                        <th>{{ $item11->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @else
                            {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
                            @if (isset($scoresPHP))
                                @foreach ($scoresPHP['items6'] as $item6)
                                    <tr>
                                        <th>{{ $item6->username }}</th>
                                        <th>{{ $item6->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    @else
                        {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
                        @if (isset($scoresPHP))
                            @foreach ($scoresPHP['items6'] as $item6)
                                <tr>
                                    <th>{{ $item6->username }}</th>
                                    <th>{{ $item6->score }}</th>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                </table>
                <p>Python</p>
                <table>
                    <tr>
                        <th>ユーザ名</th>
                        <th>スコア</th>
                    </tr>
                    <!-- $items を使った表示や処理 -->
                    @if (isset($_GET['param']))
                        {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
                        @if ($_GET['param'] == 2)
                            @if (isset($scoresPython2))
                                @foreach ($scoresPython2['items12'] as $item12)
                                    <tr>
                                        <th>{{ $item12->username }}</th>
                                        <th>{{ $item12->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @else
                            {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
                            @if (isset($scoresPython))
                                @foreach ($scoresPython['items7'] as $item7)
                                    <tr>
                                        <th>{{ $item7->username }}</th>
                                        <th>{{ $item7->score }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    @else
                        {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
                        @if (isset($scoresPython))
                            @foreach ($scoresPython['items7'] as $item7)
                                <tr>
                                    <th>{{ $item7->username }}</th>
                                    <th>{{ $item7->score }}</th>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                </table>
            </div>
        </main>
    @endsection

    @section('pageJs')