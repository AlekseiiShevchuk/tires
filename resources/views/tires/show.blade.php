@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tires.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.tires.fields.description')</th>
                            <td>{{ $tire->description }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#carmodels" aria-controls="carmodels" role="tab" data-toggle="tab">Car models</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="carmodels">
<table class="table table-bordered table-striped {{ count($car_models) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('tires.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop