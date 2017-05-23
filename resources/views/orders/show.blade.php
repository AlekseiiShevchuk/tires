@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.orders.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <label>Identifier:</label>
                    <p>{{ $order->identifier }}</p>
                    <label>Count:</label>
                    <p>{{ $order->count }}</p>
                    <label>Price:</label>
                    <p>{{ $order->price }}</p>
                </div>
                <div class="col-md-6">
                    <label>User:</label>
                    <p><b>First name: </b>{{$order->user->first_name}}</p>
                    <p><b>Last name: </b>{{$order->user->last_name}}</p>
                    <p><b>Name: </b>{{$order->user->name}}</p>
                    <p><b>Address: </b>{{$order->user->address}}</p>
                    <p><b>Phone: </b>{{$order->user->phone}}</p>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('orders.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop