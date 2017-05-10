@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <section class="section container">
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
@endsection
