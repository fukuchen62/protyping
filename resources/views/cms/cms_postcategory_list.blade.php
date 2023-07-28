@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', '記事カテゴリ')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
<h3>記事カテゴリ一覧 ({{ $count }})</h3>

{{-- サブメニュー --}}
<ul class="menubar">
    <li><a href="{{ route('indexcategory') }}">一覧画面</a></li>
    <li><a href="{{ route('addcategory') }}">新規登録</a></li>
</ul>

{{-- 検索条件入力フォーム --}}
<form action="{{ route('indexcategory') }}" method="get" class="search">
    <div>
        検索条件&nbsp;<input type="text" value="{{ $s }}" name="s">
        <input type="submit" value="検索" class="search_btn">
    </div>
</form>
<table class="info">
    <tr>
        <th width="5%">No</th>
        <th width="5%">ID</th>
        <th width="75%">カテゴリー名</th>
        <th width="15%">修正</th>
    </tr>
    @foreach ($postcategory_list as $key => $item)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $item->id }}</td>
        <td>{{ $item->category_name }}</td>
        <td class="edit"><a href="{{ route('editcategory', ['id' => $item->id]) }}">編集</a></td>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')

@endsection
