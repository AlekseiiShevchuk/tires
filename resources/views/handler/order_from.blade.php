@extends('layouts.index')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p>{{ $pre_order->user->first_name }} {{ $pre_order->user->last_name }}</p>
			<p><b>Address: </b>{{ $pre_order->user->address }}</p>
			<p><b>Phone: </b>{{ $pre_order->user->phone }}</p>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p><b>Total price: </b>{{ $total_price }}</p>
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
                    @foreach($pre_order->tires as $tire)
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
		</div>
	</div>
</div>
{!! Form::open(['method' => 'POST', 'route' => ['order.store'], 'id' => 'cart-form']) !!}

<input type="hidden" id="cart-price" name="price" value="{{session('price')}}" />
<input type="hidden" id="cart-order" name="pre_order" value="{{session('pre_order')}}" />
<div id="cart-hidden-inputs">
@foreach(session('tires') as $tire)
 	<input type="hidden" name="tires[]" value="{{$tire}}" />
@endforeach
</div>
<div class="delivery-radio">
@foreach($delivery as $key => $value)
 	<span>{{ $value }}</span> <input type="radio" name="delivery" value="{{$key}}" />
@endforeach
</div>
<div><input type="checkbox" value="0" class="checkbox-confirmation" name="isConfirmed"> I confrim this order.</div>
{!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger', 'id' => 'btn-confirm-form']) !!}
{!! Form::close() !!}
@endsection