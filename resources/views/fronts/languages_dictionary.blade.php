@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','辞書')

@section('pageCss')

@section('key_visual')

{{-- メインコンテンツの内容 --}}
@section('content')
    <h1>辞書</h1>

    {{-- 検索フォーム --}}
    <form action="{{ route('dictionary') }}" method="get">
        <div>
            <input type="hidden" name="form_identifier" value="form1">
            <input type="text" name="s">
            <input type="submit" value="検索">
        </div>
    </form>

    {{-- 言語選択フォーム --}}
    <form action="{{ route('dictionary') }}" method="get">
        <div>
            <input type="hidden" name="form_identifier" value="form2">
            <select name="language">
                <option value="1"selected>HTML</option>
                <option value="2">CSS</option>
                <option value="3">JavaScript</option>
                <option value="4">PHP</option>
                <option value="5">Python</option>
                <option value="6">よく使う英単語</option>
            </select>
            <input type="submit" value="言語種別選択">
        </div>
    </form>
    <table>
        <tr>
            <th>英単語(スペル)</th>
            <th>日本語発音(ルビ)</th>
            <th>意味</th>
            <th>使用例</th>
        </tr>

        @foreach($items as $item)
            @if(isset($_GET['param']))
                <tr>
                    <th>{{ $item->word_spell }}</th>
                    <th>{{ $item->japanese }}</th>
                    <th>{{ $item->meaning }}</th>
                    <th>{{ $item->usage }}</th>
                </tr>
            @else
                {{-- 絞り込みもキーワード検索も行われていなければデフォルトでHTMLを表示する --}}
                {{-- 1:HTML --}}
                @if($item->language_id == 1)
                <tr>
                    <th>{{ $item->word_spell }}</th>
                    <th>{{ $item->japanese }}</th>
                    <th>{{ $item->meaning }}</th>
                    <th>{{ $item->usage }}</th>
                </tr>
                @endif
            @endif
        @endforeach
    </table>
@endsection

@section('pageJs')
