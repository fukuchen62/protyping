@extends('layouts.layout_back')

@section('title', '釣徳コンテンツ管理システム')

@section('subtitle', 'ニュース')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>ニュースの編集画面</h3>

    {{-- 以下はshowのところにはめ込む --}}
    <ul class="menubar">
        <li><a href="./newsshow">HOME</a></li>
        <li><a href="./newsentry">新規登録</a></li>
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

    <!-- <form action="admin/newsedit" method="post"> -->
    <form method="post" action="{{ route('newsedit') }}">
        <table class="info edit_info">
            @csrf
            <input type="hidden" name="id" value="{{ $news->id }}">
            <tr>
                <th width="15%"> <span>*</span> カテゴリー名: </th>
                <td><input type="text" name="name" value="{{ $news->name }}" required></td>
            </tr>
            <tr>
                <th> <span>*</span> タイトル: </th>
                <td><input type="text" name="title" value="{{ $news->title }}" required></td>
            </tr>
            <tr>
                <th> <span>*</span> 概要: </th>
                <td>
                    <textarea name="overview" cols="50" rows="5" required> {{ $news->overview }} </textarea>
                </td>
            </tr>
            <tr>
                <th> <span>*</span> 詳細内容:</th>
                <td>
                    <textarea name="content" id="content" cols="50" rows="5" required> {{ $news->content }} </textarea>
                </td>
            </tr>
            <tr>
                <th>アイキャッチ画像:</th>
                <td>
                    <input type="text" name="eyecatch" value="{{ $news->eyecatch }}">
                </td>
            </tr>
            <tr>
                <th> <span>*</span> 表示フラグ:</th>
                <td>
                    <input type="boolean" name="is_show" value="{{ $news->is_show }}" required>
                </td>
            </tr>
        </table>

        <div class="change_btn">
            @php
                $title = $news->title;
                $url = route('newsremove', ['id' => $news->id]);
            @endphp
            <input type="submit"value="修正" class="submit_btn" onclick="return saveComfirm('{{ $title }}')">

            <input type="button"value="削除" class="delete_btn"
                onclick="return deleteComfirm('{{ $title }}','{{ $url }}')">
        </div>

    </form>
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection
