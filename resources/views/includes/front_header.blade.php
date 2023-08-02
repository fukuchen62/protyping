<!-- ヘッダー -->
<header id="header" class="header">
    <div class="container">
        <!-- ヘッダーロゴ -->
        <h1 class="headerLogo">
            <a href="{{ route('top') }}"><img src="{{ asset('assets/images/logo.jpg') }}" alt="タイプコードLOGO"></a>
        </h1>
        <!-- ハンバーガーメニュー部分 -->
        <div class="hanmburger">
            <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
            <input id="drawerInput" class="drawerHidden" type="checkbox" />
            <!-- ハンバーガーメニュー -->
            <label for="drawerInput" class="drawerOpen">
                <span></span>
            </label>
            <!-- ナビゲーション -->
            <nav class="navContent">
                <ul class="navList">
                    <li class="game">
                        <a href="{{ route('game') }}">ゲーム</a>
                    </li>
                    <li class="dictionary">
                        <a href="{{ route('dictionary') }}">辞書</a><!-- リンク先はデフォルトを英単語にする -->
                    </li>
                    <li class="ranking">
                        <a href="{{ route('ranking') }}">ランキング</a>
                    </li>
                    <li class="myScore">
                        <a href="{{ route('myscore') }}">マイスコア</a>
                    </li>
                    <li class="shittoku">
                        <a href="{{ route('knowhow') }}">知っトク情報</a>
                    </li>
                    <li class="upDate">
                        <a href="{{ route('article') }}">更新情報</a>
                    </li>
                    </li>
                    <li class="about">
                        <a href="{{ route('about') }}">アバウト</a>
                    </li>
                    <li class="contact">
                        <a href="{{ route('contact') }}">お問い合わせ</a>
                    </li>
                    <li class="terms">
                        <a href="{{ route('terms') }}">利用規約</a>
                    </li>
                    <li class="privacy">
                        <a href="{{ route('privacypolicy') }}">プライバシーポリシー</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
