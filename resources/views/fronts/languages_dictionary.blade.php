@extends('layouts.layout_front')

@section('description',
    'タイピングゲームで出てきた英単語やプログラミングでよく使う英単語の辞書ページです。主にHTML、CSS、JavaScript、PHP、PythonのWEB系プログラム言語を中心に紹介しています。')

@section('keywords')
@endsection

@section('title', '辞書｜各言語の辞書')

@section('pageCss')
    <link href="{{ asset('assets/css/dictionary_details.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet">
@endsection

@section('key_visual')

@endsection

{{-- メインコンテンツの内容 --}}
@section('content')

    <main class="main">
        <!-- パンくずリスト  -->
        <ol class="breadCrumb-001">
            <li><a href="{{ route('top') }}">ホーム</a></li>
            <li><a href="{{ route('dictionary') }}">辞書</a></li>
        </ol>

        {{--
    <h2 class="title">辞書</h2>
    <h3 class="subTitle">
            @if (isset($_GET['s']) && $items->isNotEmpty())
                @php
                    $item = $items->first();
                @endphp
                @if ($item->language_id == 1)
                    HTML
                @elseif($item->language_id == 2)
                    CSS
                @elseif($item->language_id == 3)
                    JavaScript
                @elseif($item->language_id == 4)
                    PHP
                @elseif($item->language_id == 5)
                    Python
                @elseif($item->language_id == 6)
                    プログラミングでよく使う英単語
                @endif
            @else
                HTML
            @endif
        </h3> --}}


        <h2 class="title">辞書</h2>
        <h3 class="subTitle">
            @foreach ($languages as $item)
                @if ($item->id == $lang_id)
                    {{ $item->language_name }}
                    &nbsp;({{ count($item->vocabularies) }})
                @endif
            @endforeach

            {{-- @if (isset($_GET['s']) && $items->isNotEmpty())
                @php
                    $item = $$lang_nameitems->first();
                    $language_id = $item->language_id;
                @endphp
                @if ($_GET['form_identifier'] === 'form1' && isset($_GET['s']))
                    @if ($_GET['s'] === '1')
                        HTML
                    @elseif ($_GET['s'] === '2')
                        CSS
                    @elseif ($_GET['s'] === '3')
                        JavaScript
                    @elseif ($_GET['s'] === '4')
                        PHP
                    @elseif ($_GET['s'] === '5')
                        Python
                    @elseif ($_GET['s'] === '6')
                        プログラミングでよく使う英単語
                    @endif
                @elseif ($language_id === 1)
                    HTML
                @elseif ($language_id === 2)
                    CSS
                @elseif ($language_id === 3)
                    JavaScript
                @elseif ($language_id === 4)
                    PHP
                @elseif ($language_id === 5)
                    Python
                @elseif ($language_id === 6)
                    プログラミングでよく使う英単語
                @endif
            @else
                HTML
            @endif --}}
        </h3>

        <!-- プルダウンメニュー -->
        <div class="selectWrap1">
            <form action="{{ route('dictionary') }}" method="get">
                <input name="form_identifier" type="hidden" value="form2">
                {{-- <form action="{{ route('dictionary') }}" id="select-form" method="get"> --}}
                {{-- <input name="form_identifier" type="hidden" value="form1"> --}}
                <input name="s" type="hidden" value="{{ $s }}">
                <div id="langSelet">
                    {{-- <div>言語：</div> --}}
                    <select id="dictionary-select" name="lang_id">
                        @foreach ($languages as $item)
                            @if ($item->id == $lang_id)
                                <option value="{{ $item->id }}" selected>{{ $item->language_name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->language_name }}</option>
                            @endif
                        @endforeach
                        {{-- <option value="HTML">HTML</option>
                    <option value="CSS">CSS</option>
                    <option value="JavaScript">JavaScript</option>
                    <option value="PHP">PHP</option>
                    <option value="Python">Python</option>
                    <option value="プログラミングでよく使う英単語">プログラミングでよく使う英単語</option> --}}
                    </select>
                    <input type="submit" value="検索">
                </div>

            </form>

        </div>

        <!-- 検索ボックス -->
        <!-- <p>ここから辞書検索ができます。活用してね(^^)</p> -->
        <form action="{{ route('dictionary') }}" class="searchForm001" method="get">
            <input name="form_identifier" type="hidden" value="form1">
            <input name="lang_id" type="hidden" value="{{ $lang_id }}">

            <input name="s" placeholder="ここで辞書検索ができます" type="text" value="{{ $s }}">
            <button type="submit"></button>
            {{-- <input type="submit" value="検索"> --}}
        </form>

        <div action="{{ route('dictionary') }}" class="contentBox" method="get">
            <!-- サイドバー -->
            <aside class="sidebar">
                <form action="{{ route('dictionary') }}" method="get">
                    <input name="form_identifier" type="hidden" value="form2">
                    {{-- <input name="s" placeholder="ここで辞書検索ができます" type="text"> --}}
                    <input name="s" type="hidden" value="{{ $s }}">
                    <ul>
                        <li class="globalNav">辞書選択</li>

                        @foreach ($languages as $item)
                            @if ($item->id == $lang_id)
                                <li class="subMenu2 active">
                                    <button name="lang_id" type="submit"
                                        value="{{ $item->id }}">{{ $item->language_name }}</button>
                                    &nbsp;({{ count($item->vocabularies) }})
                                </li>
                            @else
                                <li class="subMenu2">
                                    <button name="lang_id" type="submit"
                                        value="{{ $item->id }}">{{ $item->language_name }}</button>
                                    &nbsp;({{ count($item->vocabularies) }})
                                </li>
                            @endif
                        @endforeach
                        {{-- <li class="subMenu2">
                            <button name="s" type="submit" value="1">HTML</button>
                        </li>
                        <li class="subMenu3">
                            <button name="s" type="submit" value="2">CSS</button>
                        </li>
                        <li class="subMenu3">
                            <button name="s" type="submit" value="3">JavaScript</button>
                        </li>
                        <li class="subMenu5">
                            <button name="s" type="submit" value="4">PHP</button>
                        </li>
                        <li class="subMenu6">
                            <button name="s" type="submit" value="5">Python</button>
                        </li>
                        <li class="subMenu1">
                            <button name="s" type="submit" value="6">プログラミングでよく使う英単語</button>
                        </li> --}}
                        {{-- <li class="subMenu6">
                        <button type="submit" name="s" value="6">よく使う英単語</button>
                    </li> --}}
                    </ul>
                </form>
            </aside>

            {{-- ページネーションのページ番号 --}}
            @php
                $pageno = 0;
                if (request()->input('page') != null) {
                    $pageno = request()->input('page') - 1;
                }
            @endphp
            <!-- テーブル -->
            <table class="dictionary">
                <thead class="headLine">
                    <tr>
                        <th class="no" width="8%">No</th>
                        <th class="wordCol" width="30%">単語名<span class="">・読み方</span></th>
                        <th class="descrpCol" width="50%">意味</th>
                        <th width="8%">使用例</th>
                    </tr>
                </thead>
                @foreach ($items as $key => $item)
                    @if (isset($_GET['s']))
                        <tbody class="dictBody">
                            <tr class="dictRow">
                                <td class="no">{{ $key + 1 + $pageno * 20 }}</td>
                                <td class="wordCol">
                                    <p class="phrase">{{ $item->word_spell }}</p>
                                    <p class="">{{ $item->japanese }}</p>
                                </td>
                                <td class="descrpCol">
                                    <p>{{ $item->meaning }}</p>
                                </td>
                                <td class="detail secondary">
                                    <p class="detailText"></p>
                                    <!---------- ポップアップ ---------->
                                    <label class="open" for="popUp1{{ $item->id }}">
                                        <img alt="" src="{{ asset('assets/images/dictionary.png') }}">
                                    </label>
                                    <input id="popUp1{{ $item->id }}" style="display: none;" type="checkbox">
                                    <div class="overlay">
                                        <div class="popWindow">
                                            <label class="close" for="popUp1{{ $item->id }}"><img alt="閉じるボタン"
                                                    src="{{ asset('assets/images/dictionary.jpg') }}"></label>
                                            <h2>{{ $item->word_spell }}</h2>
                                            <div class="read">
                                                {{--
                                    <h5>読み方</h5> --}}
                                                <p>{{ $item->japanese }}</p>
                                            </div>
                                            <div class="mean">
                                                {{--
                                    <h5>意味</h5> --}}
                                                <p>{{ $item->meaning }}
                                                </p>
                                            </div>
                                            <div class="example">
                                                {{--
                                    <h5>使用例</h5> --}}
                                                <pre>{{ $item->usage }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @elseif ($item->language_id == 1)
                        <tbody class="dictBody">
                            <tr class="dictRow">
                                <td class="no">{{ $key + 1 + $pageno * 20 }}</td>
                                <td class="wordCol">
                                    <p class="phrase">{{ $item->word_spell }}</p>
                                    <p class="">{{ $item->japanese }}</p>
                                </td>
                                <td class="descrpCol">
                                    <p>{{ $item->meaning }}</p>
                                </td>
                                <td class="detail secondary">
                                    <p class="detailText"></p>
                                    <!---------- ポップアップ ---------->
                                    <label class="open" for="popUp1{{ $item->id }}">
                                        <img alt="" src="{{ asset('assets/images/dictionary.png') }}">
                                    </label>
                                    <input id="popUp1{{ $item->id }}" style="display: none;" type="checkbox">
                                    <div class="overlay">
                                        <div class="popWindow">
                                            <label class="close" for="popUp1{{ $item->id }}"><img alt="閉じるボタン"
                                                    src="{{ asset('assets/images/dictionary.jpg') }}"></label>
                                            <h2>{{ $item->word_spell }}</h2>
                                            {{--
                                <h5>読み方</h5> --}}
                                            <p>{{ $item->japanese }}</p>
                                            <div class="mean">
                                                {{--
                                    <h5>意味</h5> --}}
                                                <p>{{ $item->meaning }}
                                                </p>
                                            </div>
                                            <div class="example">
                                                {{--
                                    <h5>使用例</h5> --}}
                                                <pre>{{ $item->usage }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- ページネーション --}}
        {{ $items->links() }}
    </main>

@endsection

@section('pageJs')
    <script>
        // プルダウンリストが選択されたらフォームを送信する
        document.getElementById('dictionary-select').addEventListener('change', function() {
            document.getElementById('select-form').submit();
        });
    </script>

@endsection
