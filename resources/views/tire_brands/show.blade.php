@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tire-brands.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.tire-brands.fields.name')</th>
                            <td>{{ $tire_brand->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#tireproducts" aria-controls="tireproducts" role="tab" data-toggle="tab">Tire products</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="tireproducts">
<table class="table table-bordered table-striped {{ count($tire_products) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.tire-products.fields.name')</th>
                        <th>@lang('quickadmin.tire-products.fields.brand')</th>
                        <th>@lang('quickadmin.tire-products.fields.size')</th>
                        <th>@lang('quickadmin.tire-products.fields.description')</th>
                        <th>@lang('quickadmin.tire-products.fields.price')</th>
                        <th>@lang('quickadmin.tire-products.fields.special-price')</th>
                        <th>@lang('quickadmin.tire-products.fields.image-1')</th>
                        <th>@lang('quickadmin.tire-products.fields.image-2')</th>
                        <th>@lang('quickadmin.tire-products.fields.image-3')</th>
                        <th>@lang('quickadmin.tire-products.fields.image-4')</th>
                        <th>@lang('quickadmin.tire-products.fields.image-5')</th>
                        <th>@lang('quickadmin.tire-products.fields.image-6')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($tire_products) > 0)
            @foreach ($tire_products as $tire_product)
                <tr data-entry-id="{{ $tire_product->id }}">
                    <td>{{ $tire_product->name }}</td>
                                <td>{{ $tire_product->brand->name or '' }}</td>
                                <td>{{ $tire_product->size->size or '' }}</td>
                                <td>{!! $tire_product->description !!}</td>
                                <td>{{ $tire_product->price }}</td>
                                <td>{{ $tire_product->special_price }}</td>
                                <td>@if($tire_product->image_1)<a href="{{ asset('uploads/' . $tire_product->image_1) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_1) }}"/></a>@endif</td>
                                <td>@if($tire_product->image_2)<a href="{{ asset('uploads/' . $tire_product->image_2) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_2) }}"/></a>@endif</td>
                                <td>@if($tire_product->image_3)<a href="{{ asset('uploads/' . $tire_product->image_3) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_3) }}"/></a>@endif</td>
                                <td>@if($tire_product->image_4)<a href="{{ asset('uploads/' . $tire_product->image_4) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_4) }}"/></a>@endif</td>
                                <td>@if($tire_product->image_5)<a href="{{ asset('uploads/' . $tire_product->image_5) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_5) }}"/></a>@endif</td>
                                <td>@if($tire_product->image_6)<a href="{{ asset('uploads/' . $tire_product->image_6) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_6) }}"/></a>@endif</td>
                                <td>
                                    @can('tire_product_view')
                                    <a href="{{ route('tire_products.show',[$tire_product->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('tire_product_edit')
                                    <a href="{{ route('tire_products.edit',[$tire_product->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('tire_product_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['tire_products.destroy', $tire_product->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
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

            <p>&nbsp;</p>

            <a href="{{ route('tire_brands.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop