@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','マイスコア')

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/css/myscore.css') }}">
@endsection

@section('key_visual')
@endsection

{{-- テスト用ページ(本番では使わない) --}}
{{-- メインコンテンツの内容 --}}
@section('content')





<h1>マイスコア</h1>
@if(isset($data))
<p>{{ $data }}</p>
@endif
@endsection

@section('pageJs')
@endsection
