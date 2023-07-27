@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', '言語種別')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>言語種別の編集画面</h3>

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

    <form method="post" action="{{ route('editlanguage') }}">
        <table class="info edit_info">
            @csrf
            <input type="hidden" name="id" value="{{ $language->id }}">
            <tr>
                <th width="15%"> <span>*</span> 言語名: </th>
                <td>
                    <input type="text" name="language_name" value="{{ $language->language_name }}" required>
                </td>
            </tr>

            <tr>
                <th> <span>*</span> 言語アイコン: </th>
                <td><input type="text" name="lang_icon" value="{{ $language->lang_icon }}"></td>
            </tr>
            <tr>
                <th> <span>*</span> 言語の説明: </th>
                <td>
                    <textarea name="discription" cols="50" rows="5"> {{ $language->discription }} </textarea>
                </td>
            </tr>
            <tr>
                <th> <span>*</span> 表示フラグ:</th>
                <td class="isshow">
                    @if ($language->is_show == 1)
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
                $language_name = $language->language_name;
                $url = route('deletelanguage', ['id' => $language->id]);
            @endphp
            <input type="submit"value="修正" class="submit_btn"
                onclick="return confirm_dialog('{{ $language_name }}を編集します。よろしいでしょうか。')">

            <input type="button"value="削除" class="delete_btn"
                onclick="return delete_confirm_dialog('{{ $language }}を削除します。よろしいでしょうか。','{{ $url }}')">
        </div>

    </form>
@endsection

@section('footer')
    {{-- copyright 2020 tuyano. --}}
@endsection
