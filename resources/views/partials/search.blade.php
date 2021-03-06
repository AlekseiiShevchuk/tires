<?php
use App\PreOrder;

$pre_order = null;

$price = 0;

if (Auth::check()) {
  $pre_order = PreOrder::where([
    'user_id' => Auth::user()->id,
    'is_confirmed' => PreOrder::NOT_CONFIRMED
  ])->first();
}

$tires = [];

if ($pre_order instanceof PreOrder) {
  $data = $pre_order->tires->toArray();

  foreach ($data as $tire) {
    $price += $tire['special_price'] ? $tire['special_price'] : $tire['price'];
  }

  $tires = array_map("unserialize", array_unique(array_map("serialize", $data)));

  foreach ($tires as $key => $value) {
    $tires[$key]['count'] = 0;
    $tires[$key]['price'] = 0;
    foreach ($data as $k => $row) {
      if ($value == $row) {
        ++$tires[$key]['count'];
        $tires[$key]['price'] += $row['special_price'] ? $row['special_price'] : $row['price'];
      }
    }
  }
}

?>
<header class="header">
<div class="container">
    <div class="row">
      <div class="col-md-4">
          <a href="{{ action('IndexController@index') }}"><img src="{{ asset('index-page/fire-daek-logo-1490775043.jpg') }}" class="header__logo"></a>
      </div>
      <div class="col-md-4">
        <div class="search-content" style="margin-top:50px;">
          <input class="search-content__input" type="text" placeholder="Søg">
          <button class="search-content__btn"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      <div class="col-md-3 col-md-offset-1 shopping-cart-wrap">
          <div class="shopping-cart">
            <a class="shopping-cart__main" href="#">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <strong>Kurv</strong>
              <i class="fa fa-caret-down" aria-hidden="true" style="float: right;line-height: 45px;"></i>
            </a>
            <div class="shopping-cart-dropdown">
              @if($pre_order && count($tires) > 0)
                @foreach($tires as $key => $tire)
                  <div class="cart-block clearfix" data-tireremove="{{$tire['id']}}">
                    <div class="cart-block__image">
                      <img src="{{ asset('uploads/thumb/' . $tire['image_1']) }}">
                    </div>
                    <div class="cart-block__info">
                      <div class="product-name">
                        <span class="quantity-formated">
                          <span data-tirecounter="{{$tire['id']}}">{{ $tire['count'] }}</span>
                          <span class="quantity-formated__x">x</span>
                        </span>
                        <span>{{ $tire['name'] }}</span>
                      </div>
                      <div class="cart-info__price">
                        <span data-tireprice="{{$tire['id']}}">{{ $tire['price'] }}</span>
                        <span>KR</span>
                      </div>
                      <!-- <span data-tireremove="{{$tire['id']}}" data-preorderremove="{{$pre_order->id}}" class="cart-tire-remove" style="cursor: pointer;">x</span> -->
                      <span class="add-to-pre-order shopping-cart__add-to-pre-order" data-version="1" data-tire="{{$tire['id']}}" style="cursor: pointer;">
                        <i class="glyphicon glyphicon-plus"></i>
                      </span>
                      <span class="remove-one-from-cart shopping-cart__remove-one-from-cart" data-tire="{{$tire['id']}}" data-preorder="{{$pre_order->id}}" style="cursor: pointer;">
                        <i class="glyphicon glyphicon-minus"></i>
                      </span>
                    </span>
                    </div>
                    <span data-tireremove="{{$tire['id']}}" data-preorderremove="{{$pre_order->id}}" class="glyphicon glyphicon-remove cart-tire-remove"></span>
                  </div>
                @endforeach
                <div class="cart-prices-line">
                  <span>I alt</span>
                  <span class="price cart-block-total"></span>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => ['order_redirect'], 'id' => 'cart-form']) !!}

                    <input type="hidden" id="cart-price" name="price" value="{{$price}}" />
                    <input type="hidden" id="cart-order" name="pre_order" value="{{$pre_order->id}}" />
                    <div id="cart-hidden-inputs">
                      @foreach($pre_order->tires as $tire)
                        <input type="hidden" name="tires[]" value="{{$tire->id}}" />
                      @endforeach
                    </div>

                    <div class="cart-block__buttons">
                      {!! Form::submit('Til betaling', ['class' => 'btn btn-success btn-lg']) !!}
                    </div>
                    {!! Form::close() !!}
              @endif
            </div>
          </div>
      </div>
    </div>
  </div>
</header>
