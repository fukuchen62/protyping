@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', '単語')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>単語の編集画面</h3>

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

    <form method="post" action="{{ route('editvocabulary') }}">
        <table class="info edit_info">
            @csrf
            <input type="hidden" name="id" value="{{ $vocabulary->id }}">
            <tr>
                <th width="15%"> <span>*</span> 言語種別ID: </th>
                <td class="category">
                    <select name="language_id">
                        @foreach ($langlist as $key => $item)
                            @if ($vocabulary->language_id == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->language_name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->language_name }}</option>
                            @endif
                        @endforeach
                        {{-- <option value="1">HTML</option>
                        <option value="2">CSS</option>
                        <option value="3">JavaScript</option>
                        <option value="4">PHP</option>
                        <option value="5">Python</option>
                        <option value="6">よく使う英単語</option> --}}
                    </select>
                </td>
            </tr>
            <tr>
                <th width="15%"> <span>*</span> 英単語(スペル): </th>
                <td>
                    <input type="text" name="word_spell" value="{{ $vocabulary->word_spell }}" required>
                </td>
            </tr>

            <tr>
                <th> <span>*</span> 日本語発音(スペル): </th>
                <td><input type="text" name="japanese" value="{{ $vocabulary->japanese }}" required></td>
            </tr>
            <tr>
                <th> <span></span> 英語発音記号: </th>
                <td><input type="text" name="pronunciation" value="{{ $vocabulary->pronunciation }}"></td>
            </tr>
            <tr>
                <th> <span>*</span> 意味(プログラミング言語): </th>
                <td><input type="text" name="meaning" value="{{ $vocabulary->meaning }}" required></td>
            </tr>
            <tr>
                <th> <span></span> 意味(日本語): </th>
                <td><input type="text" name="notion" value="{{ $vocabulary->notion }}"></td>
            </tr>
            <tr>
                <th> <span></span> 使用例: </th>
                <td>
                    <textarea name="usage" cols="50" rows="5"> {{ $vocabulary->usage }} </textarea>
                </td>
            </tr>
            <tr>
                <th> <span>*</span> 難易度ID: </th>
                <td class="category">
                    <select name="level_id">
                        @if ($vocabulary->level_id == 1)
                            <option value="1" selected>ゆっくりコース</option>
                            <option value="2">ダッシュコース</option>
                        @else
                            <option value="1">ゆっくりコース</option>
                            <option value="2" selected>ダッシュコース</option>
                        @endif

                    </select>
                </td>
            </tr>
            <tr>
                <th> <span>*</span> 表示フラグ:</th>
                <td class="isshow">
                    @if ($vocabulary->is_show == 1)
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
                $word_spell = $vocabulary->word_spell;
                $url = route('deletevocabulary', ['id' => $vocabulary->id]);
            @endphp
            <input type="submit"value="修正" class="submit_btn"
                onclick="return confirm_dialog('{{ $word_spell }}を編集します。よろしいでしょうか。')">

            <input type="button"value="削除" class="delete_btn"
                onclick="return delete_confirm_dialog('{{ $word_spell }}を削除します。よろしいでしょうか。','{{ $url }}')">
        </div>

    </form>
@endsection

@section('footer')
    {{-- copyright 2020 tuyano. --}}
@endsection
