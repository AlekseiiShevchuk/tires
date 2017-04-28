@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tire-products.title')</h3>
    
    {!! Form::model($tire_product, ['method' => 'PUT', 'route' => ['tire_products.update', $tire_product->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('brand_id', 'Brand*', ['class' => 'control-label']) !!}
                    {!! Form::select('brand_id', $brands, old('brand_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('brand_id'))
                        <p class="help-block">
                            {{ $errors->first('brand_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('size_id', 'Size*', ['class' => 'control-label']) !!}
                    {!! Form::select('size_id', $sizes, old('size_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('size_id'))
                        <p class="help-block">
                            {{ $errors->first('size_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', 'Price*', ['class' => 'control-label']) !!}
                    {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('special_price', 'Special price', ['class' => 'control-label']) !!}
                    {!! Form::text('special_price', old('special_price'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('special_price'))
                        <p class="help-block">
                            {{ $errors->first('special_price') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($tire_product->image_1)
                        <a href="{{ asset('uploads/'.$tire_product->image_1) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$tire_product->image_1) }}"></a>
                    @endif
                    {!! Form::label('image_1', 'Image 1', ['class' => 'control-label']) !!}
                    {!! Form::file('image_1', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_1_max_size', 8) !!}
                    {!! Form::hidden('image_1_max_width', 4000) !!}
                    {!! Form::hidden('image_1_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image_1'))
                        <p class="help-block">
                            {{ $errors->first('image_1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($tire_product->image_2)
                        <a href="{{ asset('uploads/'.$tire_product->image_2) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$tire_product->image_2) }}"></a>
                    @endif
                    {!! Form::label('image_2', 'Image 2', ['class' => 'control-label']) !!}
                    {!! Form::file('image_2', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_2_max_size', 8) !!}
                    {!! Form::hidden('image_2_max_width', 4000) !!}
                    {!! Form::hidden('image_2_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image_2'))
                        <p class="help-block">
                            {{ $errors->first('image_2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($tire_product->image_3)
                        <a href="{{ asset('uploads/'.$tire_product->image_3) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$tire_product->image_3) }}"></a>
                    @endif
                    {!! Form::label('image_3', 'Image 3', ['class' => 'control-label']) !!}
                    {!! Form::file('image_3', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_3_max_size', 8) !!}
                    {!! Form::hidden('image_3_max_width', 4000) !!}
                    {!! Form::hidden('image_3_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image_3'))
                        <p class="help-block">
                            {{ $errors->first('image_3') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($tire_product->image_4)
                        <a href="{{ asset('uploads/'.$tire_product->image_4) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$tire_product->image_4) }}"></a>
                    @endif
                    {!! Form::label('image_4', 'Image 4', ['class' => 'control-label']) !!}
                    {!! Form::file('image_4', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_4_max_size', 8) !!}
                    {!! Form::hidden('image_4_max_width', 4000) !!}
                    {!! Form::hidden('image_4_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image_4'))
                        <p class="help-block">
                            {{ $errors->first('image_4') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($tire_product->image_5)
                        <a href="{{ asset('uploads/'.$tire_product->image_5) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$tire_product->image_5) }}"></a>
                    @endif
                    {!! Form::label('image_5', 'Image 5', ['class' => 'control-label']) !!}
                    {!! Form::file('image_5', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_5_max_size', 8) !!}
                    {!! Form::hidden('image_5_max_width', 4000) !!}
                    {!! Form::hidden('image_5_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image_5'))
                        <p class="help-block">
                            {{ $errors->first('image_5') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($tire_product->image_6)
                        <a href="{{ asset('uploads/'.$tire_product->image_6) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$tire_product->image_6) }}"></a>
                    @endif
                    {!! Form::label('image_6', 'Image 6', ['class' => 'control-label']) !!}
                    {!! Form::file('image_6', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_6_max_size', 8) !!}
                    {!! Form::hidden('image_6_max_width', 4000) !!}
                    {!! Form::hidden('image_6_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image_6'))
                        <p class="help-block">
                            {{ $errors->first('image_6') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

@stop