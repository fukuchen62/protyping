@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','お問い合わせ内容確認')

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/css/contact_result.css') }}">
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
            </ol>
            <h2>確認画面</h2>
            <p class="contactWarning">下記の内容で、
        お間違いないでしょうか？</p>
            <p class="basic">基本情報</p>
            <section class="confirm">
                <label>名前</label>
                <p>山田太郎</p>
                <p class="grayLine"></p>
                <label>メールアドレス</label>
                <p>{{ $contactData['email'] }}</p>
                <p class="grayLine"></p>
                <div class="basic">問い合わせ内容</div>
                <label>問い合わせ種別</label>
                <p>{{ $contactData['contact_type'] }}</p>
                <p class="grayLine"></p>
                <label>言語名</label>
                <p>{{ $contactData['language_id'] }}</p>
                <p class="grayLine"></p>
                <label>単語名</label>
                <p>{{ $contactData['word_spell'] }}</p>
                <p class="grayLine"></p>
                <label>読み方</label>
                <p>{{ $contactData['japanese'] }}</p>
                <p class="grayLine"></p>
                <label>意味</label>
                <p>{{ $contactData['meaning'] }}</p>
                <p class="grayLine"></p>
                <label>使用例</label>
                <p>{{ $contactData['usage'] }}</p>
                <p class="grayLine"></p>
                <label>問い合わせ</label>
                <p>{{ $contactData['memo'] }}</p>
                <p class="grayLine"></p>

            </section>

            <form action="{{ route('verification') }}" method="POST">
                @csrf
                <!-- LaravelのCSRFトークンをフォームに追加 -->
                <input type="hidden" name="email" value="{{ $contactData['email'] }}">
                <input type="hidden" name="contact_type" value="{{ $contactData['contact_type'] }}">
                <input type="hidden" name="language_id" value="{{ $contactData['language_id'] }}">
                <input type="hidden" name="word_spell" value="{{ $contactData['word_spell'] }}">
                <input type="hidden" name="japanese" value="{{ $contactData['japanese'] }}">
                <input type="hidden" name="meaning" value="{{ $contactData['meaning'] }}">
                <input type="hidden" name="usage" value="{{ $contactData['usage'] }}">
                <input type="hidden" name="memo" value="{{ $contactData['memo'] }}">

                <div class="contactBottom">
                    <input type="submit" class="contactSubmit" value="送信する" onclic="return confirm_dialog('記事を登録します。よろしいでしょうか？')">
                    <p class="contactBack"><a href="{{ route('contact') }}">戻る</a></p>
                </div>

                {{-- <div class="contactBottom">
                    <input onclick="location.href='../html/contact_complete.html'" class="contactSubmit" type="submit" value="送信する">
                    <input class="contactBack" onclick="location.href='../html/contact.html'" type="submit" name="btn_back" value="戻る"> --}}
                </div>
            </form>
        </main>
    </div>

@endsection

@section('pageJs')
@endsection
