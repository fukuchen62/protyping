@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', 'スコア')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>スコア一覧 ({{ $count }})</h3>

    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexscore') }}">一覧画面</a></li>
        {{-- <li><a href="{{ route('addscore') }}">新規登録</a></li> --}}
    </ul>

    {{-- 検索条件入力フォーム --}}
    <form action="{{ route('indexscore') }}" method="get" class="search">
        <div>
            検索条件&nbsp;<input type="text" value="{{ $s }}" name="s">
            <input type="submit" value="検索" class="search_btn">
        </div>
    </form>

    {{-- 言語選択フォーム --}}
    <form action="{{ route('indexscore') }}" method="get">
        <div>
            <input type="hidden" name="form_identifier" value="form2">
            <select name="language">
                <option value="1"selected>HTML</option>
                <option value="2">CSS</option>
                <option value="3">JavaScript</option>
                <option value="4">PHP</option>
                <option value="5">Python</option>
                <option value="6">よく使う英単語</option>
            </select>
            <input type="submit" value="言語種別選択" class="search_btn">
        </div>
    </form>

    <table class="info">
        <tr>
            <th width="5%">No</th>
            <th width="5%">言語種別ID</th>
            <th width="5%">難易度ID</th>
            <th width="5%">ユーザID</th>
            <th width="10%">ユーザ名</th>
            <th>スコア</th>
            <th width="10%">修正</th>
        </tr>
        @foreach ($score_list as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->language_id }}</td>
                <td>{{ $item->level_id }}</td>
                <td>{{ $item->user_id }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->score }}</td>
                <td class="edit"><a href="{{ route('editscore', ['id' => $item->id]) }}">編集</a></td>
            </tr>
        @endforeach
    </table>

@endsection

@section('footer')

@endsection
