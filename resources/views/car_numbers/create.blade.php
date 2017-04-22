@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.car-numbers.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['car_numbers.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('number', 'Number*', ['class' => 'control-label']) !!}
                    {!! Form::text('number', old('number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('number'))
                        <p class="help-block">
                            {{ $errors->first('number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('car_model_id', 'Car model*', ['class' => 'control-label']) !!}
                    {!! Form::select('car_model_id', $car_models, old('car_model_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('car_model_id'))
                        <p class="help-block">
                            {{ $errors->first('car_model_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

