@extends('layouts.layout')

@section('title','知っトク記事一覧')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
    <h1>知っトク記事一覧</h1>

    {{-- アイコンは暫定的に表示 --}}
    <p><a href="{{ route('details', ['param' => '4']) }}">
        <img src="assets/images/icon/favicon.png" alt="環境開発セットアップ"></a>
        @foreach($items as $key => $item)
            @if($key == 3)
                {{ $item->summary }}
            @endif
        @endforeach
    </p>
    <p><a href="{{ route('details', ['param' => '5']) }}">
        <img src="assets/images/icon/favicon.png" alt="wordpress"></a>
        @foreach($items as $key => $item)
            @if($key == 4)
                {{ $item->summary }}
            @endif
        @endforeach
    </p>
    <p><a href="{{ route('details', ['param' => '6']) }}">
        <img src="assets/images/icon/favicon.png" alt="おすすめWebアプリ"></a>
        @foreach($items as $key => $item)
            @if($key == 5)
                {{ $item->summary }}
            @endif
        @endforeach
    </p>
    <p><a href="{{ route('details', ['param' => '7']) }}">
        <img src="assets/images/icon/favicon.png" alt="おすすめWebサイト"></a>
        @foreach($items as $key => $item)
            @if($key == 6)
                {{ $item->summary }}
            @endif
        @endforeach
    </p>
    <p><a href="{{ route('details', ['param' => '8']) }}">
        <img src="assets/images/icon/favicon.png" alt="ショートカット"></a>
        @foreach($items as $key => $item)
            @if($key == 7)
                {{ $item->summary }}
            @endif
        @endforeach
    </p>
    <p><a href="{{ route('details', ['param' => '9']) }}">
        <img src="assets/images/icon/favicon.png" alt="資格"></a>
        @foreach($items as $key => $item)
            @if($key == 8)
                {{ $item->summary }}
            @endif
        @endforeach
    </p>
    <p><a href="{{ route('details', ['param' => '10']) }}">
        <img src="assets/images/icon/favicon.png" alt="Chrome拡張機能"></a>
        @foreach($items as $key => $item)
            @if($key == 9)
                {{ $item->summary }}
            @endif
        @endforeach
    </p>
    <p><a href="{{ route('details', ['param' => '11']) }}">
        <img src="assets/images/icon/favicon.png" alt="卒業生の作品"></a>
        @foreach($items as $key => $item)
            @if($key == 10)
                {{ $item->summary }}
            @endif
        @endforeach
    </p>
@endsection
