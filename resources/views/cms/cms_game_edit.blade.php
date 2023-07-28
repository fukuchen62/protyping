@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', 'ゲーム設定')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>ゲーム設定の編集画面</h3>

    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexgame') }}">一覧画面</a></li>
        <li><a href="{{ route('addgame') }}">新規登録</a></li>
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

    <form method="post" action="{{ route('editgame') }}">
        <table class="info edit_info">
            @csrf
            <input type="hidden" name="id" value="{{ $game->id }}">
            <tr>
                <th width="15%"> <span>*</span> ゲーム名: </th>
                <td><input type="text" name="game_name"  value="{{ $game->game_name }}"required></td>
            </tr>

            <tr>
                <th> <span>*</span> ゲームの説明: </th>
                <td><input type="text" name="discription" value="{{ $game->discription }}"></td>
            </tr>
            <tr>
                <th> <span>*</span> ゲームのアイキャッチ写真: </th>
                <td>
                    <input type="text" name="game_icon" value="{{ $game->game_icon }}">
                </td>
            </tr>
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
                <th> <span>*</span> 難易度ID: </th>
                <td class="category">
                    <select name="level_id">
                            <option value="1">ゆっくりコース</option>
                            <option value="2">ダッシュコース</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th> <span>*</span> 単語数: </th>
                <td><input type="text" name="howmany" value="{{ $game->howmany }}"></td>
            </tr>
            <tr>
                <th> <span>*</span> 秒数: </th>
                <td><input type="text" name="second" value="{{ $game->second }}"></td>
            </tr>
            <tr>
                <th> <span>*</span> 表示フラグ:</th>
                <td class="isshow">
                    @if ($game->is_show == 1)
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
                $game_name = $game->game_name;
                $url = route('deletegame', ['id' => $game->id]);
            @endphp
            <input type="submit"value="修正" class="submit_btn"
                onclick="return confirm_dialog('{{ $game_name }}を編集します。よろしいでしょうか。')">

            <input type="button"value="削除" class="delete_btn"
                onclick="return delete_confirm_dialog('{{ $game }}を削除します。よろしいでしょうか。','{{ $url }}')">
        </div>

    </form>
@endsection

@section('footer')
    {{-- copyright 2020 tuyano. --}}
@endsection
