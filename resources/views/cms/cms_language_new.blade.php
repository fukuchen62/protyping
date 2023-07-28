@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', '言語種別')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>言語の新規登録画面</h3>
    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexlanguage') }}">一覧画面</a></li>
        <li><a href="{{ route('addlanguage') }}">新規登録</a></li>
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

    <form method="post" action="{{ route('addlanguage') }}">
        <table class="info new_info">
            @csrf
            <tr>
                <th width="15%"> <span>*</span> 言語名: </th>
                <td><input type="text" name="language_name" required></td>
            </tr>
            <tr>
                <th> <span>*</span> 言語アイコン: </th>
                <td><input type="text" name="lang_icon"></td>
            </tr>
            <tr>
                <th> <span>*</span> 言語の説明: </th>
                <td>
                    <textarea name="discription" cols="50" rows="5"></textarea>
                </td>
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
            <input type="submit" value="登録" class="submit_btn"
                onclick="return confirm_dialog('言語種別を登録します。よろしいでしょうか。')">
        </div>

    </form>
@endsection


@section('footer')
    copyright 2020 tuyano.
@endsection
