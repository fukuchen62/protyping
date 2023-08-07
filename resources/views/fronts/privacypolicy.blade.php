@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title', 'プライバシーポリシー')

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/css/privacy_policy.css') }}">
@endsection

@section('key_visual')
@endsection

{{-- メインコンテンツの内容 --}}
@section('content')

<!-- ここからメイン -->
<main class="main">
    <div class="boxPrivacy">

        <h2>プライバシーポリシー</h2>

        <h3>個人情報の取り扱いについて</h3>
        <p>本プライバシーポリシーは、『タイプコード』（以下「本サイト」といいます。） の各種サービス（本サイトによる情報提供、お問い合わせ等）において、本サイトを利用
                する皆様の個人情報もしくはそれに準ずる情報を取り扱う際に、本サイトが遵守する方針を 示したものです。</p>
        <h3>第1条 基本方針</h3>
        <p>本サイトでは、個人情報の重要性を認識し、個人情報を保護することが社会的責務であると考え、 個人情報に関する法令を遵守し、本サイトで取り扱う個人情報の取得、利用、管理を適正に行います。
                ただし、本サイト、本サイト運営者、第三者に対して、被害報告があった場合などは、個人情報を開示させて頂くことがございます。
                また、ランキングの名前、得点などの情報に関しては、公開させて頂きます。
            <p>
            <h3>第2条 収集する情報の範囲</h3>
            <p>本サイトでは、インターネットドメイン名、IPアドレス、当サイトの閲覧等の情報
                （以下「利用者の情報」という。）、お問い合わせページの入力フォームよりご連絡をいただいた情報、ランキングの名前を入力頂いた情報を自動的に収集します。なお、Cookie（
                サーバ側で利用者を識別するために、サーバから利用者のブラウザに送信され、利用者のコンピュータに 蓄積される情報）は、本サイトの利用性の向上を目的とする。</p>
        <h3>第3条 利用目的</h3>
        <p>第2条のにおいて収集した情報は、本サイトが提供するサービスを円滑に運営するために利用する場合がございます。第2条のお問い合わなどにおいて収集した個人情報は、回答や確認の連絡のために利用します。</p>
        <h3>第4条 情報管理</h3>
        <p class="privacyP">利用者からご提供いただいた情報については、正確かつ最新の情報となるよう努めます。 本サイトは、個人情報の漏えいを防止するために、適切なセキリュティ対策を実施して個人情報を保護します。
                本サイトは、利用者本人の同意を得ることなく「第３条利用目的」以外の目的に利用したり、第三者に提供したりいたしません。
                ただし、以下場合には、利用者からご提供いただいた個人情報を利用者本人の同意を得ることなく開示させてくことがございます。</p>
        <ol>
            <li>不正アクセス脅迫等の違法行為があった場合</li>
            <li>本サイト、本サイト運営者、第三者に対して、被害報告があった場合</li>
            <li>利用規約の禁止事項に該当する場合</li>
        </ol>

        <div class="toTerms"><a href="{{ route('terms') }}">(*禁止事項に関しては、利用規約をご覧ください。)</a></div>

        <h3>第5条 適用範囲</h3>

        <p>本プライバシーポリシーは、本サイトにおいてのみ適用されます。また、本サイトの外部リンクのサイトにおける個人情報の取扱いについては、リンク先のサイトが規定を定めています。リンク先のプライバシーポリシーをご確認下さい。
            </p>


        <h3>第６条・内容の変更について</h3>
        <p class="privacyBottom">
                本プライバシーポリシーの内容は、法令その他本プライバシーポリシーに別段の定めのある事項を除いて、ユーザーに通知することなく、変更することができるものとします。本サイトが別途定める場合を除いて、変更後のプライバシーポリシーは本サイトに掲載したときから効力を生じるものとします。本プライバシーポリシーの内容は、法令その他本プライバシーポリシーに別段の定めのある事項を除いて、ユーザーに通知することなく、変更することができるものとします。本サイトが別途定める場合を除いて、変更後のプライバシーポリシーは本サイトに掲載したときから効力を生じるものとします。
            </p>
    </div>
</main>

@endsection

@section('pageJs')
<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
