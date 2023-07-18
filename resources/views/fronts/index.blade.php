@extends('layouts.layout_front_top')

@section('description', 'トップページのデスクリプション')

@section('keywords', 'キーワード1,キーワード2・・・')

@section('title', 'トップページ')

{{-- 該当ページのCSS --}}
@section('pageCss')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endsection

@section('key_visual')

@endsection

{{-- メイン --}}
@section('content')
    <main id="main">
        <section class="main-inner container">
            <h2>TOP page</h2>
            <p>toppage toppage toppage toppage toppage toppage toppage topptoppage toppage toppage toppage toppage age
                toppage toppage toppage toppage toppage toppage toppage toppage toppage toppage toppage toppage toppage </p>

            <p>toppage toppage toppage toppage toppage toppage toppage topptoppage toppage toppage toppage toppage age
                toppage toppage toppage toppage toppage toppage toppage toppage toppage toppage toppage toppage toppage </p>
        </section>
    </main>
@endsection

{{-- 該当ページ専用JS --}}
@section('pageJs')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
