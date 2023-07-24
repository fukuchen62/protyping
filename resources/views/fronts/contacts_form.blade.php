@extends('layouts.layout')

@section('title','お問い合わせ')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
    <h1>お問い合わせ</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="/contact" method="POST">
    <!-- 他のフォーム要素をここに追加 -->
    @csrf <!-- LaravelのCSRFトークンをフォームに追加 -->
    <button type="submit">送信</button>
    </form>

    {{-- 暫定的にリンクを貼っておく --}}
    <p class="margin"><a href="{{ route('verification') }}">お問い合わせ確認画面</a></p>
@endsection
