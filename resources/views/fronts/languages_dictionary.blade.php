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
            <th>英単語(スペル)</th>
            <th>日本語発音(ルビ)</th>
        </tr>

        @foreach($items as $item)
            @if(isset($_GET['param']))
                {{-- 言語別に絞り込まれた場合 --}}
                @if($item->language_id == $_GET['param'])
                <tr>
                    <th>{{ $item->word_spell }}</th>
                    <th>{{ $item->japanese }}</th>
                    <th>{{ $item->usage }}</th>
                </tr>
                @endif
            @else
                {{-- 選択されていなければデフォルトでHTMLを表示する --}}
                {{-- 1:HTML --}}
                @if($item->language_id == 1)
                <tr>
                    <th>{{ $item->word_spell }}</th>
                    <th>{{ $item->japanese }}</th>
                    <th>{{ $item->usage }}</th>
                </tr>
                @endif
            @endif
        @endforeach
    </table>
@endsection
