@extends('layouts.layout')

@section('title','TOPページ')
@section('mycss')


{{-- メインコンテンツの内容 --}}
@section('maincontents')
    {{-- タイピングゲーム画面 --}}
    <p>これは卒業制作の練習用プロジェクトです。</p>

    {{-- 英語タイピングって？ --}}
    <div><p>英語タイピングって？・・・</p></div>

    {{-- 新着情報 --}}
    <div><p>更新情報</p></div>
    {{-- 知っトク情報 --}}
    <div><p>知っトク情報</p></div>
@endsection

{{-- サイドバーの内容 --}}
@section('sidecontents')
    <h2>ランキング</h2>
    <div>コース選択</div>
    <p>HTML</p>
    <p>CSS</p>
    <p>JavaScript</p>
    <p>PHP</p>
    <p>Python</p>
@endsection
