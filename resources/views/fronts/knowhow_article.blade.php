@extends('layouts.layout')

@section('title','知っトク記事一覧')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
    <h1>知っトク記事一覧</h1>
    <p class="margin"><a href="{{ route('details') }}">知っトク情報詳細</a></p>
@endsection
