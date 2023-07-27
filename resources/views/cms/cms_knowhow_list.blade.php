@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', '知っトク情報')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
<h3>知っトク情報一覧 ({{ $count }})</h3>

{{-- サブメニュー --}}
<ul class="menubar">
    <li><a href="{{ route('indexknowhow') }}">一覧画面</a></li>
    <li><a href="{{ route('addknowhow') }}">新規登録</a></li>
</ul>

{{-- 検索条件入力フォーム --}}
<form action="{{ route('indexknowhow') }}" method="get" class="search">
    <div>
        検索条件&nbsp;<input type="text" value="{{ $s }}" name="s">
        <input type="submit" value="検索" class="search_btn">
    </div>
</form>
<table class="info">
    <tr>
        <th width="5%">No</th>
        <th width="5%">ID</th>
        <th width="15%">カテゴリー名</th>
        <th width="20%">タイトル</th>
        <th width="40%">概要</th>
        <th width="15%">修正</th>
    </tr>
    @foreach ($knowhow_list as $key => $item)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $item->id }}</td>
        <td>{{ $item->getCategoryName() }}</td>
        <td>{{ $item->title }}</td>
        <td>{{ $item->summary }}</td>
        <td class="edit"><a href="{{ route('editknowhow', ['id' => $item->id]) }}">編集</a></td>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')

@endsection
