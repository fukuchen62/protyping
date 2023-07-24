@extends('layouts.layout')

@section('title','知っトク記事詳細')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
    <h1>知っトク記事詳細</h1>
    <p class="margin"><a href="{{ route('knowhow') }}">知っトク情報一覧</a></p>
@endsection
