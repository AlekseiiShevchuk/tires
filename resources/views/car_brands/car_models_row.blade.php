<tr data-index="{{ $index }}">
    <td>{!! Form::text('car_models['.$index.'][description]', old('car_models['.$index.'][description]', isset($field) ? $field->description: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('car_models['.$index.'][motor]', old('car_models['.$index.'][motor]', isset($field) ? $field->motor: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>