@extends('layouts.app')

@section('content')
    <h3 class="page-title">Find tires by car number</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['find_tires_by_car_numbers.find']]) !!}

    <div class="col-xs-3 center-block">
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('number', 'Enter Car Number*', ['class' => 'control-label']) !!}
                        {!! Form::text('number', old('number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    </div>
                </div>

            </div>
        </div>

        {!! Form::submit('Find tires', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}

    </div>
    <div class="clearfix"></div>
    @if(!empty($number) && $error == null)
        <div class="row"><br>
            <hr>
            <br>
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Car Number</th>
                        <td>{{ $number->number }}</td>
                    </tr>
                    <tr>
                        <th>Car Brand</th>
                        <td>{{ $number->car_model->car_brand->name }}</td>
                    </tr>
                    <tr>
                        <th>Car Model</th>
                        <td>Model: {{ $number->car_model->description }} <br> Motor: {{ $number->car_model->motor }}
                        </td>
                    </tr>
                    <tr>
                        <th>Suitable tires</th>
                        <td>
                            @foreach($number->car_model->tires as $tire)
                                <p> {{$tire->description}} </p>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    @endif

    @if(!empty($error) && $error != null)
        <div class="danger">
            {!! $error !!}
        </div>
    @endif


@stop