@extends('layouts.product')

<!-- @section('head')
    <link rel="stylesheet"
      href="{{ url('quickadmin/css') }}/slick.css"/>
@endsection -->

@section('content')
	<main class="product-full">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-slider">
                        @foreach($images as $item)
                            <div>
                                <img src="{{asset('uploads/' . $item)}}" style="width: 100%;" alt="Image">
                            </div>
                        @endforeach
                    </div>
                    <div class="product-slider-thumb">
                        @foreach($images as $item)
                            <div class="slide-thumb pointer">
                                <img src="{{asset('uploads/thumb/' . $item)}}" style="width: 100%;"
                                     alt="Thumb image">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-info section">
                        <h1>{{ $tire_product->name }}</h1>
                        <div>
                            <span><strong>Brand:</strong> <a
                                        href="{{route('tire_brands.show',['id' =>$tire_product->brand->id])}}">{{ $tire_product->brand->name }}</a></span>
                        </div>
                        <div class="price">
                            @if($tire_product->price && $tire_product->special_price)
                            <span class="text-danger"><strike>KR {{ $tire_product->price }}</strike></span>
                            <span class="text-primary"> KR {{$tire_product->special_price}} </span>
                            @elseif($tire_product->price)
                                <span class="text-primary"> KR {{$tire_product->price}} </span>
                            @endif
                        </div>
                        <hr>
                        <div class="sizes">
                            <span class="label label-default">{{ $tire_product->size->name }}</span>
                        </div>
                        <hr>
                        <h4>BESKRIVELSE</h4>
                        <p>{!! $tire_product->description !!}</p>
                        <a href="#" class="btn btn-primary"
                           style="padding-left:30px;padding-right:30px;">Bestil nu!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-products">
            <div class="container">
                <h3 class="page-header">Related Products</h3>
                <div class="row text-center">
                    @foreach($related_tire_products as $product)
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <a href="{{ action('UsersTireProductController@show', $product->id) }}"><img class="related-images"
                                            src="{{asset('uploads/' . $product->image_1)}}"></a>
                                <div class="caption">
                                    <h4 style="height: 38px;overflow: hidden;"><strong>{{ $product->name }}</strong>
                                    </h4>
                                    <p class="caption-description">{!! mb_substr($product->description, 0, 50) !!}
                                        ... </p>
                                    <div class="price">
                                        <span class="text-danger"><strike>KR {{ $product->price }}</strike></span>
                                        <span class="text-primary"> KR {{$product->special_price}} </span>
                                    </div>
                                    <hr>
                                    <p>
                                        <a href="{{ action('UsersTireProductController@show', $product->id) }}"
                                           class="btn btn-default">Mere Info</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
