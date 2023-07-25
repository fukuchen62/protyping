@extends('layouts.layout')

@section('title','マイスコア')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
    <h1>マイスコア</h1>
    @if(isset($data))
    <p>{{ $data }}</p>
    @endif
@endsection
