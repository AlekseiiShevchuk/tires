@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tires.title')</h3>
    @can('tire_create')
    <p>
        <a href="{{ route('tires.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tires) > 0 ? 'datatable' : '' }} @can('tire_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('tire_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.tires.fields.description')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tires) > 0)
                        @foreach ($tires as $tire)
                            <tr data-entry-id="{{ $tire->id }}">
                                @can('tire_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $tire->description }}</td>
                                <td>
                                    @can('tire_edit')
                                    <a href="{{ route('tires.edit',[$tire->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('tire_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['tires.destroy', $tire->id])) !!}
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
        @can('tire_delete')
            window.route_mass_crud_entries_destroy = '{{ route('tires.mass_destroy') }}';
        @endcan

    </script>
@endsection