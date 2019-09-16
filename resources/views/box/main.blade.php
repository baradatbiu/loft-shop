@extends('layouts.app');

@section('content');
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
            </div>
            <div class="content-head__search-block">
                <div class="search-container">
                    <form class="search-container__form">
                        <input type="text" class="search-container__form__input">
                        <button class="search-container__form__btn">search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="cart-product-list">
                @foreach($box as $item)
                    <div class="cart-product-list__item">
                        <div class="cart-product__item__product-photo"><img src="{{ $item->game->getImageUrl() }}" class="cart-product__item__product-photo__image"></div>
                        <div class="cart-product__item__product-name">
                            <div class="cart-product__item__product-name__content">
                                <a href="{{ route('game.show', ['id' => $item->game->id]) }}">{{ $item->game->title }}</a>
                            </div>
                        </div>
                        <div class="cart-product__item__cart-date">
                            <div class="cart-product__item__cart-date__content">{{ $item->created_at }}</div>
                        </div>
                        <div class="cart-product__item__product-price"><span class="product-price__value">{{ $item->game->price }} рублей</span></div>
                    </div>
                @endforeach
            </div>
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title">Сумма заказа: {{ $box->sum('game.price') }} руб.</div>
            </div>
            <form method="get" action="{{ route('box.order') }}" class="search-container__form">
                <button class="btn-order">Заказать</button>
            </form>
        </div>
        <div class="content-footer__container">
            <ul class="page-nav">
                <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
                <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
                <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
                <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
                <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
                <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
                <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="content-bottom"></div>
@endsection
