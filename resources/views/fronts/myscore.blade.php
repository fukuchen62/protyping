@extends('layouts.layout_front')

@section('description', 'マイスコアの確認ができます。')

@section('keywords')

@section('title', 'マイスコア｜プログラミング練習タイピングゲーム「タイプコード」')

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

            {{-- Cookieに書き込むサンプル --}}
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

            {{-- @php
                print_r($score_list);
            @endphp --}}

            {{-- レベル切り替えボタン --}}
            <div class="levelButtons">
                <a class="levelButton {{ request()->query('level_id') == 1 || !request()->has('level_id') ? 'active' : '' }}"
                    href="{{ route('myscore', ['level_id' => 1]) }}">初級</a>
                <a class="levelButton {{ request()->query('level_id') == 2 ? 'active' : '' }}"
                    href="{{ route('myscore', ['level_id' => 2]) }}">中級</a>
            </div>

            <!-- ここから動的 -->
            <section class="scoreWrap">
                <!--カード全体を囲う枠 -->
                <div class="cardWrap">
                    <div class="cardList">

                        @foreach ($score_list as $score)
                            <div class="listInner">

                                <div class="cardInner">
                                    <div class="history">
                                        <h3 id="html">{{ $score['name'] }}</h3>
                                    </div>
                                    <div class="scoreList">
                                        <table class="scoreLine">
                                            <tr>
                                                <th width="50%">取得日時</th>
                                                <th width="30%">名前</th>
                                                <th width="20%">スコア</th>
                                            </tr>
                                            @foreach ($score['data'] as $item)
                                                <tr class="score">
                                                    <td>{{ \Carbon\Carbon::createFromTimeString($item['date'])->format('Y/m/d  H:m') }}
                                                    </td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>{{ $item['score'] }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
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
