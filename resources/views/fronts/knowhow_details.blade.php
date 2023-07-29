@extends('layouts.layout')

@section('title','知っトク記事詳細')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
    <h1>知っトク記事詳細</h1>
    <p class="margin"><a href="{{ route('knowhow') }}">知っトク情報一覧</a></p>

    <table>
        <tr>
            <th>タイトル</th>
            <th>サムネイル</th>
            <th>詳細な概要</th>
            <th>内容</th>
        </tr>

        @foreach($items as $item)
            <tr>
                <th>{{ $item->title }}</th>
                <th>{{ $item->thumbnail }}</th>
                <th>{{ $item->summary_detail }}</th>
                <th>{{ $item->content }}</th>
            </tr>
        @endforeach
    </table>
@endsection
