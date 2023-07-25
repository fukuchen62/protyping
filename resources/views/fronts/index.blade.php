@extends('layouts.layout')

@section('title','TOPページ')
@section('mycss')


{{-- メインコンテンツの内容 --}}
@section('maincontents')
    {{-- タイピングゲーム画面 --}}
    <p>これは卒業制作の練習用プロジェクトです。</p>

    {{-- 英語タイピングって？ --}}
    <div><p>英語タイピングって？・・・</p></div>

    {{-- 新着情報 --}}
    <div>
        <p>更新情報</p>
        <table>
            <tr>
                <th>ニュースID</th>
                <th>タイトル</th>
                <th>カテゴリID</th>
                <th>サムネイル</th>
                <th>概要</th>
                <th>内容</th>
                <th>表示フラグ</th>
                <th>新規作成日時</th>
                <th>作成ユーザID</th>
            </tr>

            <!-- $items を使った表示や処理 -->
            @if(isset($news))
                @foreach($news['items'] as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->title }}</th>
                        <th>{{ $item->category_id }}</th>
                        <th>{{ $item->thumbnail }}</th>
                        <th>{{ $item->summary }}</th>
                        <th>{{ $item->content }}</th>
                        <th>{{ $item->is_show }}</th>
                        <th>{{ $item->created_at }}</th>
                        <th>{{ $item->created_user_id }}</th>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

    {{-- 知っトク情報 --}}
    <div>
        <p>知っトク情報</p>
        <table>
            <tr>
                <th>ニュースID</th>
                <th>タイトル</th>
                <th>カテゴリID</th>
                <th>サムネイル</th>
                <th>概要</th>
                <th>内容</th>
                <th>表示フラグ</th>
                <th>新規作成日時</th>
                <th>作成ユーザID</th>
            </tr>

            <!-- $items を使った表示や処理 -->
            @if(isset($knowhows))
                @foreach($knowhows['items2'] as $item2)
                    <tr>
                        <th>{{ $item2->id }}</th>
                        <th>{{ $item2->title }}</th>
                        <th>{{ $item2->category_id }}</th>
                        <th>{{ $item2->thumbnail }}</th>
                        <th>{{ $item2->summary }}</th>
                        <th>{{ $item2->content }}</th>
                        <th>{{ $item2->is_show }}</th>
                        <th>{{ $item2->created_at }}</th>
                        <th>{{ $item2->created_user_id }}</th>
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
    <p>HTML</p>
    <table>
        <tr>
            <th>スコアID</th>
            <th>ゲームID</th>
            <th>ユーザID</th>
            <th>ユーザ名</th>
            <th>スコア</th>
            <th>表示フラグ</th>
            <th>新規作成日時</th>
        </tr>

        <!-- $items を使った表示や処理 -->
        @if(isset($scores))
            @foreach($scores['items3'] as $item3)
                    <tr>
                        <th>{{ $item3->id }}</th>
                        <th>{{ $item3->game_id }}</th>
                        <th>{{ $item3->user_id }}</th>
                        <th>{{ $item3->username }}</th>
                        <th>{{ $item3->score }}</th>
                        <th>{{ $item3->is_show }}</th>
                        <th>{{ $item3->created_at }}</th>
                    </tr>
            @endforeach
        @endif
    </table>
    <p>CSS</p>
    <p>JavaScript</p>
    <p>PHP</p>
    <p>Python</p>

@endsection
