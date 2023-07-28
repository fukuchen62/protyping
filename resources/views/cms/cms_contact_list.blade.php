@extends('layouts.layout_back')

@section('title', 'タイプコード管理システム')

@section('subtitle', 'お問い合わせ')

@section('login_name', 'QLIP')

{{-- 該当ページのCSS --}}
@section('pageCss')

@endsection


@section('content')
    <h3>言語一覧 ({{ $count }})</h3>

    {{-- サブメニュー --}}
    <ul class="menubar">
        <li><a href="{{ route('indexcontact') }}">一覧画面</a></li>
        {{-- <li><a href="{{ route('addcontact') }}">新規登録</a></li> --}}
    </ul>

    {{-- 検索条件入力フォーム --}}
    <form action="{{ route('indexcontact') }}" method="get" class="search">
        <div>
            検索条件&nbsp;<input type="text" value="{{ $s }}" name="s">
            <input type="submit" value="検索" class="search_btn">
        </div>
    </form>
    <table class="info">
        <tr>
            <th width="5%">No</th>
            <th width="5%">ID</th>
            <th width="5%">コンタクトID</th>
            <th width="5%">言語種別ID</th>
            <th width="10%">単語(スペル)</th>
            <th width="10%">発音(ルビ)</th>
            <th>意味</th>
            <th>使用例</th>
            <th>備考欄</th>
            <th width="10%">メールアドレス</th>
            <th width="5%">ステータス</th>
            <th width="10%">修正</th>
        </tr>
        @foreach ($contact_list as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->contact_type }}</td>
                <td>{{ $item->language_id }}</td>
                <td>{{ $item->word_spell }}</td>
                <td>{{ $item->japanese }}</td>
                <td>{{ $item->meaning }}</td>
                <td>{{ $item->usage }}</td>
                <td>{{ $item->memo }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->status }}</td>
                <td class="edit"><a href="{{ route('editcontact', ['id' => $item->id]) }}">編集</a></td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')

@endsection
