@extends('layouts.layout_back')

@section('title', 'タイピングコード')

@section('subtitle', 'ダッシュボード')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection

{{-- ワークスペース
    一覧画面、新規入力・編集画面など --}}
@section('content')

    <section>
        <h3>直近投稿</h3>
        <table class="info">
            <tr>
                <th>ID</th>
                <th>カテゴリ</th>
                <th>タイトル</th>
                <th class="clum-text">概要</th>
                <th>投稿日時</th>
                <th>編集</th>
            </tr>

            @foreach ($news_list as $key => $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->newsCategory->category_name }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->summary }}</td>
                    <td class="dt">{{ $news->created_at }}</td>
                    <td class="edit"><a href="{{ route('editarticle') }}?id={{ $news->id }}">編集</a></td>
                </tr>
            @endforeach
        </table>
    </section>

    <section class="mt40">
        <h3>データの件数</h3>
        <table class="info tbl-count">
            <tr>
                <th>ニュース</th>
                <th>問い合わせ</th>
                <th>タイピングゲーム</th>
                <th>知っトク情報</th>
                <th>言語</th>
                <th>ランキング</th>
                <th>辞書の単語</th>
                <th>ユーザー</th>
            </tr>
            <tr>
                <td>{{ $counts['news_count'] }}</td>
                <td>{{ $counts['contact_count'] }}</td>
                <td>{{ $counts['game_count'] }}</td>
                <td>{{ $counts['knowhow_count'] }}</td>
                <td>{{ $counts['language_count'] }}</td>
                <td>{{ $counts['score_count'] }}</td>
                <td>{{ $counts['vocabulary_count'] }}</td>
                <td>{{ $counts['user_count'] }}</td>
            </tr>
        </table>
    </section>
@endsection

{{-- 該当ページ専用JS --}}
@section('pageJs')

@endsection
