@extends('layouts.index')

@section('content')
<div class="container">
    <h1 class="page-heading">@lang('quickadmin.users.title')</h1>

    {!! Form::model($user, ['method' => 'PUT', 'route' => ['account.update', $user->id], 'class' => 'form-box']) !!}

    <h3 class="page-subheading">DINE PERSONLIGE OPLYSNINGER</h3>

    <!-- <div class="panel panel-default"> -->
        <!-- <div class="panel-heading">
            DINE PERSONLIGE OPLYSNINGER
        </div> -->

        <!-- <div class="panel-body"> -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('first_name', 'First Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('first_name'))
                        <p class="help-block">
                            {{ $errors->first('first_name') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Last Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('last_name'))
                        <p class="help-block">
                            {{ $errors->first('last_name') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
              </div>
              <div class="col-md-6">
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
                    {!! Form::label('new_password', 'New Password', ['class' => 'control-label']) !!}
                    {!! Form::password('new_password', ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('new_password'))
                        <p class="help-block">
                            {{ $errors->first('new_password') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('new_password_confirmation', 'Confirm New Password', ['class' => 'control-label']) !!}
                    {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('new_password_confirmation'))
                        <p class="help-block">
                            {{ $errors->first('new_password_confirmation') }}
                        </p>
                    @endif
                </div>
                <div class="form-group" style="margin-top: 27px;">
                  {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'button btn btn-default button-medium']) !!}
                </div>
              </div>
            </div>
    {!! Form::close() !!}
  </div>
@stop
