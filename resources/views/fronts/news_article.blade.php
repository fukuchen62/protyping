@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title', '更新情報')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('assets/css/update.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
@endsection

@section('key_visual')

@endsection

{{-- メインコンテンツの内容 --}}
@section('content')

    <main class="main">

        <!-- パンくずリスト -->
        <ol class="breadCrumb-001">
            <li><a href="../fronts/index.blade.php">ホーム</a></li>
            <li><a href="#">更新情報</a></li>
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
