<div class="card">

    {{-- @if ($road->area_id == 3) --}}
    <a href="{{ url('station-detail' . '?id=' . $road->id) }}">
        <img src="{{ $link }}" width="250px" height="200px" alt="道の駅写真">
        <h4>道の駅&nbsp;{{ $road->station_name }}</h4>
        <p>{{ $road->catchphrase }}</p>
        <dl>
            <dt>営業時間：</dt>
            <dd>{{ $road->business_hours }}</dd>

            <dt>〒{{ $road->zip_code }}</dt>
            <dd>{{ $road->address }}</dd>

            <dt>設備：</dt>
            <dd>
                <div class="icon-wrapper">

                    <img title="宿泊施設"
                        src="{{ asset('assets/images/icon/accommodation_icon' . $road->accommodation_icon . '.svg') }}"
                        alt="宿泊施設">
                    <img title="ATM" src="{{ asset('assets/images/icon/atm_icon' . $road->atm_icon . '.svg') }}"
                        alt="設備ATM">
                    <img title="ベビーベッド" src="{{ asset('assets/images/icon/bed_icon' . $road->bed_icon . '.svg') }}"
                        alt="ベビーベッド">
                    <img title="身障者トイレ"
                        src="{{ asset('assets/images/icon/disability_icon' . $road->disability_icon . '.svg') }}"
                        alt="身障者トイレ">
                    <img title="EV充電施設" src="{{ asset('assets/images/icon/ev_icon' . $road->ev_icon . '.svg') }}"
                        alt="EV充電施設">
                    <img title="軽食・喫茶"
                        src="{{ asset('assets/images/icon/lightmeal_icon' . $road->lightmeal_icon . '.svg') }}"
                        alt="軽食・喫茶">
                    <img title="公園" src="{{ asset('assets/images/icon/park_icon' . $road->park_icon . '.svg') }}"
                        alt="公園">
                    <img title="レストラン"
                        src="{{ asset('assets/images/icon/restaurant_icon' . $road->restaurant_icon . '.svg') }}"
                        alt="レストラン">
                    <img title="ショップ" src="{{ asset('assets/images/icon/shop_icon' . $road->shop_icon . '.svg') }}"
                        alt="ショップ">
                    <img title="シャワー"
                        src="{{ asset('assets/images/icon/shower_icon' . $road->shower_icon . '.svg') }}"
                        alt="シャワー">
                    <img title="温泉施設" src="{{ asset('assets/images/icon/spa_icon' . $road->spa_icon . '.svg') }}"
                        alt="温泉施設">
                    <img title="ここに説明が入ります"
                        src="{{ asset('assets/images/icon/shower_icon' . $road->shower_icon . '.svg') }}"
                        alt="">
                    <img title="ここに説明が入ります"
                        src="{{ asset('assets/images/icon/experience_icon' . $road->experience_icon . '.svg') }}"
                        alt="">
                    <img title="ここに説明が入ります"
                        src="{{ asset('assets/images/icon/guide_icon' . $road->guide_icon . '.svg') }}" alt="">
                    <img title="ここに説明が入ります"
                        src="{{ asset('assets/images/icon/observatory_icon' . $road->observatory_icon . '.svg') }}"
                        alt="">
                    <img title="ここに説明が入ります"
                        src="{{ asset('assets/images/icon/museum_icon' . $road->museum_icon . '.svg') }}"
                        alt="">
                </div>
            </dd>
        </dl>
    </a>
</div>
