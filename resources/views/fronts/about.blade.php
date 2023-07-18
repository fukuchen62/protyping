@extends('layouts.layout_front')

@section('description', '私たちについて私たちについて私たちについて私たちについて')

@section('keywords', 'キーワード1,キーワード私たちについて2・・・')

@section('title', '私たちについて')

{{-- 該当ページのCSS --}}
@section('pageCss')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endsection

@section('key_visual')
    {{-- <img class="sub-keyvisual" src="{{ asset('assets/images/sub-keyvisual.jpg') }}" alt="サブキービジュアル"> --}}
@endsection

{{-- メイン --}}
@section('content')
    <main id="main">
        <div class="main-inner container">
            <h2 class="section__box--title ">わたし達について</h2>

            <section>
                <h3>サブタイトル</h3>
                <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </section>

            <section>
                <h3>サブタイトル</h3>
                <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </section>
        </div>
    </main>


@endsection

{{-- 該当ページ専用JS --}}
@section('pageJs')

@endsection
