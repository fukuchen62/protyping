@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', '単語')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>単語一覧 ({{ $count }})</h3>

    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexvocabulary') }}">一覧画面</a></li>
        <li><a href="{{ route('addvocabulary') }}">新規登録</a></li>
    </ul>

    {{-- 検索条件入力フォーム --}}
    <form action="{{ route('indexvocabulary') }}" method="get" class="search">
        <div>
            検索条件&nbsp;<input type="text" value="{{ $s }}" name="s">
            <input type="submit" value="検索" class="search_btn">
        </div>
    </form>

    {{-- 言語選択フォーム --}}
    <form action="{{ route('indexvocabulary') }}" method="get">
        <div>
            言語選択&nbsp;<input type="hidden" name="form_identifier" value="form2">
            <select name="language">
                <option value="1">HTML</option>
                <option value="2">CSS</option>
                <option value="3">JavaScript</option>
                <option value="4">PHP</option>
                <option value="5">Python</option>
                <option value="6">よく使う英単語</option>
            </select>
            <input type="submit" value="言語で絞る">
        </div>
    </form>

    <table class="info">
        <tr>
            <th width="5%">No</th>
            <th width="5%">言語種別ID</th>
            <th width="10%">英単語(スペル)</th>
            <th width="10%">日本語発音(ルビ)</th>
            <th width="10%">英語発音記号</th>
            <th>意味(プログラミング言語)</th>
            <th>意味(日本語)</th>
            <th>使用例</th>
            <th width="5%">難易度ID</th>
            <th width="10%">修正</th>
        </tr>
        @foreach ($vocabulary_list as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->language_id }}</td>
                <td>{{ $item->word_spell }}</td>
                <td>{{ $item->japanese }}</td>
                <td>{{ $item->pronunciation }}</td>
                <td>{{ $item->meaning }}</td>
                <td>{{ $item->notion }}</td>
                <td>{{ $item->usage }}</td>
                <td>{{ $item->level_id }}</td>
                <td class="edit"><a href="{{ route('editvocabulary', ['id' => $item->id]) }}">編集</a></td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')

@endsection
