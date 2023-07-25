@extends('layouts.layout')

@section('title','知っトク記事一覧')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
    <h1>知っトク記事一覧</h1>
    <p class="margin"><a href="{{ route('details') }}">知っトク情報詳細</a></p>
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

        @foreach($items as $item)
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
    </table>
@endsection
