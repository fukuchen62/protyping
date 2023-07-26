@extends('layouts.layout')

@section('title','知っトク記事一覧')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
    <h1>知っトク記事一覧</h1>

    {{-- 検索フォーム --}}
    <form action="{{ route('knowhow') }}" method="get">
        <div>
            <select name="param">
                <option value=""selected>選択してください</option>
                <option value="1">更新情報</option>
                <option value="2">新着ニュース</option>
                <option value="3">イベント情報</option>
                <option value="4">エメット</option>
                <option value="5">ショートカット</option>
                <option value="6">資格</option>
                <option value="7">おすすめWEBアプリ</option>
            </select>
            <input type="submit" value="言語種別選択">
        </div>
    </form>

    <p class="margin"><a href="{{ route('details') }}">知っトク情報詳細</a></p>
    <table>
        <tr>
            <th>タイトル</th>
            <th>サムネイル</th>
            <th>概要</th>
        </tr>

        @foreach($items as $item)
        @if(isset($_GET['param']))
            {{-- カテゴリ別に --}}
            <tr>
                <th>{{ $item->title }}</th>
                <th>{{ $item->thumbnail }}</th>
                <th>{{ $item->summary }}</th>
        @else

        @endif
        @endforeach
    </table>
@endsection
