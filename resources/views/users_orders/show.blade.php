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
                    
                </div>
            </div>
      </div>
    </div>
@endsection

@endsection
