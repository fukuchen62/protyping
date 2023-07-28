@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', '記事カテゴリ')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
<h3>記事カテゴリの編集画面</h3>

{{-- サブメニュー --}}
<ul class="menubar">
    <li><a href="{{ route('indexcategory') }}">一覧画面</a></li>
    <li><a href="{{ route('addcategory') }}">新規登録</a></li>
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

<form method="post" action="{{ route('editcategory') }}">
    <table class="info edit_info">
        @csrf
        <input type="hidden" name="id" value="{{ $postcategory->id }}">

        <tr>
            <th> <span>*</span> カテゴリー名: </th>
            <td><input type="text" name="category_name" value="{{ $postcategory->category_name }}" required></td>
        </tr>
        <tr>
            <th> <span>*</span> 表示フラグ:</th>
            <td class="isshow">
                @if ($postcategory->is_show == 1)
                <input type="radio" name="is_show" value="1" checked>表示&nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_show" value="0">非表示
                @else
                <input type="radio" name="is_show" value="1">表示&nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_show" value="0" checked>非表示
                @endif

            </td>
        </tr>
    </table>

    <div class="change_btn">
        @php
        $title = $postcategory->category_name;
        $url = route('deletecategory', ['id' => $postcategory->id]);
        @endphp
        <input type="submit" value="修正" class="submit_btn" onclick="return confirm_dialog('{{ $title }}を編集します。よろしいでしょうか。')">

        <input type="button" value="削除" class="delete_btn" onclick="return delete_confirm_dialog('{{ $title }}を削除します。よろしいでしょうか。','{{ $url }}')">
    </div>

</form>
@endsection

@section('footer')
{{-- copyright 2020 tuyano. --}}
@endsection
