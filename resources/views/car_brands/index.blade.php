@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.car-brands.title')</h3>
    @can('car_brand_create')
    <p>
        <a href="{{ route('car_brands.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($car_brands) > 0 ? 'datatable' : '' }} @can('car_brand_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('car_brand_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.car-brands.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($car_brands) > 0)
                        @foreach ($car_brands as $car_brand)
                            <tr data-entry-id="{{ $car_brand->id }}">
                                @can('car_brand_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $car_brand->name }}</td>
                                <td>
                                    @can('car_brand_view')
                                    <a href="{{ route('car_brands.show',[$car_brand->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('car_brand_edit')
                                    <a href="{{ route('car_brands.edit',[$car_brand->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('car_brand_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['car_brands.destroy', $car_brand->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('car_brand_delete')
            window.route_mass_crud_entries_destroy = '{{ route('car_brands.mass_destroy') }}';
        @endcan

    </script>
@endsection