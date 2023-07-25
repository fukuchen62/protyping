@extends('layouts.layout')

@section('title','ランキング')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
<h1>ランキング</h1>
<form action="{{ route('ranking') }}" method="get">
    <div>
        <input type="hidden" name="level_id" value="1">
        <input type="submit" value="のんびりコース">
    </div>
</form>
<form action="{{ route('ranking') }}" method="get">
    <div>
        <input type="hidden" name="level_id" value="2">
        <input type="submit" value="ダッシュコース">
    </div>
</form>
<table>
    <tr>
        <th>順位</th>
        <th>名前</th>
        <th>得点</th>
    </tr>
    @foreach($items as $item)
    @if(isset($_GET['level_id']))
    {{-- 言語別に絞り込まれた場合 --}}
    @if($item->level_id == $_GET['level_id'])
    <tr>
        <td>{{ $loop->iteration }}位</td>
        <td>{{$item->username}}</td>
        <td>{{$item->score}}</td>
    </tr>
    @endif
    @else
    {{-- 選択されていなければデフォルトでHTMLを表示する --}}
    {{-- 1:HTML --}}
    @if($item->level_id == 1)
    <tr>
        <td>{{ $loop->iteration }}位</td>
        <td>{{$item->username}}</td>
        <td>{{$item->score}}</td>
    </tr>
    @endif
    @endif
    @endforeach
    {{-- @foreach ($items as $item)
    <tr>
        <td>{{ $loop->iteration }}位</td>
        <td>{{$item->username}}</td>
        <td>{{$item->score}}</td>
    </tr>
    @endforeach --}}
</table>
@endsection
