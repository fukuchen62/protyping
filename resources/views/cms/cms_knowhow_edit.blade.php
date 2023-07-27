@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', 'ニュース')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>ニュースの編集画面</h3>

    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexarticle') }}">一覧画面</a></li>
        <li><a href="{{ route('addarticle') }}">新規登録</a></li>
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

    <form method="post" action="{{ route('editarticle') }}">
        <table class="info edit_info">
            @csrf
            <input type="hidden" name="id" value="{{ $news->id }}">
            <tr>
                <th width="15%"> <span>*</span> カテゴリー: </th>
                <td class="category">
                    <select name="post_category_id">
                        @foreach ($category_items as $item)
                            @if ($news->post_category_id == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->category_name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <th> <span>*</span> タイトル: </th>
                <td><input type="text" name="title" value="{{ $news->title }}" required></td>
            </tr>
            <tr>
                <th> <span>*</span> 概要: </th>
                <td>
                    <textarea name="summary" cols="50" rows="5" required> {{ $news->summary }} </textarea>
                </td>
            </tr>
            <tr>
                <th> <span>*</span> 詳細内容:</th>
                <td>
                    <textarea name="content" id="content" cols="50" rows="5" required> {{ $news->content }} </textarea>
                </td>
            </tr>
            <tr>
                <th>サムネール画像:</th>
                <td>
                    <input type="text" name="thumbnail" value="{{ $news->thumbnail }}">
                </td>
            </tr>
            <tr>
                <th> <span>*</span> 表示フラグ:</th>
                <td class="isshow">
                    @if ($news->is_show == 1)
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
                $title = $news->title;
                $url = route('deletearticle', ['id' => $news->id]);
            @endphp
            <input type="submit"value="修正" class="submit_btn"
                onclick="return confirm_dialog('{{ $title }}を編集します。よろしいでしょうか。')">

            <input type="button"value="削除" class="delete_btn"
                onclick="return delete_confirm_dialog('{{ $title }}を削除します。よろしいでしょうか。','{{ $url }}')">
        </div>

    </form>
@endsection

@section('footer')
    {{-- copyright 2020 tuyano. --}}
@endsection
