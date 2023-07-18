<!-- カードの構造 -->
<li class="card__p">
    <a class="card card__skin" href="{{ $card_link }}">
        <img class="card__img" src="{{ $card_src }}" alt="{{ $card_alt }}">
        <div class="card__textbox">
            <h3 class="card__title">{{ $card_title }}</h3>
            <p class="card__description">{{ $card_text }}</p>
        </div>
    </a>
</li>
<!-- /カードの構造 -->
