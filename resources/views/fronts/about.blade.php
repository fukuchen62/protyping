@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title', 'アバウト')

@section('pageCss')
    <link href="{{ asset('assets/css/about.css') }}" rel="stylesheet">
@endsection

@section('key_visual')
@endsection

{{-- メインコンテンツの内容 --}}
@section('content')
    <main class="main" id="main">

        <!-- パンくずリスト html-->
        {{-- <ol class="breadCrumb-001">
            <li><a href="../fronts/index.blade.php">ホーム</a></li>
            <li><a href="#">アバウト</a></li>
        </ol> --}}

        <!-- タイトル -->
        <h2 class="title">アバウト</h2>

        <section class="landingAbout">

            <h3 class="landingAboutSub">私たちについて</h3>

            <div class="aboutTextBox">
                <p class="aboutText">
                    私たちは、徳島県の職業訓練校 QLIPプログラミングスクールに通うアプリケーション制作科 第3期生の10名です。私たちの持てる技術を駆使して作ったサイトです。お楽しみください。
                </p>
            </div>

            <div class="aboutImageBox">
                <img alt="タイプコードを作ったメンバーの画像です" class="aboutImage" src="{{ asset('assets/images/about_member.jpg') }}">
            </div>

        </section>

        <section class="landingHowto">
            <h3 class="landingHowtoSub">このサイトについて<br>（ゲーム概要）</h3>

            <div class="aboutTextBox">
                <p class="aboutText">
                    プログラミングでよく使う英単語のタイピングゲームができるWEBアプリです。基本的な動きはJavaScriptで実装しております。何度も繰り返し挑戦することで、プログラミングで使う英単語のスペル習得、専門用語とタイピング速度の向上と意味の3つの力がつくと共に、IT業界で役立つ基本的な情報(知っトク情報)も掲載しておりますので、WEB関係の仕事を目指す方々の助けになれば幸いです。
                </p>
            </div>

            <div class="aboutImageBox">
                <img alt=" タイプコードのAboutのゲーム概要の画像です" class="aboutImage" src="{{ asset('assets/images/about_howto.jpg') }}">
            </div>

        </section>

    </main>

@endsection

@section('pageJs')

@endsection
