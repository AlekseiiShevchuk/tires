@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tire-products.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.name')</th>
                            <td>{{ $tire_product->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.brand')</th>
                            <td>{{ $tire_product->brand->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.size')</th>
                            <td>{{ $tire_product->size->size or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.description')</th>
                            <td>{!! $tire_product->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.price')</th>
                            <td>{{ $tire_product->price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.special-price')</th>
                            <td>{{ $tire_product->special_price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.image-1')</th>
                            <td>@if($tire_product->image_1)<a href="{{ asset('uploads/' . $tire_product->image_1) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_1) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.image-2')</th>
                            <td>@if($tire_product->image_2)<a href="{{ asset('uploads/' . $tire_product->image_2) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_2) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.image-3')</th>
                            <td>@if($tire_product->image_3)<a href="{{ asset('uploads/' . $tire_product->image_3) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_3) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.image-4')</th>
                            <td>@if($tire_product->image_4)<a href="{{ asset('uploads/' . $tire_product->image_4) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_4) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.image-5')</th>
                            <td>@if($tire_product->image_5)<a href="{{ asset('uploads/' . $tire_product->image_5) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_5) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tire-products.fields.image-6')</th>
                            <td>@if($tire_product->image_6)<a href="{{ asset('uploads/' . $tire_product->image_6) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $tire_product->image_6) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('tire_products.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop