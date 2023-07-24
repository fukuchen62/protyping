@extends('layouts.layout')

@section('title','辞書')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
    <h1>辞書</h1>

    {{-- 検索フォーム --}}
    <form action="{{ route('dictionary') }}" method="get">
        <div>
            {{-- <input type="text" name='param' value='{{  $param }}'> --}}
            <select name="param">
                <option value=""selected>選択してください</option>
                <option value="1">HTML</option>
                <option value="2">CSS</option>
                <option value="3">JavaScript</option>
                <option value="4">PHP</option>
            </select>
            <input type="submit" value="言語種別選択">
        </div>
    </form>
    <table>
        <tr>
            <th>種別ID</th>
            <th>言語種別ID</th>
            <th>英単語(スペル)</th>
            <th>日本語発音(ルビ)</th>
            <th>英語発音記号</th>
            <th>意味(プログラミング言語)</th>
            <th>意味(日本語)</th>
            <th>使用例</th>
            <th>難易度ID</th>
        </tr>

        @foreach($items as $item)
            @if(isset($_GET['param']))
                {{-- 言語別に絞り込まれた場合 --}}
                @if($item->language_id == $_GET['param'])
                <tr>
                    <th>{{ $item->id }}</th>
                    <th>{{ $item->language_id }}</th>
                    <th>{{ $item->word_spell }}</th>
                    <th>{{ $item->japanese }}</th>
                    <th>{{ $item->pronunciation }}</th>
                    <th>{{ $item->meaning }}</th>
                    <th>{{ $item->notion }}</th>
                    <th>{{ $item->usage }}</th>
                    <th>{{ $item->level_id }}</th>
                </tr>
                @endif
            @else
                {{-- 選択されていなければデフォルトでHTMLを表示する --}}
                {{-- 1:HTML --}}
                @if($item->language_id == 1)
                <tr>
                    <th>{{ $item->id }}</th>
                    <th>{{ $item->language_id }}</th>
                    <th>{{ $item->word_spell }}</th>
                    <th>{{ $item->japanese }}</th>
                    <th>{{ $item->pronunciation }}</th>
                    <th>{{ $item->meaning }}</th>
                    <th>{{ $item->notion }}</th>
                    <th>{{ $item->usage }}</th>
                    <th>{{ $item->level_id }}</th>
                </tr>
                @endif
            @endif
        @endforeach
    </table>
@endsection
