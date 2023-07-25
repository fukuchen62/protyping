@extends('layouts.layout')

@section('title','マイスコア')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
    <h1>マイスコア</h1>

    <form action="{{ route('myscore') }}" method="post">
        @csrf
        <input type="text" name="data" placeholder="保存するデータを入力">
        <button type="submit">保存</button>
    </form>
@endsection
