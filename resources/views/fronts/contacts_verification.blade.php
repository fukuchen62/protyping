@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','お問い合わせ内容確認')

@section('pageCss')

@section('key_visual')

{{-- メインコンテンツの内容 --}}
@section('content')
    <h1>お問い合わせ内容確認</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if(count($errors) > 0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <p><strong>コンタクトID:</strong> {{ $contactData['contact_id'] }}</p>
    <p><strong>言語種別:</strong> {{ $contactData['language_id'] }}</p>
    <p><strong>単語(スペル):</strong> {{ $contactData['word_spell'] }}</p>
    <p><strong>発音(ルビ):</strong> {{ $contactData['japanese'] }}</p>
    <p><strong>意味:</strong> {{ $contactData['meaning'] }}</p>
    <p><strong>使用例:</strong> {{ $contactData['usage'] }}</p>
    <p><strong>備考欄:</strong> {{ $contactData['memo'] }}</p>
    <p><strong>メールアドレス:</strong> {{ $contactData['email'] }}</p>

    <form action="{{ route('verification') }}" method="POST">
        @csrf <!-- LaravelのCSRFトークンをフォームに追加 -->
        <input type="hidden" name="contact_id" value="{{ $contactData['contact_id'] }}">
        <input type="hidden" name="language_id" value="{{ $contactData['language_id'] }}">
        <input type="hidden" name="word_spell" value="{{ $contactData['word_spell'] }}">
        <input type="hidden" name="japanese" value="{{ $contactData['japanese'] }}">
        <input type="hidden" name="meaning" value="{{ $contactData['meaning'] }}">
        <input type="hidden" name="usage" value="{{ $contactData['usage'] }}">
        <input type="hidden" name="memo" value="{{ $contactData['memo'] }}">
        <input type="hidden" name="email" value="{{ $contactData['email'] }}">

        <input type="submit" value="登録" onclic="return confirm_dialog('記事を登録します。よろしいでしょうか？')">
    </form>

    {{-- 暫定的にリンクを貼っておく --}}
    {{-- <p class="margin"><a href="{{ route('contact') }}">お問い合わせ確認画面</a></p> --}}
@endsection

@section('pageJs')
