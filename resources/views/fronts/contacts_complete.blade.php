@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title', 'お問い合わせ内容確認')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('assets/css/contact_complete.css') }}">
@endsection

@section('key_visual')
@endsection

{{-- メインコンテンツの内容 --}}
@section('content')
    <!-- ここからメイン -->
    <div class="wrap">
        <main class="main">
            <ol class="breadCrumb-001">
                <li><a href="{{ route('top') }}">ホーム</a></li>
                <li><a href="{{ route('contact') }}">お問い合わせ</a></li>
                <li><a href="{{ route('verification') }}">確認</a></li>
                <li><a href="#">送信完了</a></li>
            </ol>
            {{-- デバッグ用 --}}
            {{-- @if (session('success'))
            <div>{{ session('success') }}</div>
            @endif --}}
            <p>送信いたしました。<br>お問い合わせいただき誠にありがとうございます。</p>
            <div class="contactBottom" align="center">
                <p class="homeBack"><a href="{{ route('top') }}">
                        ホームに戻る
                    </a></p>
            </div>
        </main>
    </div>

@endsection

@section('pageJs')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
