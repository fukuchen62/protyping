@extends('layouts.layout')

@section('title','お問い合わせ内容確認')
@section('mycss')

{{-- メインコンテンツの内容 --}}
@section('maincontents')
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

    <form action="{{ route('verification') }}" method="POST">
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
            <input type="text" name="word_spell">
        </div>
        <div>発音(ルビ)
            <input type="text" name="japanese">
        </div>
        <div>意味
            <input type="textarea" name="meaning">
        </div>
        <div>使用例
            <input type="textarea" name="usage">
        </div>
        <div>備考欄
            <input type="textarea" name="memo">
        </div>
        <div>メールアドレス
            <input type="email" name="email">
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
    <p class="margin"><a href="{{ route('contact') }}">お問い合わせ確認画面</a></p>
@endsection
