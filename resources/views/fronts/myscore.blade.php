@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','マイスコア')

@section('pageCss')

@section('key_visual')

{{-- メインコンテンツの内容 --}}
@section('content')
    <h1>マイスコア</h1>

    @if(request()->hasCookie('saved_data'))
        <p>クッキーに保存された直近の値: {{ request()->cookie('saved_data') }}</p>
    @endif


    {{-- テスト用 --}}
    {{-- @if(isset($data))
    <p>フォームから：{{ $data }}</p>
    @endif
    <form action="{{ route('myscore') }}" method="post">
        @csrf
        <input type="text" name="data" placeholder="保存するデータを入力">
        <button type="submit">保存</button>
    </form> --}}
@endsection

@section('pageJs')
