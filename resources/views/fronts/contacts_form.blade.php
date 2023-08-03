@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','お問い合わせ')

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@endsection

@section('key_visual')
@endsection

{{-- メインコンテンツの内容 --}}
@section('content')

<main class="main">
    <h2>お問い合わせ</h2>
    <p class="contactWarning">下記の項目にすべて入力頂き、確認画面へ進むボタンを押してください</p>
    <!-- <div class="contact"> -->
    <p class="basic">基本情報</p>

    <form action="/contact" method="POST">
        <!-- 他のフォーム要素をここに追加 -->
        @csrf
        <!-- LaravelのCSRFトークンをフォームに追加 -->
        {{-- <table class="requiredTable" align="left">
            <tr class="contactName">
                <th class="contactItem">名前
                    <p> *</p>
                </th>
                <td class="contactBody">
                    <input type="text" name="名前" class="formText" placeholder="山田太郎" required>
                </td>
            </tr>
        </table> --}}
        <table class="requiredTable" align="left">
            <tr class="contactName">
                <th class="contactItem">メールアドレス
                    <p> *</p>
                </th>
                <td class="contactBody">
                    <input type="email" name="email" class="formText" value="{{ old('email') }}" placeholder="typing@mail.com" required>
                </td>
            </tr>
        </table>

        <div class="mailWarning">
            <div>※携帯などで受信制限されている方は「
                <p class="domainName">ドメイン名</p>」からのメールを受信できるように設定してください。<br>
                ※架空のメールアドレスでの報告は規約違反となり、読まれずに破棄されます。ご注意ください。
            </div>
        </div>
        <p class="basic">問い合わせ内容</p>
        {{-- <div>コンタクトID
            <select name="contact_id">
                <option value="" selected>選択してください</option>
                <option value="1">単語追加要望</option>
                <option value="2">不具合報告</option>
                <option value="3">その他お問い合わせ</option>
            </select>
        </div> --}}
        <table class="contactCategory" align="left">
            <tr>
                <th class="contactItem">問い合わせ種別
                    <p> *</p>
                </th>
                <td class="categoryFirst">
                    <input id="selectRadio1" type="radio" name="contact_type" value="1" required checked>
                    <label for="selectRadio1">言語追加依頼</label>
                </td>
                <td class="category">
                    <input id="selectRadio2" type="radio" name="contact_type" value="2">
                    <label for="selectRadio2">不具合報告</label>
                </td>
                <td class="category">
                    <input id="selectRadio3" type="radio" name="contact_type" value="3">
                    <label for="selectRadio3">その他のお問い合わせ</label>
                </td>
            </tr>
        </table>
        {{-- <div>言語種別
            <select name="language_id">
                <option value="" selected>選択してください</option>
                <option value="1">HTML</option>
                <option value="2">CSS</option>
                <option value="3">JavaScript</option>
                <option value="4">PHP</option>
            </select>
        </div> --}}
        {{-- <div>単語(スペル)
            <input type="text" name="word_spell" value="{{ old('word_spell') }}">
        </div> --}}
        {{-- <div>発音(ルビ)
            <input type="text" name="japanese" value="{{ old('japanese') }}">
        </div> --}}
        {{-- <div>意味
            <input type="textarea" name="meaning" value="{{ old('meaning') }}">
        </div> --}}
        {{-- <div>使用例
            <input type="textarea" name="usage" value="{{ old('usage') }}">
        </div> --}}
        {{-- <div>備考欄
            <input type="textarea" name="memo" value="{{ old('memo') }}">
        </div> --}}
        <table class="contactContent" align="left">
            <tr class="languageName">
                <th class="contactItem">言語名</th>
                <td class="contactBody">
                    <input type="text" name="language_id" class="formText" value="{{ old('language_id') }}" placeholder="HTML">
                </td>
            </tr>
            <tr class="wordName">
                <th class="contactItem">単語名</th>
                <td class="contactBody">
                    <input type="text" name="word_spell" class="formText" value="{{ old('word_spell') }}" placeholder="Math">
                </td>
            </tr>
            <tr class="readingName">
                <th class="contactItem">読み方</th>
                <td class="contactBody">
                    <input type="text" name="japanese" class="formText" value="{{ old('japanese') }}" placeholder="マス">
                </td>
            </tr>
            <tr class="meaningName">
                <th class="contactItem">意味</th>
                <td class="contactBody">
                    <input type="text" name="meaning" class="formText" value="{{ old('meaning') }}" placeholder="数字">
                </td>
            </tr>
            <tr class="example">
                <th class="contactItem">使用例</th>
                <td class="contactBody">
                    <textarea name="usage" class="formTextarea" value="{{ old('usage') }}"></textarea>
                </td>
            </tr>
            <tr>
                <th class="contactItem">問い合わせ</th>
                <td class="contactBody">
                    <textarea name="memo" class="formTextarea" value="{{ old('memo') }}"></textarea>
                </td>
            </tr>
        </table> {{-- <div>メールアドレス
            <input type="email" name="email" value="{{ old('email') }}">
        </div> --}}
        <div>
            {{-- ユーザに登録させない登録日時 --}}
            <input type="hidden" name='created_at' value=''>
        </div>
        <div>
            <input type="reset" value="クリア">&nbsp;&nbsp;
            <input type="submit" value="登録" onclic="return confirm_dialog('記事を登録します。よろしいでしょうか？')">
        </div>
    </form>
</main>

{{-- 暫定的にリンクを貼っておく --}}
{{--
<p class="margin"><a href="{{ route('verification') }}">お問い合わせ確認画面</a></p> --}}

@endsection

@section('pageJs')
<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
