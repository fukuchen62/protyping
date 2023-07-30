<header id="header">
    <div class="header-inner container">
        <h1>タイプコード</h1>
        <!-- g-nav mobile -->
        <nav id="menu-sp">
        </nav>

        <div class="top-kv">
            <!-- kvロゴ -->
        </div>

        <!-- g-nav pc -->
        <nav id="menu-pc">
            <ul class="nav-pc">
                <li>
                    <a href="{{ route('top') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/station_list_icon.svg') }}" alt="タイプコード"
                                width="30" height="30">
                        </div>
                        タイプコード
                    </a>
                </li>
                <li>
                    <a href="{{ route('game') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/station_area_icon.svg') }}" alt="About"
                                width="30" height="30">
                        </div>
                        ゲーム画面
                    </a>
                </li>
                <li>
                    <a href="{{ route('dictionary') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/station_area_icon.svg') }}" alt="辞書"
                                width="30" height="30">
                        </div>
                        辞書
                    </a>
                </li>
                <li>
                    <a href="{{ route('ranking') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/station_detail_icon.svg') }}" alt="ランキング"
                                width="30" height="30">
                        </div>
                        ランキング
                    </a>
                </li>
                <li>
                    <a href="{{ route('myscore') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/activity_list_icon.svg') }}" alt="マイスコア"
                                width="30" height="30">
                        </div>
                        マイスコア
                    </a>
                </li>
                <li>
                    <a href="{{ route('knowhow') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/blog_list_icon.svg') }}" alt="知っトク情報"
                                width="30" height="30">
                        </div>
                        知っトク情報
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/like_icon.svg') }}" alt="お問い合わせ"
                                width="30" height="30">
                        </div>
                        お問い合わせ
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</header>
