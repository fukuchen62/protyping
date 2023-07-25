@extends('layouts.layout')

@section('title','ランキング')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
<h1>ランキング</h1>
<form action="{{ route('dictionary') }}" method="get">
    <div>
        {{-- <input type="text" name='param' value='{{  $param }}'> --}}
        <select name="param">
            <option value="" selected>選択してください</option>
            <option value="1">のんびりコース</option>
            <option value="2">ダッシュコース</option>
        </select>
        <input type="submit" value="言語種別選択">
    </div>
</form>
<table>
    <tr>
        <th>順位</th>
        <th>名前</th>
        <th>得点</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>{{ $loop->iteration }}位</td>
        <td>{{$item->username}}</td>
        <td>{{$item->score}}</td>
    </tr>
    @endforeach
</table>
@endsection
