@extends('layouts.index')

@section('content')
    @extends('layouts.index')

@section('content')
    <div class="container">
      <div class="row">
        <div class="row">
                <div class="col-md-12">
                    <label>Identifier:</label>
                    <p>{{ $order->identifier }}</p>
                    <label>Count:</label>
                    <p>{{ $order->count }}</p>
                    <label>Price:</label>
                    <p>{{ $order->price }}</p>
                    <label>Status</label>
                    <p id="order-label-status">{{$status_labels[$order->status]}}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Special Price</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tires as $tire)
                                <tr>
                                    @if(!is_null($tire->image_1))
                                        <td>
                                            <a href="{{ asset('uploads/' . $tire->image_1) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire->image_1) }}"/></a>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td><a href="{{ action('UsersTireProductController@show', $tire->id) }}" target="_blank">
                                        {{$tire->name}}
                                    </a></td>
                                    <td>{{$tire->brand->name}}</td>
                                    <td>{{$tire->size->size}}</td>
                                    <td>{{$tire->price}}</td>
                                    <td>{{!is_null($tire->special_price) ? $tire->special_price : '-'}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>{{ $tires->links() }}</div>
                </div>
            </div>
      </div>
    </div>
@endsection

@endsection
