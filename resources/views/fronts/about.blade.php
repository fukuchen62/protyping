@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','アバウト')

@section('pageCss')
<link rel="stylesheet" href="{{ asset('./assets/css/about.css') }}">

@section('key_visual')

{{-- メインコンテンツの内容 --}}
@section('content')
<main id="main" class="main">


    <!-- パンくずリスト html-->
    <ol class="breadCrumb-001">
        <li><a href="{{ route('top') }}">ホーム</a></li>
        <li><a href="#">カテゴリー</a></li>
        <li><a href="#">タイトル</a></li>
    </ol>

    <!-- タイトル -->
    <h2 class="title">About</h2>

    <section class="landingAbout">

        <h3 class="landingAboutSub">私達について</h3>

        <div class="aboutTextBox">
            <p class="aboutText">私達は、徳島の職業訓練校のQLIPプログラミングスクールに通うアプリケーション制作科の第3期生の10名です。私たちの持てる技術を駆使して作ったサイトになります。楽しんで行ってください。
                    </p>
        </div>

        <div class="aboutImageBox">
            <img class="aboutImage" src="{{ asset('./assets/images/about_member.jpg') }}" alt="タイプコードを作ったメンバーの画像です">
        </div>

    </section>

    <section class="landingHowto">
        <h3 class="landingHowtoSub">このサイトについて<br>（ゲーム概要）</h3>

        <div class="aboutTextBox">
            <p class="aboutText">プログラミングでよく使う英単語のタイピングゲームができるWEBアプリです。基本的な動きはJavaScriptで実装しております。何度も繰り返し挑戦することで、プログラミングで使う英単語のスペル習得、専門用語とタイピング速度の向上と意味の3つの力がつくと共にIT業界で、役立つ基本的な情報(知っトク情報)も喝采しておりますので、WEB関係の仕事を目指す方々の助けになれれば幸いです。
                    </p>
        </div>


        <div class="aboutImageBox">
            <img class="aboutImage" src="{{ asset('./assets/images/about_howto.jpg') }}" alt=" タイプコードのAboutのゲーム概要の画像です">
        </div>

    </section>

    <!-- トップへ戻るボタン -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
    <div id="pageTop"><a href="#"></a></div>

</main>
@endsection

@section('pageJs')
