@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', 'ユーザー')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
<h3>ユーザー一覧 ({{ $count }})</h3>

{{-- サブメニュー --}}
<ul class="menubar">
    <li><a href="{{ route('indexuser') }}">一覧画面</a></li>
</ul>

{{-- 検索条件入力フォーム --}}
<form action="{{ route('indexuser') }}" method="get" class="search">
    <div>
        検索条件&nbsp;<input type="text" value="{{ $s }}" name="s">
        <input type="submit" value="検索" class="search_btn">
    </div>
</form>
<table class="info">
    <tr>
        <th width="5%">No</th>
        <th width="5%">ID</th>
        <th width="30%">ユーザー名</th>
        <th width="60%">メールアドレス</th>
    </tr>
    @foreach ($user_list as $key => $item)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')

@endsection
