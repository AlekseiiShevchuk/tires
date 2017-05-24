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
                    <p><b>Email: </b>{{$order->user->email}}</p>
                    <p><b>Address: </b>{{$order->user->address}}</p>
                    <p><b>Phone: </b>{{$order->user->phone}}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Special Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->tires as $tire)
                                <tr>
                                    <td>{{$tire->name}}</td>
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

            <p>&nbsp;</p>

            <a href="{{ route('orders.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop