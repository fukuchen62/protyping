@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','マイスコア')

@section('pageCss')

@section('key_visual')

{{-- テスト用ページ(本番では使わない) --}}
{{-- メインコンテンツの内容 --}}
@section('content')
    <h1>マイスコア</h1>
    @if(isset($data))
    <p>{{ $data }}</p>
    @endif
@endsection

@section('pageJs')
