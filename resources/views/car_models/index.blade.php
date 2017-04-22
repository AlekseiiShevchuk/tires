@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.car-models.title')</h3>
    @can('car_model_create')
    <p>
        <a href="{{ route('car_models.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($car_models) > 0 ? 'datatable' : '' }} @can('car_model_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('car_model_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.car-models.fields.description')</th>
                        <th>@lang('quickadmin.car-models.fields.motor')</th>
                        <th>@lang('quickadmin.car-models.fields.tires')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($car_models) > 0)
                        @foreach ($car_models as $car_model)
                            <tr data-entry-id="{{ $car_model->id }}">
                                @can('car_model_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $car_model->description }}</td>
                                <td>{{ $car_model->motor }}</td>
                                <td>
                                    @foreach ($car_model->tires as $singleTires)
                                        <span class="label label-info label-many">{{ $singleTires->description }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('car_model_view')
                                    <a href="{{ route('car_models.show',[$car_model->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('car_model_edit')
                                    <a href="{{ route('car_models.edit',[$car_model->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('car_model_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['car_models.destroy', $car_model->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('car_model_delete')
            window.route_mass_crud_entries_destroy = '{{ route('car_models.mass_destroy') }}';
        @endcan

    </script>
@endsection