@extends('layouts.layout')

@section('title','ランキング')
{{-- @section('mycss') --}}

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
    @foreach($items as $key => $item)

    @if(isset($_GET['level_id']))
    {{-- コース別に絞り込まれた場合 --}}
    @if($item->level_id == $_GET['level_id'])
    <tr>
        {{-- <td>{{ $key + 1 }}</td> --}}
        <td>{{$item->username}}</td>
        <td>{{$item->score}}</td>
    </tr>
    @endif
    @else
    {{-- 選択されていなければデフォルトでのんびりコースを表示する --}}
    {{-- 1:のんびりコース --}}
    @if($item->level_id == 1)
    <tr>
        {{-- <td>{{ $key + 1 }}</td> --}}
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


@foreach ($languages as $language)
<h2>コース{{ $language }}のランキング</h2>
<table>
    <tr>
        <th>順位</th>
        <th>名前</th>
        <th>得点</th>
    </tr>
    @foreach ($itemsByCourse[$language] as $key => $item)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $item->username }}</td>
        <td>{{ $item->score }}</td>
    </tr>
    @endforeach
</table>





@endforeach


@endsection
