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
                        <th>@lang('quickadmin.orders.fields.status')</th>
                        <th>@lang('quickadmin.orders.fields.delivery')</th>
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
                                    <span class="get-select-option" style="cursor: pointer;" data-order="{{$order->id}}">{{ $status_labels[$order->status] }}</span>
                                    <select style="display: none;" class="form-control change-order-status" data-version="1" data-order="{{$order->id}}">
                                        @foreach($status_labels as $key => $label)
                                            <option value="{{ $key }}" {{($key == $order->status) ? 'selected' : ''}}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    <a data-order="{{$order->id}}" style="display: none;" class="btn btn-danger btn-xs hide-select-option">Hide</a>
                                </td>
                                <td>{{ $delivery_labels[$order->delivery_type] }}</td>
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

@section('js_scripts')
<script src="{{ url('quickadmin/js') }}/ajax.js"></script>
@stop