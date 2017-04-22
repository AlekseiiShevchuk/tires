@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.car-numbers.title')</h3>
    @can('car_number_create')
    <p>
        <a href="{{ route('car_numbers.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($car_numbers) > 0 ? 'datatable' : '' }} @can('car_number_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('car_number_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.car-numbers.fields.number')</th>
                        <th>Brand / Manufacturer</th>
                        <th>Model</th>
                        <th>Tires</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($car_numbers) > 0)
                        @foreach ($car_numbers as $car_number)
                            <tr data-entry-id="{{ $car_number->id }}">
                                @can('car_number_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $car_number->number }}</td>
                                <td>{{ $car_number->car_model->car_brand->name }}</td>
                                <td>{{ $car_number->car_model->description }}, motor: {{ $car_number->car_model->motor }}</td>
                                <td>
                                    @foreach ($car_number->car_model->tires as $singleTires)
                                        <span class="label label-info label-many">{{ $singleTires->description }}</span>
                                    @endforeach</td>
                                <td>
                                    @can('car_number_edit')
                                    <a href="{{ route('car_numbers.edit',[$car_number->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('car_number_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['car_numbers.destroy', $car_number->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('car_number_delete')
            window.route_mass_crud_entries_destroy = '{{ route('car_numbers.mass_destroy') }}';
        @endcan

    </script>
@endsection