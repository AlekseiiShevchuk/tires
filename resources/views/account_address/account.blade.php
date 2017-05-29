@extends('layouts.index')

@section('content')
    <div class="container">
      <h1 class="page-heading bottom-indent">@lang('quickadmin.users.title')</h1>

    {!! Form::model($user, ['method' => 'PUT', 'route' => ['account-address.update', $user->id], 'class' => 'form-box']) !!}

    <h3 class="page-subheading">DINE PERSONLIGE OPLYSNINGER</h3>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('address', 'Address*', ['class' => 'control-label']) !!}
                {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('address'))
                    <p class="help-block">
                        {{ $errors->first('address') }}
                    </p>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Phone*', ['class' => 'control-label']) !!}
                {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
                    </p>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
            <div class="form-group">
              {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'button btn btn-default button-medium']) !!}
            </div>

            <input type="hidden" name="isForOrder" value="{{session('isForOrder') ? 1 : 0}}">
            
          </div>
        </div>
      </div>

    {!! Form::close() !!}
@stop
