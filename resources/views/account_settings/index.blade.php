@extends('layouts.index')

@section('content')
    <ul>
        <li><a href="{{ action('AccountAddressController@index') }}">Address settings</a></li>
        <li><a href="{{ action('AccountController@index') }}">Account settings</a></li>
    </ul>
@stop

