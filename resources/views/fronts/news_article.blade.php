@extends('layouts.layout_front')

@section('description', '最新の情報をお届けします！追加項目やランキング更新のお知らせなどはここから！')

@section('keywords')

@section('title', '更新情報｜プログラミング練習タイピングゲーム「タイプコード」')

@section('pageCss')
    <link href="{{ asset('assets/css/update.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet">
@endsection

@section('key_visual')

@endsection

{{-- メインコンテンツの内容 --}}
@section('content')

    <main class="main">

        <!-- パンくずリスト -->
        <ol class="breadCrumb-001">
            <li><a href="{{ route('top') }}">ホーム</a></li>
            <li><a href="{{ route('article') }}">更新情報</a></li>
        </ol>

        <h2>更新情報</h2>

        @foreach ($items as $item)
            @php
                $timestamp = \Carbon\Carbon::parse($item->created_at);
            @endphp

            <section class="updateInformation">

                <ul class="updateList">
                    <li>
                        <div class="pc">
                            <p>{{ $timestamp->format('Y年m月d日') }}
                                <span class="title">{{ $item->title }}</span>
                            </p>
                            <p>{{ $item->content }}</p>
                        </div>

                        <div class="mobile">
                            <p class="date">{{ $timestamp->format('Y年m月d日') }}</p>
                            <p class="title">{{ $item->title }}</p>
                            <p>{{ $item->content }}</p>
                        </div>

                    </li>
                </ul>
            </section>
        @endforeach

        {{ $items->links() }}

    </main>
@endsection

@section('pageJs')
@endsection
