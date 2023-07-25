@extends('layouts.layout_back')

@section('title', '釣徳コンテンツ管理システム')

@section('subtitle', 'ニュース')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>ニュース一覧</h3>
    {{-- 以下はshowのところにはめ込む --}}
    <ul class="menubar">
        <li><a href="./newsshow">HOME</a></li>
        <li><a href="./newsentry">新規登録</a></li>
    </ul>

    {{-- 検索条件入力フォーム --}}
    <form action="{{ route('newsshow') }}" method="get" class="search">
        検索条件 :&nbsp;<input type="text" name="s" id="s"><br>
        <input type="submit" value="検索" class="search_btn">
    </form>
    <table class="info">
        <tr>
            <th width="5%">ID</th>
            <th>カテゴリー名前</th>
            <th>タイトル</th>
            <th width="100px">修正</th>
        </tr>
        @foreach ($newslist as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->title }}</td>
                <td class="edit"><a href="{{ route('newsedit', ['id' => $item->id]) }}">編集</a></td>
            </tr>
        @endforeach
    </table>
@endsection


@section('footer')
    copyright 2020 tuyano.
@endsection
