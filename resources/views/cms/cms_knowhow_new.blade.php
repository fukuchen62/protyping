@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', '知っトク情報')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
<h3>知っトク情報の新規登録画面</h3>
{{-- サブメニュー --}}
<ul class="menubar">
    <li><a href="{{ route('indexknowhow') }}">一覧画面</a></li>
    <li><a href="{{ route('addknowhow') }}">新規登録</a></li>
</ul>

@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ route('addknowhow') }}">
    <table class="info new_info">
        @csrf
        <tr>
            <th width="15%"> <span>*</span> カテゴリー: </th>
            <td class="category">
                <select name="post_category_id">
                    @foreach ($category_items as $item)
                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <th> <span>*</span> タイトル: </th>
            <td><input type="text" name="title" required></td>
        </tr>
        <tr>
            <th> <span>*</span> 概要: </th>
            <td>
                <textarea name="summary" cols="50" rows="5" required></textarea>
            </td>
        </tr>
        <tr>
            <th> <span>*</span> 詳細内容：</th>
            <td>
                <textarea name="content" id="content" cols="50" rows="5" required></textarea>
            </td>
        </tr>
        <tr>
            <th>サムネール画像: </th>
            <td><input type="text" name="thumbnail"></td>
        </tr>
        <tr>
            <th> <span>*</span> 表示フラグ: </th>
            <td class="isshow">
                <input type="radio" name="is_show" value="1" checked>表示&nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_show" value="0">非表示
            </td>
        </tr>
    </table>

    <div class="submit">
        <input type="submit" value="登録" class="submit_btn" onclick="return confirm_dialog('知っトク情報を登録します。よろしいでしょうか。')">
    </div>

</form>
@endsection


@section('footer')
copyright 2020 tuyano.
@endsection
