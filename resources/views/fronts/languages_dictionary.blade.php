@extends('layouts.layout_front')

@section('discription')

@endsection

@section('keywords')
@endsection

@section('title', '辞書')

@section('pageCss')
    <link href="../assets/css/dictionary_details.css" rel="stylesheet">

@endsection

@section('key_visual')

@endsection

{{-- メインコンテンツの内容 --}}
@section('content')

    <main class="main">
        <!-- パンくずリスト  -->
        <ol class="breadCrumb-001">
            <li><a href="#">ホーム</a></li>
            <li><a href="#">プログラミングでよく使う英単語</a></li>
            <!-- <li><a href="#">タイトル</a></li> -->
        </ol>

        <h2 class="title">-辞書-</h2>
        <h3 class="subTitle">プログラミングでよく使う英単語</h3>

        <!-- プルダウンメニュー -->
        <div class="selectWrap">
            <select id="word-select" name="word">
                <option selected value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="JavaScript">JavaScript</option>
                <option value="PHP">PHP</option>
                <option value="Python">Python</option>
            </select>
        </div>

        <!-- 検索ボックス -->
        <!-- <p>ここから辞書検索ができます。活用してね(^^)</p> -->
        <form action="#" class="searchForm001">
            <input name="s" placeholder="ここで辞書検索ができます" type="text">
            <button type="submit"></button>
        </form>

        <div class="contentBox">
            <!-- サイドバー -->
            <aside class="sidebar">
                <!-- <nav class="globalNav">辞書</nav> -->
                <ul>
                    <li class="globalNav">辞書選択</li>
                    <!-- <li class="subMenu1 active"><a href="../html/dictionary_details.html">プログラミングでよく使う英単語</a></li> -->
                    <li class="subMenu2"><a href="#">HTML</a></li>
                    <li class="subMenu3"><a href="#">CSS</a></li>
                    <li class="subMenu4"><a href="#">JavaScript</a></li>
                    <li class="subMenu5"><a href="#">PHP</a></li>
                    <li class="subMenu6"><a href="#">Python</a></li>
                </ul>
            </aside>

            <!-- テーブル -->
            <table class="dictionary">
                <thead class="headLine">
                    <tr>
                        <th class="no">No</th>
                        <th class="wordCol">単語名<span class="description">・読み方</span></th>
                        <th class="descrpCol">読み方</th>
                        <th>使用例</th>
                    </tr>
                </thead>
                <tbody class="dictBody">
                    <tr class="dictRow">
                        <td class="no">1</td>
                        <td class="wordCol">
                            <p class="phrase">getElementByid</p>
                            <p class="description">ゲットエレメントバイアイディー</p>
                        </td>
                        <td class="descrpCol">
                            <p>ゲットエレメントバイアイディー</p>
                        </td>
                        <td class="detail secondary">
                            <p class="detailText">詳細</p>
                            <!---------- ポップアップ ---------->
                            <label class="open" for="popUp1">
                                <img alt="" src="../assets/images/dictionary.png">
                            </label>
                            <input id="popUp1" type="checkbox">
                            <div class="overlay">
                                <div class="popWindow">
                                    <label class="close" for="popUp1"><img alt="閉じるボタン"
                                            src="../assets/images/dictionary.jpg"></label>
                                    <h2>getElementByid</h2>
                                    <h5>読み方</h5>
                                    <p>ゲットエレメントバイアイディー</p>
                                    <div class="mean">
                                        <h5>意味</h5>
                                        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                        </p>
                                    </div>
                                    <div class="example">
                                        <h5>使用例</h5>
                                        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="dictRow">
                        <td class="no">2</td>
                        <td class="wordCol">
                            <p class="phrase">getElementByid</p>
                            <p class="description">ゲットエレメントバイアイディー</p>
                        </td>
                        <td class="descrpCol">
                            <p>ゲットエレメントバイアイディー</p>
                        </td>
                        <td class="detail secondary">
                            <p class="detailText">詳細</p>
                            <!---------- ポップアップ ---------->
                            <label class="open" for="popUp1">
                                <img alt="" src="../assets/images/dictionary.png">
                            </label>
                            <input id="popUp1" type="checkbox">
                            <div class="overlay">
                                <div class="popWindow">
                                    <label class="close" for="popUp1"><img alt="閉じるボタン"
                                            src="../assets/images/dictionary.jpg"></label>
                                    <h2>getElementByid</h2>
                                    <h5>読み方</h5>
                                    <p>ゲットエレメントバイアイディー</p>
                                    <div class="mean">
                                        <h5>意味</h5>
                                        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                        </p>
                                    </div>
                                    <div class="example">
                                        <h5>使用例</h5>
                                        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    {{-- 参考するもの --}}

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
        <form action="{{ route('dictionary') }}" class="searchForm001" method="get">
            <div>
                <input name="form_identifier" type="hidden" value="form1">
                <input name="s" type="text">
                <input type="submit" value="検索">
            </div>
        </form>

        {{-- 言語選択フォーム --}}
        <form action="{{ route('dictionary') }}" method="get">
            <div class="selectWrap">
                <input name="form_identifier" type="hidden" value="form2">
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
            @foreach ($items as $item)
                <tbody class="dictionaryBox1">
                    <tr class="primary">
                        <th>単語名</th>
                        <th>読み方</th>
                        <th>詳細</th>
                    </tr>
                    @if (isset($_GET['param']))
                        <tr class="secondary">
                            <td class="detail">{{ $item->word_spell }}</td>
                            <td class="detail">{{ $item->japanese }}</td>
                            <td class="detail">
                                <!---------- ポップアップ ---------->
                                <label class="open" for="popUp">詳細 <img alt=""
                                        src="../assets/images/dictionary.png"></label>
                                <input id="popUp" type="checkbox">
                                <div class="overlay">
                                    <div class="window">
                                        <label class="close" for="popUp"><img alt="閉じるボタン"
                                                src="../assets/images/dictionary.jpg"></label>
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
                        @if ($item->language_id == 1)
                            <tr>
                                <td class="detail">{{ $item->word_spell }}</td>
                                <td class="detail">{{ $item->japanese }}</td>
                                <td class="detail">
                                    <!---------- ポップアップ ---------->
                                    <label class="open" for="popUp">詳細 <img alt=""
                                            src="../assets/images/dictionary.png"></label>
                                    <input id="popUp" type="checkbox">
                                    <div class="overlay">
                                        <div class="window">
                                            <label class="close" for="popUp"><img alt="閉じるボタン"
                                                    src="../assets/images/dictionary.jpg"></label>
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
@endsection
