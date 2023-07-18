<header id="header">
    <div class="header-inner container">
        <h1>プログラミンタイピング練習</h1>
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
                            <img src="{{ asset('assets/images/menu_icon/station_list_icon.svg') }}" alt="ゲーム"
                                width="30" height="30">
                        </div>
                        ゲーム開始
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/station_area_icon.svg') }}" alt="辞書"
                                width="30" height="30">
                        </div>
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('top') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/station_area_icon.svg') }}" alt="辞書"
                                width="30" height="30">
                        </div>
                        辞書
                    </a>
                </li>
                <li>
                    <a href="{{ route('top') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/station_detail_icon.svg') }}" alt="知ットク情報"
                                width="30" height="30">
                        </div>
                        知ットク情報
                    </a>
                </li>
                <li>
                    <a href="{{ route('top') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/activity_list_icon.svg') }}" alt="更新情報"
                                width="30" height="30">
                        </div>
                        更新情報
                    </a>
                </li>
                <li>
                    <a href="{{ route('top') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/blog_list_icon.svg') }}" alt="ランキング"
                                width="30" height="30">
                        </div>
                        ランキング
                    </a>
                </li>
                <li>
                    <a href="{{ route('top') }}">
                        <div>
                            <img src="{{ asset('assets/images/menu_icon/like_icon.svg') }}" alt="MyScore"
                                width="30" height="30">
                        </div>
                        My Score
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</header>
