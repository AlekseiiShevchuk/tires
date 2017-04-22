@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.car-models.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.car-models.fields.description')</th>
                            <td>{{ $car_model->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.car-models.fields.motor')</th>
                            <td>{{ $car_model->motor }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.car-models.fields.tires')</th>
                            <td>
                                @foreach ($car_model->tires as $singleTires)
                                    <span class="label label-info label-many">{{ $singleTires->description }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#carnumbers" aria-controls="carnumbers" role="tab" data-toggle="tab">Car numbers</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="carnumbers">
<table class="table table-bordered table-striped {{ count($car_numbers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.car-numbers.fields.number')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($car_numbers) > 0)
            @foreach ($car_numbers as $car_number)
                <tr data-entry-id="{{ $car_number->id }}">
                    <td>{{ $car_number->number }}</td>
                                <td>
                                    @can('car_number_view')
                                    <a href="{{ route('car_numbers.show',[$car_number->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
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

            <p>&nbsp;</p>

            <a href="{{ route('car_models.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop