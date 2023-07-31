@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', 'いいね')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
<h3>いいね一覧 ({{ $count }})</h3>

{{-- サブメニュー --}}
<ul class="menubar">
    <li><a href="{{ route('indexlike') }}">一覧画面</a></li>
    {{-- <li><a href="{{ route('addlike') }}">新規登録</a></li> --}}
</ul>

{{-- 検索条件入力フォーム --}}
<form action="{{ route('indexlike') }}" method="get" class="search">
    <div>
        検索条件&nbsp;<input type="text" value="{{ $s }}" name="s">
        <input type="submit" value="検索" class="search_btn">
    </div>
</form>
<table class="info">
    <tr>
        <th width="5%">No</th>
        <th width="5%">ID</th>
        <th width="5%">ユーザーID</th>
        <th width="5%">ゲームID</th>
        <th width="5%">ニュースID</th>
        <th width="5%">知っトクID</th>
        {{-- <th width="5%">修正</th> --}}
    </tr>
    @foreach ($like_list as $key => $item)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $item->id }}</td>
        <td>{{ $item->users_id }}</td>
        <td>{{ $item->games_id }}</td>
        <td>{{ $item->news_id }}</td>
        <td>{{ $item->knowhow_id }}</td>
        {{-- <td class="edit"><a href="{{ route('editlike', ['id' => $item->id]) }}">編集</a></td> --}}
    </tr>
    @endforeach
</table>
@endsection

@section('footer')

@endsection
