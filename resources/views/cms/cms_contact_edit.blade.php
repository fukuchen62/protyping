@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', 'お問い合わせ')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>お問い合わせの編集画面</h3>

    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexcontact') }}">一覧画面</a></li>
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

    <form method="post" action="{{ route('editcontact') }}">
        <table class="info edit_info">
            @csrf
            <input type="hidden" name="id" value="{{ $contact->id }}">
            <tr>
                <th> <span>*</span> ステータス: </th>
                <td class="category">
                    <select name="status">
                        <option value="1">新規</option>
                        <option value="2">対応中</option>
                        <option value="3">対応済み</option>
                    </select>
                </td>
            </tr>
        </table>

        <div class="change_btn">
            @php
                $id = $contact->id;
            @endphp
            <input type="submit"value="修正" class="submit_btn"
                onclick="return confirm_dialog('お問い合わせNo{{ $id }}を編集します。よろしいでしょうか。')">
        </div>

    </form>
@endsection

@section('footer')
    {{-- copyright 2020 tuyano. --}}
@endsection
