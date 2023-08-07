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
    <form id='lang' action="{{ route('indexscore') }}" method="get">
        <div>
            言語選択&nbsp;
            <input type="hidden" name="form_identifier" value="form2">

            <select name="language">
                <option value="" selected></option>
                @foreach ($langlist as $key => $item)
                    @if ($language_id == $item->id)
                        <option value="{{ $item->id }}" selected>{{ $item->language_name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->language_name }}</option>
                    @endif
                @endforeach
            </select>
            <input type="submit" value="言語で絞る" class="search_btn">
        </div>
    </form>

    <table class="info">
        <tr>
            <th width="10%">No</th>
            <th width="10%">言語種別ID</th>
            <th width="10%">難易度ID</th>
            <th width="10%">ユーザID</th>
            <th width="20%">ユーザ名</th>
            <th width="10%">スコア</th>
            <th width="15%">取得日時</th>
            <th width="10%">表示</th>
            {{-- <th width="10%">修正</th> --}}
        </tr>
        @foreach ($score_list as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->language_id }}</td>
                <td>{{ $item->level_id }}</td>
                <td>{{ $item->user_id }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->score }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->is_show }}</td>
                {{-- <td class="edit"><a href="{{ route('editscore', ['id' => $item->id]) }}">編集</a></td> --}}
                {{-- </tr> --}}
        @endforeach
    </table>

@endsection

@section('footer')

@endsection
