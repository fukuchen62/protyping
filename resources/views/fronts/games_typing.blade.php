@extends('layouts.layout')

@section('title','ゲーム画面')
@section('mycss')
    <link rel="stylesheet" href="assets/css/typingstyle.css" />
@endsection

{{-- ゲーム画面の内容 --}}
@section('maincontents')
    <h1>ゲーム画面</h1>
    <div id="game-screen">
        <div id="game-header">
            <h2 class="description">システムエンジニアのためのタイピングゲーム</h2>
            <!-- <div id="close-button1"></div> -->
        </div>

        <div id="game-body">

            <!-- ゲーム画面１ -->
            <div id="game-view1">
                <div id="game-title">ボカロ曲名</div>

                {{-- 言語とレベルを選択してゲームスタート --}}
                <form action="{{ route('game') }}" method="get">
                    {{-- 言語の選択 --}}
                    <select id="language-select" name="param">
                        <option value=""selected>選択してください</option>
                        <option value="1">HTML</option>
                        <option value="2">CSS</option>
                        <option value="3">JavaScript</option>
                        <option value="4">PHP</option>
                        <!-- 他の言語のオプションを追加 -->
                    </select>

                    {{-- レベルの選択 --}}
                    <select id="level-select" name="param">
                        <option value=""selected>選択してください</option>
                        <option value="1">初級</option>
                        <option value="2">中級</option>
                        <!-- 他のレベルのオプションを追加 -->
                    </select>
                    <input type="submit" value="言語・レベル決定ボタン">
                </form>
                {{-- スタートボタン --}}
                <div id="game-explain"></div>
                <button id="start-button" type="button">スタート</button>

                <div id="game-func">
                    <span>ローマ字表示(R)</span>
                    <div class="switch-btn">
                        <button class="on-btn btn show" type="button">ON</button>
                        <button class="off-btn btn" type="button">OFF</button>
                    </div>
                    <span>かな表示(K)</span>
                    <div class="switch-btn">
                        <button class="on-btn btn show" type="button">ON</button>
                        <button class="off-btn btn" type="button">OFF</button>
                    </div>
                    <span>キーガイド(G)</span>
                    <div class="switch-btn">
                        <button class="on-btn btn show" type="button">ON</button>
                        <button class="off-btn btn" type="button">OFF</button>
                    </div>
                    <span>WPM表示(W)</span>
                    <div class="switch-btn">
                        <button class="on-btn btn show" type="button">ON</button>
                        <button class="off-btn btn" type="button">OFF</button>
                    </div>
                    <span>スピードバー(S)</span>
                    <div class="switch-btn">
                        <button class="on-btn btn show" type="button">ON</button>
                        <button class="off-btn btn" type="button">OFF</button>
                    </div>
                </div>
            </div>

            <!-- ゲーム画面２ -->
            <div id="game-view2">
                <div id="text-container">
                    <div id="miss-type-screen"></div>
                    <div id="start-msg">
                        <p>日本語入力モードをオフにしてください</p>
                        <p><em>スペースキーで開始</em></p>
                        <p>（終了はEscキーです）</p>
                    </div>
                    <div id="example"></div>
                    <div id="kana"></div>
                    <div id="sentence"></div>
                    <div id="progress-bar"></div>
                    <div id="current-wpm"></div>
                    <div id="speed-bar">
                        <div class="cover"></div>
                    </div>
                </div>
                <div id="virtual-keyboard">
                    <div class="deco_key1"></div>
                    <div class="key_1">1</div>
                    <div class="key_2">2</div>
                    <div class="key_3">3</div>
                    <div class="key_4">4</div>
                    <div class="key_5">5</div>
                    <div class="key_6">6</div>
                    <div class="key_7">7</div>
                    <div class="key_8">8</div>
                    <div class="key_9">9</div>
                    <div class="key_0">0</div>
                    <div class="key_hyphen">-</div>
                    <div class="deco_key2"></div>
                    <div class="deco_key3"></div>
                    <div class="deco_key4"></div>
                    <div class="deco_key5"></div>
                    <div class="key_q">Q</div>
                    <div class="key_w">W</div>
                    <div class="key_e">E</div>
                    <div class="key_r">R</div>
                    <div class="key_t">T</div>
                    <div class="key_y">Y</div>
                    <div class="key_u">U</div>
                    <div class="key_i">I</div>
                    <div class="key_o">O</div>
                    <div class="key_p">P</div>
                    <div class="key_atmark">@</div>
                    <div class="deco_key6"></div>
                    <div class="key_Enter"></div>
                    <div class="deco_key7"></div>
                    <div class="key_a">A</div>
                    <div class="key_s">S</div>
                    <div class="key_d">D</div>
                    <div class="key_f">F</div>
                    <div class="key_g">G</div>
                    <div class="key_h">H</div>
                    <div class="key_j">J</div>
                    <div class="key_k">K</div>
                    <div class="key_l">L</div>
                    <div class="key_semicolon">;</div>
                    <div class="key_colon">:</div>
                    <div class="deco_key8"></div>
                    <div class="key_lShift">shift</div>
                    <div class="key_z">Z</div>
                    <div class="key_x">X</div>
                    <div class="key_c">C</div>
                    <div class="key_v">V</div>
                    <div class="key_b">B</div>
                    <div class="key_n">N</div>
                    <div class="key_m">M</div>
                    <div class="key_comma">,</div>
                    <div class="key_period">.</div>
                    <div class="key_slash">/</div>
                    <div class="deco_key9"></div>
                    <div class="key_rShift">shift</div>
                    <div class="deco_key10"></div>
                    <div class="deco_key11"></div>
                    <div class="deco_key12"></div>
                    <div class="deco_key13"></div>
                    <div class="key_space">space</div>
                    <div class="deco_key14"></div>
                    <div class="deco_key15"></div>
                    <div class="deco_key16"></div>
                    <div class="deco_key17"></div>
                    <div class="deco_key18"></div>
                </div>
            </div>

            <!-- ゲーム後結果画面 -->
            <div id="game-result">
                <div id="current-result">
                    <div class="result-title">今回のタイピング結果</div>
                    <div id="example-list"></div>
                    <div class="result-data"></div>
                </div>
                <div id="prev-result">
                    <div class="result-title">前回の結果</div>
                    <div class="result-data"></div>
                </div>
                <div id="result-comment">
                    <div class="container">---</div>
                </div>
                <div id="btn-area">
                    <button id="replay-button" class="btn" type="button">もう1回</button>
                    <!-- <button id="close-button2" class="btn" type="button">閉じる</button> -->
                </div>
            </div>
        </div>
    </div>
    <table>
        <tr>
            <th>種別ID</th>
            <th>言語種別ID</th>
            <th>英単語(スペル)</th>
            <th>日本語発音(ルビ)</th>
            <th>英語発音記号</th>
            <th>意味(プログラミング言語)</th>
            <th>意味(日本語)</th>
            <th>使用例</th>
            <th>難易度ID</th>
        </tr>
        @php
            $json_array = json_encode(NULL);
        @endphp
        @foreach($items as $item)
            @if(isset($_GET['param']))
                {{-- 言語別・レベルに絞り込まれた場合 --}}
                @if($item->language_id == $_GET['param'] && $item->level_id == $_GET['param'])
                    <tr>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->language_id }}</th>
                        <th>{{ $item->word_spell }}</th>
                        <th>{{ $item->japanese }}</th>
                        <th>{{ $item->pronunciation }}</th>
                        <th>{{ $item->meaning }}</th>
                        <th>{{ $item->notion }}</th>
                        <th>{{ $item->usage }}</th>
                        <th>{{ $item->level_id }}</th>
                    </tr>
                    @php
                        $json_array = json_encode($item->word_spell);
                    @endphp
                @elseif($item->language_id == $_GET['param'])
                {{-- 言語だけが選択された場合はレベルのデフォルト(初級)を取得する --}}
                    @if($item->level_id == 1)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->language_id }}</th>
                            <th>{{ $item->word_spell }}</th>
                            <th>{{ $item->japanese }}</th>
                            <th>{{ $item->pronunciation }}</th>
                            <th>{{ $item->meaning }}</th>
                            <th>{{ $item->notion }}</th>
                            <th>{{ $item->usage }}</th>
                            <th>{{ $item->level_id }}</th>
                        </tr>
                        @php
                            $json_array = json_encode($item->word_spell);
                        @endphp
                    @endif
                @elseif($item->language_id == $_GET['param'])
                {{-- 難易度だけが選択された場合は言語のデフォルト(HTML)を取得する --}}
                    @if($item->language_id == 1)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->language_id }}</th>
                            <th>{{ $item->word_spell }}</th>
                            <th>{{ $item->japanese }}</th>
                            <th>{{ $item->pronunciation }}</th>
                            <th>{{ $item->meaning }}</th>
                            <th>{{ $item->notion }}</th>
                            <th>{{ $item->usage }}</th>
                            <th>{{ $item->level_id }}</th>
                        </tr>
                        @php
                            $json_array = json_encode($item->word_spell);
                        @endphp
                    @endif
                @endif
            @else
                {{-- 選択されていなければデフォルトでHTMLを表示する --}}
                {{-- 1:HTML --}}
                @if($item->language_id == 1)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->language_id }}</th>
                        <th>{{ $item->word_spell }}</th>
                        <th>{{ $item->japanese }}</th>
                        <th>{{ $item->pronunciation }}</th>
                        <th>{{ $item->meaning }}</th>
                        <th>{{ $item->notion }}</th>
                        <th>{{ $item->usage }}</th>
                        <th>{{ $item->level_id }}</th>
                    </tr>
                    @php
                        $json_array = json_encode($item->word_spell);
                    @endphp
                @endif
            @endif
        @endforeach
    </table>
    <div>
        <p>結果を表示させる</p>
    </div>
@endsection
@section('myjs')
    {{-- ゲーム用js --}}
    {{-- jsファイルに分けると<はてなphp ?>が書けないので直接ここにタイピングゲームのコードを書く --}}
    {{-- <script src="assets/js/typing.js"></script> --}}

    <script>
        window.addEventListener('DOMContentLoaded', () => {
        (function (window, document) {
            const overlay = document.createElement('div');
            overlay.id = 'game-overlay';
            const game = document.getElementById('game-screen'); // ゲームスクリーン描画
            const button3 = document.getElementById('start-button'); // 『スタート』ボタンクリック時
            const button4 = document.getElementById('replay-button'); // 『もう１回』ボタンクリック時
            const view1 = document.getElementById('game-view1');
            const gameFunc = document.getElementById('game-func');
            const onBtns = gameFunc.querySelectorAll('.on-btn');
            const offBtns = gameFunc.querySelectorAll('.off-btn');
            const view2 = document.getElementById('game-view2');
            const result = document.getElementById('game-result');
            const mScreen = document.getElementById('miss-type-screen');
            const startMsg = document.getElementById('start-msg');
            const example = document.getElementById('example');
            const kana = document.getElementById('kana');
            const sentence = document.getElementById('sentence');
            const progress = document.getElementById('progress-bar');
            const keyboard = document.getElementById('virtual-keyboard');
            const space = keyboard.querySelector('.key_space');


            let wordJP1 = <?php echo $json_array; ?>; // 表示文章
            let wordJP2 = <?php echo $json_array; ?>; // ひらがな文章

            let wordRs; // ローマ字データ1
            let wordR; // ローマ字データ2
            let record; // タイプした文章の記録
            let recordHTML;
            let recordM = []; // ミスした文章のインデックス
            let weakKeys; // 苦手キー格納用
            let gameData = []; // タイピング結果
            let backup1 = [];
            let backup2 = [];
            let isFirst = true;
            let isOpen = true;
            let startFlag = false;
            let sWait = false;
            let playing = false;
            let nFlag = false;
            let missFlag = false;
            let isStopped = false;
            let moPlay = false;
            let maxNum = 10; // 出題数の上限
            let random = true; // ランダム出題
            let resCmt = true; // 結果画面のコメント
            let flagR = true; // ローマ字表示
            let flagK = true; // かな表示
            let flagG = true; // キーガイド
            let flagW = true; // リアルタイムのWPM
            let flagS = true; // スピードバー
            let flags = [flagR, flagK, flagG, flagW, flagS];
            let ridx, limit, begin, count, idx1, idx2, pattern, temp, correct, miss;
            let over1, over2, over3, left1, left2, left3;

            // スタート処理
            function start() {
                view1.style.display = 'none';
                view2.style.display = 'block';
                startMsg.style.display = 'block';

                startFlag = true;
                sWait = true;
                space.classList.add('active');

                flagR = flags[0];
                flagK = flags[1];
                flagG = flags[2];
                flagW = flags[3];
                flagS = flags[4];
                flags = [flagR, flagK, flagG, flagW, flagS];
                localStorage.setItem('flags', JSON.stringify(flags));
            }

            // カウントダウン処理
            function ready() {
                startMsg.style.display = 'none';
                const count = document.createElement('div');
                count.id = 'countdown';
                startMsg.after(count);
                let readyTime = 3;
                count.innerHTML = readyTime;
                const readyTimer = setInterval(() => {
                    readyTime--;
                    if (readyTime == 0) {
                        clearInterval(readyTimer);
                        count.remove();
                        gameInit();
                    }
                    count.innerHTML = readyTime;
                }, 1000);
            }

            // ゲーム開始処理
            function gameInit() {
                count = 0;
                idx1 = 0;
                idx2 = 0;
                temp = '';
                correct = 0;
                miss = 0;
                ridx = [];
                record = [];
                recordHTML = '';
                weakKeys = [];
                nFlag = false;
                missFlag = false;

                // 『ミスだけ』を選択した場合
                if (moPlay) {
                    let missJP1 = [];
                    let missJP2 = [];
                    for (let i = 0; i < recordM.length; i++) {
                        missJP1.push(wordJP1[recordM[i]]);
                        missJP2.push(wordJP2[recordM[i]]);
                    }
                    if (backup1.length == 0) {
                        backup1 = [...wordJP1];
                        backup2 = [...wordJP2];
                    }
                    wordJP1 = missJP1;
                    wordJP2 = missJP2;
                } else {
                    if (backup1.length > 0) {
                        wordJP1 = [...backup1];
                        wordJP2 = [...backup2];
                        backup1 = [];
                        backup2 = [];
                    }
                }
                recordM = []; //recordMはミスした文章を記憶している

                let idx;
                let a = [...Array(wordJP2.length).keys()];
                if (random) {
                    while (a.length > 0) {
                        idx = Math.floor(Math.random() * a.length);
                        ridx.push(a[idx]);
                        a.splice(idx, 1);
                    }
                } else {
                    ridx = a;
                }

                wordRs = [];
                for (let i = 0; i < wordJP2.length; i++) {
                    wordRs.push(kanaToRoman(wordJP2[i]));
                }
                limit = (maxNum < wordJP2.length) ? maxNum : wordJP2.length;
                playing = true;
                begin = new Date();
                wordSet();

                let style = '';
                if (!flagR) {
                    style += '#sentence span:not(.typed) {opacity: 0;}';
                }
                if (!flagK) {
                    style += '#kana > div {opacity: 0;}';
                }
                document.getElementById('custom-css').innerHTML = style;

                if (flagW) {
                    const cWPM = document.getElementById('current-wpm');
                    cWPM.style.display = 'block';
                    cWPM.innerHTML = 'WPM: 0.00';
                    const id = setInterval(() => {
                        let time = new Date() - begin;
                        let speed = correct / time * 60 * 1000;
                        if (playing) {
                            cWPM.innerHTML = 'WPM: ' + speed.toFixed(2);
                        } else {
                            clearInterval(id);
                            cWPM.innerHTML = '';
                            cWPM.style.display = 'none';
                        }
                    }, 100);
                }

                if (flagS) {
                    const speedBar = document.getElementById('speed-bar');
                    const cover = speedBar.querySelector('.cover');
                    speedBar.style.display = 'block';
                    cover.style.transform = 'none';
                    const id = setInterval(() => {
                        let time = new Date() - begin;
                        let speed = correct / time * 60 * 1000;
                        if (playing) {
                            let scale = 1 - speed / 700;
                            cover.style.transform = 'scaleX(' + scale + ')';
                        } else {
                            clearInterval(id);
                            cover.style.transform = 'none';
                            speedBar.style.display = 'none';
                        }
                    }, 100);
                }
            }

            // タイピング文章セット
            function wordSet() {
                if (count == limit) {
                    finish();
                } else {
                    example.innerHTML = '<div>' + wordJP1[ridx[count]] + '</div>';
                    kana.innerHTML = '<div>' + wordJP2[ridx[count]] + '</div>';
                    wordR = wordRs[ridx[count]];
                    let html;
                    html = '<div><span class="typed"></span><span>';
                    for (let i = 0; i < wordR.length; i++) {
                        html += wordR[i][0];
                    }
                    html += '</span></div>';
                    sentence.innerHTML = html;
                    pattern = new Array(wordR.length).fill(0);
                    if (count > 0) {
                        progress.style.transform = 'scaleX(' + (1 - count / limit) + ')';
                    }
                    count++;
                    selActive();
                }
            }

            // ゲーム終了
            function finish() {
                let time = new Date() - begin;
                playing = false;

                const active = keyboard.querySelector('.active');
                if (active) active.classList.remove('active');

                view2.style.display = 'none';
                result.style.display = 'block';
                example.innerHTML = '';
                kana.innerHTML = '';
                sentence.innerHTML = '';
                progress.style.transform = 'none';

                const resList = document.getElementById('example-list');
                const resData = result.querySelectorAll('.result-data');

                let speed, accuracy, score;
                speed = correct / time * 60 * 1000;
                accuracy = correct / (correct + miss);
                score = isStopped ? '-' : Math.floor(speed * accuracy ** 3);

                // scoreをデータベースに登録したい
                // AJAXリクエストを送信してデータを登録
                fetch('/typinggame', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRFトークンを取得（LaravelのBladeテンプレート内で使用する場合）
                },
                body: JSON.stringify({ score: score }), // scoreをJSON形式に変換して送信
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data); // データベースに登録された結果などのレスポンスを表示（必要に応じて）
                })
                .catch(error => console.error('データの登録に失敗しました:', error));

                let html;
                html = '<ul>';
                for (let i = 0; i < limit; i++) {
                    html += '<li>';
                    html += '<div class="example">' + wordJP1[ridx[i]] + '</div>';
                    html += '<div class="sentence">';
                    wordR = wordRs[ridx[i]];
                    if (isStopped) {
                        if (record[i]) {
                            html += record[i];
                        } else {
                            if (!!recordHTML) {
                                html += recordHTML;
                                recordHTML = '';
                                if (missFlag) {
                                    weakKeys.push(wordR[idx1][pattern[idx1]][idx2]);
                                    html += '<span class="miss">' + wordR[idx1][pattern[idx1]][idx2] + '</span>';
                                    missFlag = false;
                                } else {
                                    html += wordR[idx1][pattern[idx1]][idx2];
                                }
                                for (let j = idx2 + 1; j < wordR[idx1][pattern[idx1]].length; j++) {
                                    html += wordR[idx1][pattern[idx1]][j];
                                }
                                for (let j = idx1 + 1; j < wordR.length; j++) {
                                    html += wordR[j][0];
                                }
                            } else {
                                if (missFlag) {
                                    weakKeys.push(wordR[0][0][0]);
                                    html += '<span class="miss">' + wordR[0][0][0] + '</span>';
                                    for (let j = 1; j < wordR[0][0].length; j++) {
                                        html += wordR[0][0][j];
                                    }
                                    for (let j = 1; j < wordR.length; j++) {
                                        html += wordR[j][0];
                                    }
                                    missFlag = false;
                                } else {
                                    for (let j = 0; j < wordR.length; j++) {
                                        html += wordR[j][0];
                                    }
                                }
                            }
                        }
                    } else {
                        html += record[i];
                    }
                    html += '</div></li>';
                }
                html += '</ul>';
                resList.innerHTML = html;

                if (gameData.length > 0) {
                    html = '<ul>'
                    html += '<li><div class="data">' + gameData[0] + '</div></li>';
                    html += '<li><div class="data">' + gameData[1] + '</div></li>';
                    html += '<li><div class="data">' + gameData[2] + '</div></li>';
                    html += '<li><div class="data">' + gameData[3] + '</div></li>';
                    html += '<li><div class="data">' + gameData[4] + '</div></li>';
                    html += '<li><div class="data">' + gameData[5] + '</div></li>';
                    html += '<li><div class="data">' + gameData[6] + '</div></li>';
                    html += '<li><div class="data">' + gameData[7] + '</div></li>';
                    html += '</ul>';
                } else {
                    html = '<ul>'
                    html += '<li><div class="data">-</div></li>';
                    html += '<li><div class="data">-</div></li>';
                    html += '<li><div class="data">-</div></li>';
                    html += '<li><div class="data">-</div></li>';
                    html += '<li><div class="data">-</div></li>';
                    html += '<li><div class="data">-</div></li>';
                    html += '<li><div class="data">-</div></li>';
                    html += '<li><div class="data">-</div></li>';
                    html += '</ul>';
                }
                resData[1].innerHTML = html;

                html = '<ul>';
                html += '<li><div class="title">スコア</div><div class="data">' + score + '</div></li>';
                html += '<li><div class="title">レベル</div><div class="data">' + getLevel(score) + '</div></li>';
                html += '<li><div class="title">入力時間</div><div class="data">' + convTime(time) + '</div></li>';
                html += '<li><div class="title">入力文字数</div><div class="data">' + correct + '</div></li>';
                html += '<li><div class="title">ミス入力数</div><div class="data">' + miss + '</div></li>';
                html += '<li><div class="title">WPM</div><div class="data">' + convStr(speed.toFixed(2)) + '</div></li>';
                html += '<li><div class="title">正確率</div><div class="data">' + convStr((accuracy * 100).toFixed(2)) + '%</div></li>';
                html += '<li><div class="title">苦手キー</div><div class="data">' + getWeaks(weakKeys) + '</div></li>';
                html += '</ul>';
                resData[0].innerHTML = html;
                gameData = [score, getLevel(score), convTime(time), correct, miss, convStr(speed.toFixed(2)), convStr((accuracy * 100).toFixed(2)) + '%', getWeaks(weakKeys)];

                if (resCmt) {
                    const resComment = document.getElementById('result-comment');
                    const container = resComment.querySelector('.container');
                    const comment1 = 'ノーミス達成！おめでとうございます。';
                    const comment2 = '惜しい！あと1文字。次はミス0を狙いましょう。';
                    const comments = ['日々の練習が結果に繋がります。', '速さよりも正確性のほうがスコアに響きます。'];
                    if (!isStopped) {
                        if (miss == 0) {
                            container.innerHTML = comment1;
                        } else if (miss == 1) {
                            container.innerHTML = comment2;
                        } else {
                            let idx = Math.floor(Math.random() * comments.length);
                            container.innerHTML = comments[idx];
                        }
                    } else {
                        container.innerHTML = '---';
                    }
                }

                isStopped = false;

                const moBtn = document.getElementById('miss-only-button');
                if (recordM.length > 0) {
                    if (!moBtn) {
                        const button6 = document.createElement('button');
                        button6.type = 'button';
                        button6.id = 'miss-only-button';
                        button6.classList.add('btn');
                        button6.innerHTML = 'ミスだけ';
                        button6.addEventListener('click', () => {
                            moPlay = true;
                            sWait = true;
                            result.style.display = 'none';
                            view2.style.display = 'block';
                            startMsg.style.display = 'block';
                            space.classList.add('active');
                        });
                        const btnArea = document.getElementById('btn-area');
                        btnArea.appendChild(button6);
                    }
                } else {
                    if (moBtn) {
                        moPlay = false;
                        moBtn.remove();
                    }
                }
            }

            // かな->ローマ変換
            function kanaToRoman(kana) {
                const romanMap = {
                    'あ': ['a'], 'い': ['i', 'yi'], 'う': ['u', 'wu'], 'え': ['e'], 'お': ['o'],
                    'か': ['ka', 'ca'], 'き': ['ki'], 'く': ['ku', 'cu', 'qu'], 'け': ['ke'], 'こ': ['ko', 'co'],
                    'さ': ['sa'], 'し': ['si', 'shi', 'ci'], 'す': ['su'], 'せ': ['se', 'ce'], 'そ': ['so'],
                    'た': ['ta'], 'ち': ['ti', 'chi'], 'つ': ['tu', 'tsu'], 'て': ['te'], 'と': ['to'],
                    'な': ['na'], 'に': ['ni'], 'ぬ': ['nu'], 'ね': ['ne'], 'の': ['no'],
                    'は': ['ha'], 'ひ': ['hi'], 'ふ': ['fu', 'hu'], 'へ': ['he'], 'ほ': ['ho'],
                    'ま': ['ma'], 'み': ['mi'], 'む': ['mu'], 'め': ['me'], 'も': ['mo'],
                    'や': ['ya'], 'ゆ': ['yu'], 'よ': ['yo'],
                    'ら': ['ra'], 'り': ['ri'], 'る': ['ru'], 'れ': ['re'], 'ろ': ['ro'],
                    'わ': ['wa'], 'ゐ': ['wyi'], 'ゑ': ['wye'], 'を': ['wo'], 'ん': ['nn', 'xn', 'n'],
                    'が': ['ga'], 'ぎ': ['gi'], 'ぐ': ['gu'], 'げ': ['ge'], 'ご': ['go'],
                    'ざ': ['za'], 'じ': ['ji', 'zi'], 'ず': ['zu'], 'ぜ': ['ze'], 'ぞ': ['zo'],
                    'だ': ['da'], 'ぢ': ['di'], 'づ': ['du'], 'で': ['de'], 'ど': ['do'],
                    'ば': ['ba'], 'び': ['bi'], 'ぶ': ['bu'], 'べ': ['be'], 'ぼ': ['bo'],
                    'ぱ': ['pa'], 'ぴ': ['pi'], 'ぷ': ['pu'], 'ぺ': ['pe'], 'ぽ': ['po'],
                    'うぁ': ['wha'], 'うぃ': ['whi'], 'うぇ': ['whe'], 'うぉ': ['who'],
                    'きゃ': ['kya'], 'きぃ': ['kyi'], 'きゅ': ['kyu'], 'きぇ': ['kye'], 'きょ': ['kyo'],
                    'くぁ': ['qa', 'qwa'], 'くぃ': ['qi', 'qwi'], 'くぇ': ['qe', 'qwe'], 'くぉ': ['qo', 'qwo'], 'くゃ': ['qya'], 'くゅ': ['qyu'], 'くょ': ['qyo'],
                    'しゃ': ['sya', 'sha'], 'しぃ': ['syi'], 'しゅ': ['syu', 'shu'], 'しぇ': ['sye', 'she'], 'しょ': ['syo', 'sho'],
                    'つぁ': ['tsa'], 'つぃ': ['tsi'], 'つぇ': ['tse'], 'つぉ': ['tso'],
                    'ちゃ': ['tya', 'cha'], 'ちぃ': ['tyi'], 'ちゅ': ['tyu', 'chu'], 'ちぇ': ['tye', 'che'], 'ちょ': ['tyo', 'cho'],
                    'てゃ': ['tha'], 'てぃ': ['thi'], 'てゅ': ['thu'], 'てぇ': ['the'], 'てょ': ['tho'],
                    'とぁ': ['twa'], 'とぃ': ['twi'], 'とぅ': ['twu'], 'とぇ': ['twe'], 'とぉ': ['two'],
                    'ひゃ': ['hya'], 'ひぃ': ['hyi'], 'ひゅ': ['hyu'], 'ひぇ': ['hye'], 'ひょ': ['hyo'],
                    'ふぁ': ['fa'], 'ふぃ': ['fi'], 'ふぇ': ['fe'], 'ふぉ': ['fo'],
                    'にゃ': ['nya'], 'にぃ': ['nyi'], 'にゅ': ['nyu'], 'にぇ': ['nye'], 'にょ': ['nyo'],
                    'みゃ': ['mya'], 'みぃ': ['myi'], 'みゅ': ['myu'], 'みぇ': ['mye'], 'みょ': ['myo'],
                    'りゃ': ['rya'], 'りぃ': ['ryi'], 'りゅ': ['ryu'], 'りぇ': ['rye'], 'りょ': ['ryo'],
                    'ヴぁ': ['va'], 'ヴぃ': ['vi'], 'ヴ': ['vu'], 'ヴぇ': ['ve'], 'ヴぉ': ['vo'],
                    'ぎゃ': ['gya'], 'ぎぃ': ['gyi'], 'ぎゅ': ['gyu'], 'ぎぇ': ['gye'], 'ぎょ': ['gyo'],
                    'ぐぁ': ['gwa'], 'ぐぃ': ['gwi'], 'ぐぅ': ['gwu'], 'ぐぇ': ['gwe'], 'ぐぉ': ['gwo'],
                    'じゃ': ['ja', 'zya'], 'じぃ': ['jyi', 'zyi'], 'じゅ': ['ju', 'zyu'], 'じぇ': ['je', 'zye'], 'じょ': ['jo', 'zyo'],
                    'でゃ': ['dha'], 'でぃ': ['dhi'], 'でゅ': ['dhu'], 'でぇ': ['dhe'], 'でょ': ['dho'],
                    'ぢゃ': ['dya'], 'ぢぃ': ['dyi'], 'ぢゅ': ['dyu'], 'ぢぇ': ['dye'], 'ぢょ': ['dyo'],
                    'びゃ': ['bya'], 'びぃ': ['byi'], 'びゅ': ['byu'], 'びぇ': ['bye'], 'びょ': ['byo'],
                    'ぴゃ': ['pya'], 'ぴぃ': ['pyi'], 'ぴゅ': ['pyu'], 'ぴぇ': ['pye'], 'ぴょ': ['pyo'],
                    'ぁ': ['la', 'xa'], 'ぃ': ['li', 'xi'], 'ぅ': ['lu', 'xu'], 'ぇ': ['le', 'xe'], 'ぉ': ['lo', 'xo'],
                    'ゃ': ['lya', 'xya'], 'ゅ': ['lyu', 'xyu'], 'ょ': ['lyo', 'xyo'], 'っ': ['ltu', 'xtu'],
                    'ー': ['-'], ',': [','], '.': ['.'], '、': [','], '。': ['.'],
                    '・': ['/'], '、': [','], '。': ['.'], '・': ['/']
                };

                let remStr = String(kana), slStr, roman, next;
                let result = [];

                function splice() {
                    let oneChar = remStr.slice(0, 1);
                    remStr = remStr.slice(1);
                    return oneChar;
                }

                function isSmallChar() {
                    return !!remStr.slice(0, 1).match(/^[ぁぃぅぇぉゃゅょ]$/);
                }

                while (remStr) {
                    slStr = splice();
                    next = romanMap[remStr.slice(0, 1)];
                    if (slStr == 'っ') {
                        if (!remStr || remStr.match(/^[,.]/) || !next || next[0].match(/^[aiueon]/)) {
                            roman = [...romanMap[slStr]];
                            result.push(roman);
                        } else {
                            slStr = splice();
                            if (isSmallChar()) slStr += splice();
                            roman = [...romanMap[slStr].map(str => str.slice(0, 1) + str)];
                            result.push(roman);
                        }
                    } else {
                        if (isSmallChar()) slStr += splice();
                        if (slStr == '&') {
                            slStr += remStr.slice(0, 7);
                            remStr = remStr.slice(7);
                        }
                        roman = romanMap[slStr] ? [...romanMap[slStr]] : [...slStr];
                        if (slStr == 'ん') {
                            if (!remStr) {
                                roman.pop();
                            } else {
                                if (next[0].match(/^[aiueony]/)) roman.pop();
                            }
                        }
                        result.push(roman);
                    }
                }

                return result;
            }

            // 打った部分の色付け
            function colorTyped() {
                let html = '<div><span class="typed">';
                if (idx1 > 0) {
                    for (let i = 0; i < idx1; i++) {
                        html += wordR[i][pattern[i]];
                    }
                }
                for (let i = 0; i <= idx2; i++) {
                    html += wordR[idx1][pattern[idx1]][i];
                }
                html += '</span><span>';
                for (let i = idx2 + 1; i < wordR[idx1][pattern[idx1]].length; i++) {
                    html += wordR[idx1][pattern[idx1]][i];
                }
                for (let i = idx1 + 1; i < wordR.length; i++) {
                    html += wordR[i][pattern[i]];
                }
                html += '</span></div>';
                return html;
            }

            // テキスト移動処理
            function textMove() {
                const textS = document.querySelector('#sentence > div');
                const textE = document.querySelector('#example > div');
                const textK = document.querySelector('#kana > div');
                const textS1 = textS.querySelector('.typed');
                const textS2 = textS.querySelector('span:not(.typed)');
                let remLen = textS2.innerText.length;
                if (idx1 == 0) {
                    over1 = textS.clientWidth - 580;
                    over2 = textE.clientWidth - 580;
                    over3 = textK.clientWidth - 580;
                    left1 = 0, left2 = 0, left3 = 0;
                }
                if (textS.clientWidth > 580) {
                    if (textS1.getBoundingClientRect().width > 310) {
                        let move1 = textS2.getBoundingClientRect().width / remLen;
                        left1 += move1;
                        textS.style.left = -left1 + 'px';
                    }
                }
                if (textE.clientWidth > 580) {
                    let move2 = over2 / remLen;
                    left2 += move2;
                    textE.style.left = -left2 + 'px';
                    over2 -= move2;
                }
                if (textK.clientWidth > 580) {
                    let move3 = over3 / remLen;
                    left3 += move3;
                    textK.style.left = -left3 + 'px';
                    over3 -= move3;
                }
            }

            // ミス入力処理
            function missed() {
                miss++;
                if (recordM.indexOf(ridx[count - 1]) == -1) {
                    recordM.push(ridx[count - 1]);
                }
                mScreen.classList.add('missed');
                setTimeout(() => {
                    mScreen.classList.remove('missed');
                }, 200);
            }

            // アクティブキー処理
            function selActive() {
                const prevActive = keyboard.querySelector('.active');
                const selector = '.key_' + keyConvert(wordR[idx1][pattern[idx1]][idx2]);
                const target = keyboard.querySelector(selector);
                if (prevActive) {
                    prevActive.classList.remove('active');
                }
                if (target && flagG) {
                    target.classList.add('active');
                }
            }

            // 対応キーの変換
            function keyConvert(key) {
                const keyMap = {
                    '-': 'hyphen', '@': 'atmark', ';': 'semicolon', ':': 'colon', ',': 'comma',
                    '.': 'period', '/': 'slash', ' ': 'space'
                }

                if (keyMap[key]) {
                    return keyMap[key];
                } else {
                    return key;
                }
            }

            // タイピングレベル判定
            function getLevel(score) {
                let level;
                if (score == '-') {
                    level = '-';
                } else {
                    switch (true) {
                        case 0 <= score && score <= 21:
                            level = 'E-';
                            break;
                        case 21 < score && score <= 38:
                            level = 'E';
                            break;
                        case 38 < score && score <= 55:
                            level = 'E+';
                            break;
                        case 55 < score && score <= 72:
                            level = 'D-';
                            break;
                        case 72 < score && score <= 89:
                            level = 'D';
                            break;
                        case 89 < score && score <= 106:
                            level = 'D+';
                            break;
                        case 106 < score && score <= 123:
                            level = 'C-';
                            break;
                        case 123 < score && score <= 140:
                            level = 'C';
                            break;
                        case 140 < score && score <= 157:
                            level = 'C+';
                            break;
                        case 157 < score && score <= 174:
                            level = 'B-';
                            break;
                        case 174 < score && score <= 191:
                            level = 'B';
                            break;
                        case 191 < score && score <= 208:
                            level = 'B+';
                            break;
                        case 208 < score && score <= 225:
                            level = 'A-';
                            break;
                        case 225 < score && score <= 242:
                            level = 'A';
                            break;
                        case 242 < score && score <= 259:
                            level = 'A+';
                            break;
                        case 259 < score && score <= 276:
                            level = 'S';
                            break;
                        case 276 < score && score <= 299:
                            level = 'Good!';
                            break;
                        case 299 < score && score <= 324:
                            level = 'Fast';
                            break;
                        case 324 < score && score <= 349:
                            level = 'Thunder';
                            break;
                        case 349 < score && score <= 374:
                            level = 'Ninja';
                            break;
                        case 374 < score && score <= 399:
                            level = 'Comet';
                            break;
                        case 399 < score && score <= 449:
                            level = 'Professor';
                            break;
                        case 449 < score && score <= 499:
                            level = 'LaserBeam';
                            break;
                        case 499 < score && score <= 549:
                            level = 'EddieVH';
                            break;
                        case 549 < score && score <= 599:
                            level = 'Meijin';
                            break;
                        case 599 < score && score <= 649:
                            level = 'Rocket';
                            break;
                        case 649 < score && score <= 699:
                            level = 'Tatsujin';
                            break;
                        case 699 < score && score <= 749:
                            level = 'Jedi';
                            break;
                        case 749 < score && score <= 799:
                            level = 'Godhand';
                            break;
                        case 799 < score:
                            level = 'Joker';
                            break;
                    }
                }
                return level;
            }

            // 苦手キー上位5個を取得
            function getWeaks(keys) {
                let keyData1 = {};
                keys.forEach((key) => {
                    if (keyData1[key] != undefined) {
                        keyData1[key] += 1;
                    } else {
                        keyData1[key] = 1;
                    }
                });
                let keyData2 = Object.keys(keyData1).map(k => ({ key: k, miss: keyData1[k] }));
                keyData2.sort((a, b) => b.miss - a.miss);

                let res = '';
                let max = (keyData2.length < 5) ? keyData2.length : 5;
                for (let i = 0; i < max; i++) {
                    if (i != max - 1) {
                        res += keyData2[i].key + ' ';
                    } else {
                        res += keyData2[i].key;
                    }
                }
                return res;
            }

            // 入力時間の変換
            function convTime(time) {
                let m, ms, s, res;
                if (time >= 60000) {
                    m = Math.floor(time / 60000);
                    ms = time - m * 60000;
                    s = (ms / 1000).toFixed(2);
                    res = m + '分' + s.slice(0, -3) + '秒' + s.slice(-2);
                } else {
                    s = (time / 1000).toFixed(2);
                    res = s.slice(0, -3) + '秒' + s.slice(-2);
                }
                return res;
            }

            // 文字列データの変換
            function convStr(str) {
                let res;
                if (str == 'NaN') {
                    res = '0';
                } else {
                    if (str.slice(-2) == '00') {
                        res = str.slice(0, -3);
                    } else {
                        res = str;
                    }
                }
                return res;
            }

            // スイッチ処理
            function toggle(idx, flag) {
                if (flag) {
                    onBtns[idx].click();
                } else {
                    offBtns[idx].click();
                }
            }

            // リプレイ処理
            function replay() {
                moPlay = false; // 『ミスだけ』フラグなし
                result.style.display = 'none'; // 結果画面を非表示に
                view2.style.display = 'block'; // タイピング画面を表示
                startMsg.style.display = 'block'; // メッセージを再表示

                sWait = true; // 開始前のスペース入力待ちフラグ
                space.classList.add('active'); // スペースキーをactiveにする
            }

            window.addEventListener('DOMContentLoaded', open);//最初からゲーム画面を開きっぱなしにしておく
            button3.addEventListener('click', start);
            button4.addEventListener('click', replay);
            for (let i = 0; i < onBtns.length; i++) {
                onBtns[i].addEventListener('click', () => {
                    onBtns[i].classList.remove('show');
                    offBtns[i].classList.add('show');
                    flags[i] = false;
                });
            }
            for (let i = 0; i < offBtns.length; i++) {
                offBtns[i].addEventListener('click', () => {
                    offBtns[i].classList.remove('show');
                    onBtns[i].classList.add('show');
                    flags[i] = true;
                });
            }

            // キー押下時
            window.addEventListener('keydown', (event) => {
                let key = event.key;
                if (isOpen && !startFlag) {
                    if (key == ' ') event.preventDefault();
                    if (key == 'r') toggle(0, flags[0]);
                    if (key == 'k') toggle(1, flags[1]);
                    if (key == 'g') toggle(2, flags[2]);
                    if (key == 'w') toggle(3, flags[3]);
                    if (key == 's') toggle(4, flags[4]);
                }
                if (startFlag) { // ゲーム開始
                    if (key == ' ') event.preventDefault();
                    if (sWait) { // スペースキー入力待ちの場合
                        if (key == ' ') {
                            sWait = false;
                            space.classList.remove('active');
                            ready();
                        }
                    }
                    if (playing) { // プレイ中
                        if (key == 'Escape') { // Escを押した場合
                            isStopped = true;
                            finish();
                        } else {
                            temp += key;
                            if (key == wordR[idx1][pattern[idx1]][idx2]) {
                                sentence.innerHTML = colorTyped();
                                if (missFlag) {
                                    recordHTML += '<span class="miss">' + key + '</span>';
                                    weakKeys.push(key);
                                    missFlag = false;
                                } else {
                                    recordHTML += key;
                                }
                                textMove();
                                correct++;
                                idx2++;
                            } else {
                                let reg = new RegExp('^' + temp);
                                for (let i = 0; i < wordR[idx1].length; i++) {
                                    if (!!wordR[idx1][i].match(reg)) {
                                        pattern[idx1] = i;
                                        break;
                                    }
                                }
                                if (key == wordR[idx1][pattern[idx1]][idx2]) {
                                    sentence.innerHTML = colorTyped();
                                    if (missFlag) {
                                        recordHTML += '<span class="miss">' + key + '</span>';
                                        weakKeys.push(key);
                                        missFlag = false;
                                    } else {
                                        recordHTML += key;
                                    }
                                    textMove();
                                    correct++;
                                    idx2++;
                                } else {
                                    if (wordR[idx1][pattern[idx1]] == 'nn' && wordR[idx1].length == 3) { // 「ん」の特別措置
                                        for (let i = 0; i < wordR[idx1 + 1].length; i++) {
                                            if (key == wordR[idx1 + 1][i][0]) {
                                                pattern[idx1] = 2;
                                                pattern[idx1 + 1] = i;
                                                nFlag = true;
                                                correct++;
                                                break;
                                            }
                                        }
                                        if (!nFlag) {
                                            missFlag = true;
                                            temp = temp.slice(0, -1);
                                            missed();
                                        }
                                    } else {
                                        missFlag = true;
                                        temp = temp.slice(0, -1);
                                        missed();
                                    }
                                }
                            }
                            if (idx2 == wordR[idx1][pattern[idx1]].length) {
                                idx1++;
                                if (nFlag) {
                                    idx2 = 0;
                                    sentence.innerHTML = colorTyped();
                                    textMove();
                                    if (missFlag) {
                                        recordHTML += '<span class="miss">' + key + '</span>';
                                        weakKeys.push(key);
                                        missFlag = false;
                                    } else {
                                        recordHTML += key;
                                    }
                                    idx2 = 1;
                                    nFlag = false;
                                    temp = temp.slice(1);
                                } else {
                                    idx2 = 0;
                                    temp = '';
                                }
                            }
                            if (idx1 == wordR.length) {
                                record.push(recordHTML);
                                recordHTML = '';
                                idx1 = 0;
                                wordSet();
                            } else {
                                if (!missFlag) selActive();
                            }
                        }
                    }
                }
            });

            // リサイズ時
            window.addEventListener('resize', () => {
                if (isOpen) {
                    overlay.style.width = document.body.clientWidth + 'px';
                    overlay.style.height = document.body.clientHeight + 'px';
                    game.style.top = window.pageYOffset + window.innerHeight / 2 - game.clientHeight / 2 + 'px';
                    game.style.left = window.innerWidth / 2 - game.clientWidth / 2 + 'px';
                }
            });
        })(window, document);

    });

    </script>
@endsection
