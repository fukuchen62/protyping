@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', '言語種別')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>言語一覧 ({{ $count }})</h3>

    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexlanguage') }}">一覧画面</a></li>
        <li><a href="{{ route('addlanguage') }}">新規登録</a></li>
    </ul>

    {{-- 検索条件入力フォーム --}}
    <form action="{{ route('indexlanguage') }}" method="get" class="search">
        <div>
            検索条件&nbsp;<input type="text" value="{{ $s }}" name="s">
            <input type="submit" value="検索" class="search_btn">
        </div>
    </form>
    <table class="info">
        <tr>
            <th width="5%">No</th>
            <th width="5%">ID</th>
            <th width="10%">言語名</th>
            <th width="20%">言語アイコン</th>
            <th>言語の説明</th>
            <th width="10%">修正</th>
        </tr>
        @foreach ($language_list as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->language_name }}</td>
                <td>{{ $item->lang_icon }}</td>
                <td>{{ $item->discription }}</td>
                <td class="edit"><a href="{{ route('editlanguage', ['id' => $item->id]) }}">編集</a></td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')

@endsection
