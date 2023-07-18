<header id="header">
    <h1>プログラミンタイピング練習</h1>
    <div class="header-inner container">
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
                            <img src="{{ asset('assets/images/menu_icon/station_area_icon.svg') }}" alt="About"
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

        <!-- g-nav mobile -->
        {{-- <nav id="wrapper">
        <h1 class="site-logo mobile-logo"><a href="{{ route('top') }}"><img
                    src="{{ asset('assets/images/site_logo/logo.svg') }}" alt="とくしままるっと道の駅"></a></h1>

        <div class="btn-gnavi">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav id="global-navi">

            <ul class="hamburger-menu">
                <li>
                    <a href="{{ route('top') }}">

                        <img src="{{ asset('assets/images/menu_icon/station_list_icon_ws.svg') }}" alt="道の駅一覧"
                            width="40" height="40">

                        道の駅一覧
                    </a>
                </li>


                <li>
                    <a href="{{ route('//') }}">

                        <img src="{{ asset('assets/images/menu_icon/station_area_icon_ws.svg') }}" alt="エリア検索"
                            width="40" height="40">

                        エリア検索
                    </a>
                </li>
                <li>
                    <a href="{{ route('top') }}">

                        <img src="{{ asset('assets/images/menu_icon/station_detail_icon_ws.svg') }}" alt="詳細検索"
                            width="40" height="40">

                        詳細検索
                    </a>
                </li>
                <li>
                    <a href="{{ route('top') }}">

                        <img src="{{ asset('assets/images/menu_icon/goods_list_icon_ws.svg') }}" alt="特産品"
                            width="40" height="40">

                        特産品
                    </a>
                </li>
                <li>
                    <a href="{{ route('top') }}">

                        <img src="{{ asset('assets/images/menu_icon/activity_list_icon_ws.svg') }}" alt="体験"
                            width="40" height="40">

                        体験
                    </a>
                </li>
                <li>
                    <a href="{{ route('top') }}">

                        <img src="{{ asset('assets/images/menu_icon/blog_list_icon_ws.svg') }}" alt="ブログ"
                            width="40" height="40">
                        ブログ
                    </a>
                </li>
                <li>
                    <a href="{{ route('top') }}">

                        <img src="{{ asset('assets/images/menu_icon/like_icon_ws.svg') }}" alt="お気に入り"
                            width="40" height="40">

                        お気に入り
                    </a>
                </li>
            </ul>

        </nav>
    </nav> --}}

    </div>
</header>
