@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','更新情報')

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
        <li><a href="#">ホーム</a></li>
        <li><a href="#">更新情報</a></li>
    </ol>

    <h2>更新情報</h2>

    @foreach($items as $item)
        @php
        $timestamp = \Carbon\Carbon::parse($item->created_at);
        @endphp

        <section class="updateInformation">

            <ul class="updateList">
                <li>
                    <p>{{ $timestamp->format('Y年m月d日') }}<br>
                    {{ $item->title }}｜
                                        {{ $item->content }}</p>
                </li>
            </ul>
        </section>
    @endforeach

    {{ $items->links() }}

</main>
@endsection

@section('pageJs')
@endsection
