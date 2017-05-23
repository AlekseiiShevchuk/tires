@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.orders.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($orders) > 0 ? 'datatable' : '' }} @can('order_list') @endcan">
                <thead>
                    <tr>
                        <th>@lang('quickadmin.orders.fields.identifier')</th>
                        <th>@lang('quickadmin.orders.fields.count')</th>
                        <th>@lang('quickadmin.orders.fields.price')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($orders) > 0)
                        @foreach ($orders as $order)
                            <tr data-entry-id="{{ $order->id }}">
                                
                                <td>{{ $order->identifier }}</td>
                                <td>{{ $order->count }}</td>
                                <td>{{ $order->price }}</td>
                                <td>
                                    @can('order_show')
                                    <a href="{{ route('orders.show',[$order->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="16">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
@endsection