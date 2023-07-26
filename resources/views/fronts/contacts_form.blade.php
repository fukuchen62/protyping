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
        <div>コンタクトID
            <select name="contact_id">
                <option value="" selected>選択してください</option>
                <option value="1">単語追加要望</option>
                <option value="2">不具合報告</option>
                <option value="3">その他お問い合わせ</option>
            </select>
        </div>
        <div>言語種別
            <select name="language_id">
                <option value="" selected>選択してください</option>
                <option value="1">HTML</option>
                <option value="2">CSS</option>
                <option value="3">JavaScript</option>
                <option value="4">PHP</option>
            </select>
        </div>
        <div>単語(スペル)
            <input type="text" name="word_spell" value="{{ old('word_spell') }}">
        </div>
        <div>発音(ルビ)
            <input type="text" name="japanese" value="{{ old('japanese') }}">
        </div>
        <div>意味
            <input type="textarea" name="meaning" value="{{ old('meaning') }}">
        </div>
        <div>使用例
            <input type="textarea" name="usage" value="{{ old('usage') }}">
        </div>
        <div>備考欄
            <input type="textarea" name="memo" value="{{ old('memo') }}">
        </div>
        <div>メールアドレス
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            {{-- ユーザに登録させない登録日時 --}}
            <input type="hidden" name='created_at' value=''>
        </div>
        <div>
            <input type="reset" value="クリア">&nbsp;&nbsp;
            <input type="submit" value="登録" onclic="return confirm_dialog('記事を登録します。よろしいでしょうか？')">
        </div>
    </form>

    {{-- 暫定的にリンクを貼っておく --}}
    <p class="margin"><a href="{{ route('verification') }}">お問い合わせ確認画面</a></p>
@endsection
