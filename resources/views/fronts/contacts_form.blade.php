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


<div class="wrap">
    <main class="main">
        <ol class="breadCrumb-001">
            <li><a href="../html/index.html">ホーム</a></li>
            <li><a href="#">お問い合わせ</a></li>
        </ol>
        <h2>お問い合わせ</h2>
        <p class="contactWarning">下記の項目にすべて入力頂き、確認画面へ進むボタンを押してください</p>
        <!-- <div class="contact"> -->
        <p class="basic">基本情報</p>
        <form action="/contact" method="POST">
            <div class="requiredTableArea">
                <table class="requiredTable">
                    <tr class="contactName">
                        <th class="contactItem">名前
                            <p> *</p>
                        </th>
                        <td class="contactBody">
                            <input type="text" name="名前" class="formText" placeholder="山田太郎" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="contactItem">メールアドレス
                            <p> *</p>
                        </th>
                        <td class="contactBody">
                            <input type="email" name="メール" class="formText" placeholder="typing@mail.com" required>
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

            <p class="basic">問い合わせ内容</p>
            <div class="contentTableArea">
                <table class="contentTable">
                    <tr class="contactCategory">
                        <th class="contactItem">問い合わせ種別
                            <p> *</p>
                        </th>
                        <td class="categoryFirst">
                            <input id="selectRadio1" type="radio" name="category" value="言語追加依頼" required checked>
                            <label for="selectRadio1">言語追加依頼</label>
                        </td>
                        <td class="category">
                            <input id="selectRadio2" type="radio" name="category" value="不具合報告">
                            <label for="selectRadio2">不具合報告</label>
                        </td>
                        <td class="category">
                            <input id="selectRadio3" type="radio" name="category" value="その他のお問い合わせ">
                            <label for="selectRadio3">その他のお問い合わせ</label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="contactContentTableArea">
                <table class="contactContent">
                    <tr class="languageName">
                        <th class="contactItem">言語名</th>
                        <td class="contactBody">
                            <input type="text" name="言語名" class="formText" placeholder="HTML">
                        </td>
                    </tr>
                    <tr class="wordName">
                        <th class="contactItem">単語名</th>
                        <td class="contactBody">
                            <input type="text" name="単語名" class="formText" placeholder="Math">
                        </td>
                    </tr>
                    <tr class="readingName">
                        <th class="contactItem">読み方</th>
                        <td class="contactBody">
                            <input type="text" name="読み方" class="formText" placeholder="マス">
                        </td>
                    </tr>
                    <tr class="meaningName">
                        <th class="contactItem">意味</th>
                        <td class="contactBody">
                            <input type="text" name="意味" class="formText" placeholder="数字">
                        </td>
                    </tr>
                    <tr class="example">
                        <th class="contactItem">使用例</th>
                        <td class="contactBody">
                            <textarea name="textarea" class="formTextarea"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="contactItem">問い合わせ</th>
                        <td class="contactBody">
                            <textarea name="textarea" class="formTextarea"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="contactBottomArea">
                <div class="contactBottom">
                    <p class="grayLine"></p>
                    <p>詳細についてはご利用規約を確認ください</p>
                    <div class="termsBtn">
                        <a href="../html/terms.html">ご利用規約</a>
                    </div>
                    <input onclick="location.href='../html/contact_result.html'" class="contactSubmit" type="submit" value="確認画面へ進む">
                </div>
            </div>
        </form>

        <!-- </div> -->
    </main>
</div>


@endsection

@section('pageJs')
<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
