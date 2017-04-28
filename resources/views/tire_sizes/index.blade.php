@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tire-sizes.title')</h3>
    @can('tire_size_create')
    <p>
        <a href="{{ route('tire_sizes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tire_sizes) > 0 ? 'datatable' : '' }} @can('tire_size_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('tire_size_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.tire-sizes.fields.size')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tire_sizes) > 0)
                        @foreach ($tire_sizes as $tire_size)
                            <tr data-entry-id="{{ $tire_size->id }}">
                                @can('tire_size_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $tire_size->size }}</td>
                                <td>
                                    @can('tire_size_view')
                                    <a href="{{ route('tire_sizes.show',[$tire_size->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('tire_size_edit')
                                    <a href="{{ route('tire_sizes.edit',[$tire_size->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('tire_size_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['tire_sizes.destroy', $tire_size->id])) !!}
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
        @can('tire_size_delete')
            window.route_mass_crud_entries_destroy = '{{ route('tire_sizes.mass_destroy') }}';
        @endcan

    </script>
@endsection