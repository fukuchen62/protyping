@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', 'レベル')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>レベル一覧 ({{ $count }})</h3>

    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexlevel') }}">一覧画面</a></li>
        {{-- <li><a href="{{ route('addscore') }}">新規登録</a></li> --}}
    </ul>

    {{-- 検索条件入力フォーム --}}
    <form action="{{ route('indexlevel') }}" method="get" class="search">
        <div>
            検索条件&nbsp;<input type="text" value="{{ $s }}" name="s">
            <input type="submit" value="検索" class="search_btn">
        </div>
    </form>
    <table class="info">
        <tr>
            <th width="5%">No</th>
            <th width="5%">難易度ID</th>
            <th >難易度</th>
        </tr>
        @foreach ($level_list as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->level }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')

@endsection
