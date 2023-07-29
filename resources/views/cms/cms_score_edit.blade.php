@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', 'スコア')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>スコアの編集画面</h3>

    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexscore') }}">一覧画面</a></li>
        {{-- <li><a href="{{ route('addlanguage') }}">新規登録</a></li> --}}
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

    <form method="post" action="{{ route('editscore') }}">
        <table class="info edit_info">
            @csrf
            <input type="hidden" name="id" value="{{ $score->id }}">
            <tr>
                <th> <span>*</span> 表示フラグ:</th>
                <td class="isshow">
                    @if ($score->is_show == 1)
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
                $id = $score->id;
            @endphp
            <input type="submit"value="修正" class="submit_btn"
                onclick="return confirm_dialog('お問い合わせNo{{ $id }}を編集します。よろしいでしょうか。')">
        </div>

    </form>
@endsection

@section('footer')
    {{-- copyright 2020 tuyano. --}}
@endsection
