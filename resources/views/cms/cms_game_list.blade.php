@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', 'ゲーム設定')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>ゲーム設定 ({{ $count }})</h3>

    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexgame') }}">一覧画面</a></li>
        <li><a href="{{ route('addgame') }}">新規登録</a></li>
    </ul>

    {{-- 検索条件入力フォーム --}}
    <form action="{{ route('indexgame') }}" method="get" class="search">
        <div>
            検索条件&nbsp;<input type="text" value="{{ $s }}" name="s">
            <input type="submit" value="検索" class="search_btn">
        </div>
    </form>
    <table class="info">
        <tr>
            <th width="5%">No</th>
            <th width="5%">ID</th>
            <th width="10%">ゲーム名</th>
            <th>ゲームの説明</th>
            <th width="10%">ゲームのアイキャッチ写真</th>
            <th width="5%">言語種別ID</th>
            <th width="5%">難易度ID</th>
            <th width="5%">単語数</th>
            <th width="5%">秒数</th>
            <th width="10%">修正</th>
        </tr>
        @foreach ($game_list as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->game_name }}</td>
                <td>{{ $item->discription }}</td>
                <td>{{ $item->game_icon }}</td>
                <td>{{ $item->language_id }}</td>
                <td>{{ $item->level_id }}</td>
                <td>{{ $item->howmany }}</td>
                <td>{{ $item->second }}</td>
                <td class="edit"><a href="{{ route('editgame', ['id' => $item->id]) }}">編集</a></td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')

@endsection
