<tr data-index="{{ $index }}">
    <td>{!! Form::text('car_numbers['.$index.'][number]', old('car_numbers['.$index.'][number]', isset($field) ? $field->number: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>