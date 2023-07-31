@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','更新情報')

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/css/update.css') }}">
@endsection

@section('key_visual')

@endsection

{{-- メインコンテンツの内容 --}}
@section('content')



<h1>更新情報</h1>

{{-- <table>
    <tr>
        <th>タイトル</th>
        <th>サムネイル</th>
        <th>概要</th>
        <th>内容</th>
        <th>新規作成日時</th>
    </tr>

    @foreach($items as $item)
    <tr>
        <th>{{ $item->title }}</th>
        <th>{{ $item->thumbnail }}</th>
        <th>{{ $item->summary }}</th>
        <th>{{ $item->content }}</th>
        <th>{{ $item->created_at }}</th>
    </tr>
    @endforeach
</table> --}}
{{-- {{ $items->links() }} --}}

@foreach($items as $item)

@php
$timestamp = \Carbon\Carbon::parse($item->created_at);
@endphp

<section class="updateInformation">

    <ul class="updateList">
        <li>
            <img src="{{ asset('assets/images/' . $item->thumbnail) }}" alt="{{ $item->title }}">

            <p>{{ $timestamp->format('Y年m月d日') }}<br>
            {{-- {{ $item->created_at }} --}}
            {{ $item->title }}｜
                                {{ $item->content }}</p>
        </li>
    </ul>
</section>
@endforeach
{{ $items->links() }}
@endsection

@section('pageJs')
@endsection
