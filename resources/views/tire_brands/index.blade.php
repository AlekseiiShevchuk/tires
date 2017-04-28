@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tire-brands.title')</h3>
    @can('tire_brand_create')
    <p>
        <a href="{{ route('tire_brands.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tire_brands) > 0 ? 'datatable' : '' }} @can('tire_brand_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('tire_brand_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.tire-brands.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tire_brands) > 0)
                        @foreach ($tire_brands as $tire_brand)
                            <tr data-entry-id="{{ $tire_brand->id }}">
                                @can('tire_brand_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $tire_brand->name }}</td>
                                <td>
                                    @can('tire_brand_view')
                                    <a href="{{ route('tire_brands.show',[$tire_brand->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('tire_brand_edit')
                                    <a href="{{ route('tire_brands.edit',[$tire_brand->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('tire_brand_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['tire_brands.destroy', $tire_brand->id])) !!}
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
        @can('tire_brand_delete')
            window.route_mass_crud_entries_destroy = '{{ route('tire_brands.mass_destroy') }}';
        @endcan

    </script>
@endsection