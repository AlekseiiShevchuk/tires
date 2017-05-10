@extends('layouts.index')

@section('content')
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
            <div>
                <img data-u="image" src="{{asset('slider/' . 'slider1.jpg')}}" />
            </div>
            <div>
                <img data-u="image" src="{{asset('slider/' . 'slider2.jpg')}}" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
    </div>
    <div class="wrap-under-slider">
        <div class="phone inline-block">
            <span class="shop-phone">
                <i class="glyphicon glyphicon-earphone white-color-bold"></i>
                <span class="light-grey-color">Ring til os:</span>
                <span class="white-color-bold">+45 32203218</span>
            </span>
        </div>
        <div class="wrap-link inline-block">
            <ul class="links-collection">
                <li class="first-link wrap-links"><a class="white-color-bold" href="#">Kontakt os</a></li>
                <li class="link wrap-links"><a class="white-color-bold" href="#">Log ind</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3 tire-img">
                <img src="{{ asset('index-page/fire-daek-logo-1490775043.jpg') }}">
            </div>
            <div class="col-md-3 col-md-offset-2 search-content">
                <input class="search" type="text" placeholder="Søg">
                <button class="search-btn"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 wrap-collection-2">
                <ul class="links-collection">
                    <li class="wrap-links-2"><a href="#">Sommerdæk</a></li>
                    <li class="wrap-links-2 links-2"><a href="#">Vinterdæk</a></li>
                    <li class="wrap-links-2 links-2-last"><a href="#">Tilbud</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="section container wrap-tires">
        <div class="row text-center">
            @foreach($tires as $tire)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <a href="#">
                            <img class="thumbnail-img" src="{{asset('uploads/' . $tire->image_1)}}">
                        </a>
                        <div class="caption">
                        <h4 style="height: 38px;overflow: hidden;"><strong>{{ $tire->name }}</strong></h4>
                        <p class="caption-description">{!! mb_substr($tire->description, 0, 50) !!} ... </p>
                        <div class="price">
                            @if($tire->price && $tire->special_price)
                                <span class="text-danger"><strike>KR {{ $tire->price }}</strike></span>
                                <span class="text-primary"> KR {{$tire->special_price}} </span>
                            @endif
                        </div>
                        <p class="thumbnail-category"><storng>Brand: </storng><a href="{{route('tire_brands.show',['id' =>$tire->brand->id])}}">{{ $tire->brand->name }}</a></p>
                        <hr>
                        <p>
                            <a href="#" class="btn btn-default">Mere Info</a>
                            <a href="#" class="btn btn-primary" style="padding-left:30px;padding-right:30px;">Bestil nu!</a>
                        </p>
                    </div>
                </div>
                </div>
            @endforeach
        <div class="clearfix"></div>
        <div class="row text-center">
                <div class="container"> {{ $tires->links() }}</div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('index-page/1.jpg') }}">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('index-page/2.jpg') }}">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('index-page/3.jpg') }}">
            </div>
        </div>
    </div>
@endsection
