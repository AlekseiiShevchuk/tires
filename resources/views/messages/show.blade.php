@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.messages.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <label>From:</label>
                    <p>{{ !is_null($message->user_id) ? $message->user->name : 'Guest' }}</p>
                    <label>Email:</label>
                    <p>{{ $message->email_from }}</p>
                    <label>Subject:</label>
                    <p>{{ $message->subject->name }}</p>
                    <label>Order Reference:</label>
                    <p>{{ $message->order_reference }}</p>
                </div>
                <div class="col-md-6">
                    <label>Message:</label>
                    <p>{!! $message->message !!}</p>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('messages.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop