@extends('layouts.index')

@section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<p>Dear <b>{{Auth::user()->first_name }} {{Auth::user()->last_name }}</b>!</p>
    			<p>Your order's number: <b>{{session('order_identifier')}}</b></p>
    		</div>
    	</div>
    </div>
@endsection