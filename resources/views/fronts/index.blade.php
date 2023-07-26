@extends('layouts.layout')

@section('title','TOPページ')
@section('mycss')


{{-- メインコンテンツの内容 --}}
@section('maincontents')
    {{-- タイピングゲーム画面 --}}
    <p>これは卒業制作の練習用プロジェクトです。</p>

    {{-- 英語タイピングって？ --}}
    <div><p>英語タイピングって？・・・</p></div>

    {{-- 知っトク情報 --}}
    <div>
        <p>知っトク情報</p>
        <p>システムエンジニアに必要な知識を配信しています。</p>
        <table>
            <tr>
                <th>タイトル</th>
                <th>サムネイル</th>
                <th>新規作成日時</th>
            </tr>
            <!-- $items を使った表示や処理 -->
            @if(isset($knowhows))
                @foreach($knowhows['items2'] as $item2)
                    <tr>
                        <th>{{ $item2->title }}</th>
                        <th>{{ $item2->thumbnail }}</th>
                        <th>{{ $item2->created_at }}</th>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

    {{-- 新着情報 --}}
    <div>
        <p>更新情報</p>
        <p>サイト内の日々の更新をUPしていきます。</p>
        <table>
            <tr>
                <th>新規作成日時</th>
                <th>タイトル</th>
                <th>概要</th>
            </tr>

            <!-- $items を使った表示や処理 -->
            @if(isset($news))
                @foreach($news['items'] as $item)
                    <tr>
                        <th>{{ $item->created_at }}</th>
                        <th>{{ $item->title }}</th>
                        <th>{{ $item->summary }}</th>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>


@endsection

{{-- サイドバーの内容 --}}
@section('sidecontents')
    <h2>ランキング</h2>
    <div>コース選択</div>
    {{-- 検索フォーム --}}
    <form action="{{ route('top') }}" method="get">
        <div>
            {{-- <input type="text" name='param' value='{{  $param }}'> --}}
            <select name="param">
                <option value=""selected>選択してください</option>
                <option value="1">のんびりコース</option>
                <option value="2">ダッシュコース</option>
            </select>
            <input type="submit" value="コース選択">
        </div>
    </form>
    <p>HTML</p>
    <table>
        <tr>
            <th>ユーザ名</th>
            <th>スコア</th>
        </tr>
        <!-- $items を使った表示や処理 -->
        @if(isset($scoresHTML))
            {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
            @if(isset($_GET['param'])==2)
                @foreach($scoresHTML2['items8'] as $item8)
                        <tr>
                            <th>{{ $item8->username }}</th>
                            <th>{{ $item8->score }}</th>
                        </tr>
                @endforeach
            @else
            {{-- pramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
                @foreach($scoresHTML['items3'] as $item3)
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
        @if(isset($scoresCSS))
            @foreach($scoresCSS['items4'] as $item4)
                    <tr>
                        <th>{{ $item4->username }}</th>
                        <th>{{ $item4->score }}</th>
                    </tr>
            @endforeach
        @endif
    </table>
    <p>JavaScript</p>
    <table>
        <tr>
            <th>ユーザ名</th>
            <th>スコア</th>
        </tr>
        <!-- $items を使った表示や処理 -->
        @if(isset($scoresJS))
            @foreach($scoresJS['items5'] as $item5)
                    <tr>
                        <th>{{ $item5->username }}</th>
                        <th>{{ $item5->score }}</th>
                    </tr>
            @endforeach
        @endif
    </table>
    <p>PHP</p>
    <table>
        <tr>
            <th>ユーザ名</th>
            <th>スコア</th>
        </tr>
        <!-- $items を使った表示や処理 -->
        @if(isset($scoresPHP))
            @foreach($scoresPHP['items6'] as $item6)
                    <tr>
                        <th>{{ $item6->username }}</th>
                        <th>{{ $item6->score }}</th>
                    </tr>
            @endforeach
        @endif
    </table>
    <p>Python</p>
    <table>
        <tr>
            <th>ユーザ名</th>
            <th>スコア</th>
        </tr>
        <!-- $items を使った表示や処理 -->
        @if(isset($scoresPython))
            @foreach($scoresPython['items7'] as $item7)
                    <tr>
                        <th>{{ $item7->username }}</th>
                        <th>{{ $item7->score }}</th>
                    </tr>
            @endforeach
        @endif
    </table>
@endsection
