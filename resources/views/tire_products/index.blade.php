@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tire-products.title')</h3>
    @can('tire_product_create')
    <p>
        <a href="{{ route('tire_products.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tire_products) > 0 ? 'datatable' : '' }} @can('tire_product_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('tire_product_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('tire_product_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('tire_product_delete')
            window.route_mass_crud_entries_destroy = '{{ route('tire_products.mass_destroy') }}';
        @endcan

    </script>
@endsection