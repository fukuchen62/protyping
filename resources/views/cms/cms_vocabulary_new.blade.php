@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', '単語')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>単語の新規登録画面</h3>
    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexvocabulary') }}">一覧画面</a></li>
        <li><a href="{{ route('addvocabulary') }}">新規登録</a></li>
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

    <form method="post" action="{{ route('addvocabulary') }}">
        <table class="info new_info">
            @csrf
            <tr>
                <th width="15%"> <span>*</span> 言語種別ID: </th>
                <td class="category">
                    <select name="language_id">
                        <option value="1">HTML</option>
                        <option value="2">CSS</option>
                        <option value="3">JavaScript</option>
                        <option value="4">PHP</option>
                        <option value="5">Python</option>
                        <option value="6">よく使う英単語</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th width="15%"> <span>*</span> 英単語(スペル): </th>
                <td>
                    <input type="text" name="word_spell" required>
                </td>
            </tr>

            <tr>
                <th> <span>*</span> 日本語発音(スペル): </th>
                <td><input type="text" name="japanese" required></td>
            </tr>
            <tr>
                <th> <span>*</span> 英語発音記号: </th>
                <td><input type="text" name="pronunciation"></td>
            </tr>
            <tr>
                <th> <span>*</span> 意味(プログラミング言語): </th>
                <td><input type="text" name="meaning" required></td>
            </tr>
            <tr>
                <th> <span>*</span> 意味(日本語): </th>
                <td><input type="text" name="notion"></td>
            </tr>
            <tr>
                <th> <span>*</span> 使用例: </th>
                <td>
                    <textarea name="usage" cols="50" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <th> <span>*</span> 難易度ID: </th>
                <td class="category">
                    <select name="level_id">
                        <option value="1">ゆっくりコース</option>
                        <option value="2">ダッシュコース</option>
                    </select>
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
                onclick="return confirm_dialog('単語を登録します。よろしいでしょうか。')">
        </div>

    </form>
@endsection


@section('footer')
    copyright 2020 tuyano.
@endsection
