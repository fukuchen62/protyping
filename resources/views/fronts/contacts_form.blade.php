@extends('layouts.layout_front')

@section('description',
    '言語や単語の追加希望はもちろん、アプリ内でなにかご要望があればこちらからご連絡をお願いします。
    またアプリ内でなにか問題があればご遠慮なくご連絡をお願いします。')

@section('keywords')

@section('title', 'お問い合わせ｜ご意見ご要望お待ちしてます')

@section('pageCss')
    <link href="{{ asset('assets/css/contact.css') }}" rel="stylesheet">

    <!-- jqueryの読み込み -->
    {{-- <script src="../assets/js/vendor/jquery-3.6.3.min.js"></script> --}}

@endsection

@section('key_visual')

    {{-- メインコンテンツの内容 --}}
@section('content')
    <div class="wrap">
        <main class="main">
            <ol class="breadCrumb-001">
                <li><a href="{{ route('top') }}">ホーム</a></li>
                <li><a href="{{ route('contact') }}">お問い合わせ</a></li>
            </ol>
            <h2>お問い合わせ</h2>
            <p class="contactWarning">下記の項目にすべて入力頂き、確認画面へ進むボタンを押してください</p>
            <!-- <div class="contact"> -->
            <p class="basic">基本情報</p>
            <form action="{{ route('contact') }}" method="POST">
                @csrf
                <div class="requiredTableArea">
                    <table class="requiredTable">
                        <tr class="contactName">
                            <th class="contactItem">名前
                                <p> *</p>
                            </th>
                            <td class="contactBody">
                                <input class="formText" name="contact_name" placeholder="山田太郎" required type="text"
                                    value="{{ old('contact_name') }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="contactItem">メールアドレス
                                <p> *</p>
                            </th>
                            <td class="contactBody">
                                <input class="formText" name="email" placeholder="typing@mail.com" required type="email"
                                    value="{{ old('email') }}">
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="mailWarning">
                    <div>※携帯などで受信制限されている方は「
                        <p class="domainName">ドメイン名</p>」からのメールを受信できるように設定してください。<br>
                        ※架空のメールアドレスでの報告は規約違反となり、読まれずに破棄されます。ご注意ください。
                    </div>
                </div>

                <p class="basic">お問い合わせ内容</p>
                <div class="contentTableArea">
                    <table class="contentTable">
                        <tr class="contactCategory">
                            <th class="contactItem">お問い合わせ種別
                                <p> *</p>
                            </th>
                            <td class="categoryFirst">
                                <input checked id="selectRadio1" name="contact_type" required type="radio" value="1">
                                <label for="selectRadio1">言語追加依頼</label>
                            </td>
                            <td class="category">
                                <input id="selectRadio2" name="contact_type" type="radio" value="2">
                                <label for="selectRadio2">不具合報告</label>
                            </td>
                            <td class="category">
                                <input id="selectRadio3" name="contact_type" type="radio" value="3">
                                <label for="selectRadio3">その他のお問い合わせ</label>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="contactContentTableArea">
                    <table class="contactContent">
                        <tr class="languageName">
                            <th class="contactItem">言語名<p>
                            </th>
                            <td class="contactBody">
                                <input class="formText" name="language_id" placeholder="HTML" type="text"
                                    value="{{ old('language_id') }}">
                            </td>
                        </tr>
                        <tr class="wordName">
                            <th class="contactItem">単語名
                            </th>
                            <td class="contactBody">
                                <input class="formText" name="word_spell" type="text"
                                    value="{{ old('word_spell') }}"placeholder="Math">
                            </td>
                        </tr>
                        <tr class="readingName">
                            <th class="contactItem">読み方
                            </th>
                            <td class="contactBody">
                                <input class="formText" name="japanese" placeholder="マス" type="text"
                                    value="{{ old('japanese') }}">
                            </td>
                        </tr>
                        <tr class="meaningName">
                            <th class="contactItem">意味
                            </th>
                            <td class="contactBody">
                                <textarea class="formTextarea" name="meaning" placeholder="数字" value="{{ old('meaning') }}"></textarea>
                            </td>
                        </tr>
                        <tr class="example">
                            <th class="contactItem">使用例
                            </th>
                            <td class="contactBody">
                                <textarea class="formTextarea" name="usage" value="{{ old('usage') }}"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="contactItem">お問い合わせ
                            </th>
                            <td class="contactBody">
                                <textarea class="formTextarea" name="memo" value="{{ old('memo') }}"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="contactBottomArea">
                    <div class="contactBottom">
                        <p>詳細についてはご利用規約を確認ください</p>
                        <div class="termsBtn">
                            <a href="{{ route('terms') }}">ご利用規約</a>
                        </div>
                        <div align="center" class="buttom">
                            <p class="clear"><input type="reset" value="クリア">&nbsp;&nbsp;</p>
                            <input class="contactSubmit" onclick="return confirm_dialog('記事を送信します。よろしいでしょうか？')"
                                type="submit" value="確認画面へ進む">
                        </div>
                    </div>
                </div>
            </form>

            <!-- </div> -->
        </main>
    </div>

    {{-- 暫定的にリンクを貼っておく --}}
    {{-- <p class="margin"><a href="{{ route('verification') }}">お問い合わせ確認画面</a></p> --}}
@endsection

@section('pageJs')
    <script src="{{ asset('assets/js/contact.js') }}"></script>
@endsection
