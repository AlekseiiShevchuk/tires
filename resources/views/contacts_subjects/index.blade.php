@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contacts-subjects.title')</h3>
    @can('contact_subject_create')
    <p>
        <a href="{{ route('contacts-subjects.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($contacts_subjects) > 0 ? 'datatable' : '' }} @can('contact_subject_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('contact_subject_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.contacts-subjects.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($contacts_subjects) > 0)
                        @foreach ($contacts_subjects as $contact_subject)
                            <tr data-entry-id="{{ $contact_subject->id }}">
                                @can('contact_subject_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $contact_subject->name }}</td>
                                <td>
                                    @can('contact_subject_edit')
                                    <a href="{{ route('contacts-subjects.edit',[$contact_subject->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('contact_subject_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['contacts-subjects.destroy', $contact_subject->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
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