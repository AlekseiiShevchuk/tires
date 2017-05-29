@extends('layouts.handler')

@section('content')
{!! Form::open(['method' => 'POST', 'route' => ['order.store'], 'id' => 'cart-form']) !!}

<input type="hidden" id="cart-price" name="price" value="{{session('price')}}" />
<input type="hidden" id="cart-order" name="pre_order" value="{{session('pre_order')}}" />
<div id="cart-hidden-inputs">
@foreach(session('tires') as $tire)
 	<input type="hidden" name="tires[]" value="{{$tire}}" />
@endforeach
</div>
{!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger', 'id' => 'btn-fake-form']) !!}
{!! Form::close() !!}
@endsection
@section('js_scripts')
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{ url('quickadmin/js') }}/fake_form.js"></script>
@endsection