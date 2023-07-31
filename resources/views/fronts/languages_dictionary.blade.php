@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','辞書')

@section('pageCss')
    <link rel="stylesheet" href="../assets/css/dictionary_details.css">

    <!-- フォント設定 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap" rel="stylesheet">
@endsection

@section('key_visual')

{{-- メインコンテンツの内容 --}}
@section('content')
    <!-- サイドバー -->
    <aside class="sidebar">
        <!-- <nav class="globalNav">辞書</nav> -->
            <ul>
                <li class="subMenu1 active"><a href="../html/dictionary_details.html">プログラミングでよく使う英単語</a></li>
                <li class="subMenu2"><a href="#">HTML</a></li>
                <li class="subMenu3"><a href="#">CSS</a></li>
                <li class="subMenu4"><a href="#">JavaScript</a></li>
                <li class="subMenu5"><a href="#">PHP</a></li>
                <li class="subMenu6"><a href="#">Python</a></li>
            </ul>
    </aside>

    <main class="main">
        <ol class="breadCrumb-001">
            <li><a href="#">ホーム</a></li>
            <!-- <li><a href="#">カテゴリー</a></li> -->
            <li><a href="#">プログラミングでよく使う英単語</a></li>
        </ol>

        {{-- 検索フォーム --}}
        <form action="{{ route('dictionary') }}" method="get" class="searchForm001">
            <div>
                <input type="hidden" name="form_identifier" value="form1">
                <input type="text" name="s">
                <input type="submit" value="検索">
            </div>
        </form>

        {{-- 言語選択フォーム --}}
        <form action="{{ route('dictionary') }}" method="get">
            <div class="selectWrap">
                <input type="hidden" name="form_identifier" value="form2">
                <select name="language">
                    <option value="1"selected>HTML</option>
                    <option value="2">CSS</option>
                    <option value="3">JavaScript</option>
                    <option value="4">PHP</option>
                    <option value="5">Python</option>
                    <option value="6">よく使われる英単語</option>
                </select>
                <input type="submit" value="言語種別選択">
            </div>
        </form>

        {{-- 単語一覧表示 --}}
        <table class="dictionary">
            @foreach($items as $item)
            <tbody class="dictionaryBox1">
                <tr class="primary">
                    <th>単語名</th>
                    <th>読み方</th>
                    <th>詳細</th>
                </tr>
                @if(isset($_GET['param']))
                    <tr class="secondary">
                        <td class="detail">{{ $item->word_spell }}</td>
                        <td class="detail">{{ $item->japanese }}</td>
                        <td class="detail">
                            <!---------- ポップアップ ---------->
                            <label class="open" for="popUp">詳細 <img src="../assets/images/dictionary.png" alt=""></label>
                            <input type="checkbox" id="popUp">
                            <div class="overlay">
                                <div class="window">
                                    <label class="close" for="popUp"><img src="../assets/images/dictionary.jpg" alt="閉じるボタン"></label>
                                    <!---------- ポップアップ ---------->
                                    <h2>getElementByid</h2>
                                    <h5>読み方</h5>
                                    <p>ゲットエレメントバイアイディー</p>
                                    <div class="mean">
                                        <h5>意味</h5>
                                        <p>{{ $item->meaning }}</p>
                                    </div>
                                    <div class="example">
                                        <h5>使用例</h5>
                                        <p>{{ $item->usage }}</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @else
                    {{-- 絞り込みもキーワード検索も行われていなければデフォルトでHTMLを表示する --}}
                    {{-- 1:HTML --}}
                    @if($item->language_id == 1)
                    <tr>
                        <td class="detail">{{ $item->word_spell }}</td>
                        <td class="detail">{{ $item->japanese }}</td>
                        <td class="detail">
                            <!---------- ポップアップ ---------->
                            <label class="open" for="popUp">詳細 <img src="../assets/images/dictionary.png" alt=""></label>
                            <input type="checkbox" id="popUp">
                            <div class="overlay">
                                <div class="window">
                                    <label class="close" for="popUp"><img src="../assets/images/dictionary.jpg" alt="閉じるボタン"></label>
                                    <!---------- ポップアップ ---------->
                                    <h2>getElementByid</h2>
                                    <h5>読み方</h5>
                                    <p>ゲットエレメントバイアイディー</p>
                                    <div class="mean">
                                        <h5>意味</h5>
                                        <p>{{ $item->meaning }}</p>
                                    </div>
                                    <div class="example">
                                        <h5>使用例</h5>
                                        <p>{{ $item->usage }}</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endif
            </tbody>
            @endforeach
        </table>
    </main>
@endsection

@section('pageJs')
