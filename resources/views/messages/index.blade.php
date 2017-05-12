@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.messages.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($messages) > 0 ? 'datatable' : '' }} @can('messages_access') @endcan">
                <thead>
                    <tr>
                        <th>@lang('quickadmin.messages.fields.from')</th>
                        <th>@lang('quickadmin.messages.fields.email')</th>
                        <th>@lang('quickadmin.messages.fields.subject')</th>
                        <th>@lang('quickadmin.messages.fields.order_reference')</th>
                        <th>@lang('quickadmin.messages.fields.message')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($messages) > 0)
                        @foreach ($messages as $message)
                            <tr data-entry-id="{{ $message->id }}">
                                
                                <td>{{ !is_null($message->user_id) ? $message->user->name : 'Guest' }}</td>
                                <td>{{ $message->email_from }}</td>
                                <td>{{ $message->subject->name }}</td>
                                <td>{{ $message->order_reference }}</td>
                                <td>{!! mb_substr($message->message, 0, 10) !!}...</td>
                                <td>
                                    @can('messages_access')
                                    <a href="{{ route('messages.show',[$message->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="16">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
@endsection