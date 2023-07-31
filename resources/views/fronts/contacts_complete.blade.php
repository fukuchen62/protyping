@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','お問い合わせ内容確認')

@section('pageCss')
    <link rel="stylesheet" href="../assets/css/contact_complete.css">
@endsection

@section('key_visual')

{{-- メインコンテンツの内容 --}}
@section('content')
    <main class="main">

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <p class="homeBack"><a href="{{ route('top') }}">HOMEに戻る</a></p>
        {{-- <input class="homeBack" onclick="location.href={{ route('top') }}" type="submit" name="home_back" value="HOMEに戻る"> --}}
    </main>
    {{-- 暫定的にリンクを貼っておく --}}
    {{-- <p class="margin"><a href="{{ route('contact') }}">お問い合わせ確認画面</a></p> --}}
@endsection

@section('pageJs')
