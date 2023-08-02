<!-- トップへ戻るボタン -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
<div id="pageTop"><a href="#"></a></div>

<!-- フッター -->
<footer id="footer" class="footer outerBlock">
    <div class="footerWrap">
        <div class="footerLogo">
            <a href=""><img src="{{ asset('assets/images/logo.jpg') }}" alt="タイプコード"></a>
        </div>
        <div class="innerBlock">
            <div class="footerContent">

                <div class="contentItem">
                    <div class="footerNav">
                        <div class="footerTitle"><a href="{{ route('game') }}">ゲーム</a></div>
                        <div class="footerTitle"><a href="{{ route('dictionary') }}">辞書</a></div>
                        <div class="footerTitle"><a href="{{ route('ranking') }}">ランキング</a></div>
                        <div class="footerTitle"><a href="{{ route('myscore') }}">マイスコア</a></div>
                    </div>
                </div>

                <div class="contentItem">
                    {{-- <div class="footerNav">
                        <div class="footerTitle"><span>知っトク情報</span></div>
                    </div> --}}
                    <div class="footerTitle"><a href="{{ route('knowhow') }}">知っトク情報</a></div>

                    <div class="footerTitle"><a href="{{ route('article') }}">更新情報</a></div>

                    <div class="footerTitle"><a href="{{ route('about') }}">アバウト</a></div>
                </div>

                <div class="contentItem">
                    <div class="footerNav">
                        <div class="footerTitle"><a href="{{ route('contact') }}">お問い合わせ</a></div>
                        <div class="footerTitle"><a href="{{ route('terms') }}">利用規約</a></div>
                        <div class="footerTitle"><a href="{{ route('privacypolicy') }}">プライバシーポリシー</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="copyright">
        <small>Copyright©タイプコード All Rights Reserved.</small>
    </div>

</footer>
