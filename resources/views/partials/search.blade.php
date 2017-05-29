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
    foreach ($data as $k => $row) {
      if ($value == $row) {
        ++$tires[$key]['count'];
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
        <div class="search-content">
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
                  <div class="cart-block" data-tireremove="{{$tire['id']}}">
                    <img src="{{ asset('uploads/thumb/' . $tire['image_1']) }}">
                    <span>
                      <span data-tirecounter="{{$tire['id']}}">{{ $tire['count'] }}</span>
                      <span data-tireremove="{{$tire['id']}}" data-preorderremove="{{$pre_order->id}}" class="cart-tire-remove" style="cursor: pointer;">x</span>
                    </span>
                  </div>
                @endforeach
                {!! Form::open(['method' => 'POST', 'route' => ['order.store'], 'id' => 'cart-form']) !!}

                    <input type="hidden" id="cart-price" name="price" value="{{$price}}" />
                    <input type="hidden" id="cart-order" name="pre_order" value="{{$pre_order->id}}" />
                    <div id="cart-hidden-inputs">
                      @foreach($pre_order->tires as $tire)
                        <input type="hidden" name="tires[]" value="{{$tire->id}}" />
                      @endforeach
                    </div>

                    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
              @endif
            </div>
          </div>
      </div>
    </div>
  </div>
</header>
