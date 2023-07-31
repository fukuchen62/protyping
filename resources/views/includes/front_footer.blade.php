<!-- トップへ戻るボタン -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
<div id="pageTop"><a href="#"></a></div>

<footer id="footer">
    <!-- topへ戻るボタン -->
    {{-- <div class="scroll-top">
        <a href="#">TOPへ</a>
    </div> --}}

    <!-- フッターメニュー -->
    <div class="footer navContent">

        <tr class="footerWrap navList">

            <th width="9%" class="footerLogo"><a href="{{ route('top') }}">
                    <img src="{{ asset('assets/images/menu_icon/station_area_icon_w.svg') }}" alt="トップ画面"
                        width="30" height="20">
                    TOP</a></th>

            <th width="9%" class="footerLogo"><a href="{{ route('game') }}">
                    <img src="{{ asset('assets/images/menu_icon/station_detail_icon_w.svg') }}" alt="ゲーム"
                        width="30" height="20">
                    ゲーム</a></th>
            <th width="9%" class="footerLogo"><a href="{{ route('dictionary') }}">
                    <img src="{{ asset('assets/images/menu_icon/news_icon_w.svg') }}" alt="辞書" width="30"
                        height="20">
                    辞書</a></th>
            <th width="9%" class="footerLogo"><a href="{{ route('ranking') }}">
                    <img src="{{ asset('assets/images/menu_icon/goods_list_icon_w.svg') }}" alt="ランキング"
                        width="30" height="20">
                    ランキング</a></th>
            <th width="9%" class="footerLogo"><a href="{{ route('myscore') }}">
                    <img src="{{ asset('assets/images/menu_icon/activity_list_icon_w.svg') }}" alt="マイスコア"
                        width="30" height="20">
                    マイスコア</a></th>

            <th width="9%" class="footerLogo"><a href="{{ route('knowhow') }}">
                    <img src="{{ asset('assets/images/menu_icon/blog_list_icon_w.svg') }}" alt="知っトク情報"
                        width="30" height="20">
                    知っトク情報</a></th>
            <th width="9%" class="footerLogo">
                <a href="{{ route('about') }}">
                    <img src="{{ asset('assets/images/menu_icon/like_icon_w.svg') }}" alt="アバウト" width="30"
                        height="20">
                    アバウト</a>
            </th>
            <th width="9%" class="footerLogo"><a href="{{ route('article') }}">
                    <img src="{{ asset('assets/images/menu_icon/contact_icon_w.svg') }}" alt="更新情報" width="30"
                        height="20">
                    更新情報</a></th>
            <th width="9%" class="footerLogo"><a href="{{ route('terms') }}">
                    <img src="{{ asset('assets/images/menu_icon/about-this-website_icon_w.svg') }}" alt="利用規約"
                        width="30" height="20">
                    利用規約</a></th>
            <th width="9%" class="footerLogo"><a href="{{ route('privacypolicy') }}">
                    <img src="{{ asset('assets/images/menu_icon/privacy-policy_icon_w.svg') }}" alt="プライバシーポリシー"
                        width="30" height="20">
                    プライバシーポリシー</a></th>
            <th width="9%" class="footerLogo"><a href="{{ route('admintop') }}" target="_blank">
                    <img src="{{ asset('assets/images/menu_icon/station_list_icon.svg') }}" alt="ログイン"
                        width="30" height="30">
                    ログイン</a></th>
        </tr>

    </div>

    <div class="copyright">
        <small>Copyright©タイプコード All Rights Reserved.</small>
    </div>
</footer>
