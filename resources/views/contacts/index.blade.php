@extends('layouts.index')

@section('content')
    <div class="container">
    	<div class="row">
    		 <div class="col-md-12">
    		 	<h3 class="page-heading bottom-indent">KUNDESERVICE - KONTAKT OS</h3>
    		 </div>
    	</div>
    </div>
    <div class="container">
    	<div class="row">
    		<!-- <div class="col-md-12">
          <h3 class="page-subheading">SEND EN BESKED</h3>
        </div> -->
        <div class="col-md-12">
    		{!! Form::open(['method' => 'POST', 'route' => ['contact.store'], 'files' => true, 'class' => 'contact-form-box clearfix' ]) !!}
        <fieldset>
        <div class="col-md-12">
          <h3 class="page-subheading">SEND EN BESKED</h3>
        </div>
    		<div class="col-md-3">
          <div class="form-group">
    			<label>Emne</label><br>
    			<select name="subject_id" class="form-control grey">
                    @foreach($contacts_subjects as $contact_subject)
                        <option value="{{ $contact_subject->id }}">{{ $contact_subject->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="email_from">E-mail adresse</label>
                <input type="email" id="email_from" name="email_from" class="form-control grey">
              </div>
              <div class="form-group">
                <label for="order_reference">Ordre reference</label>
                <input type="text" id="order_reference" name="order_reference" class="form-control grey">
              </div>
    		</div>
    		<div class="col-md-9">
    			<label>Besked</label><br>
    			<textarea name="message" class="form-control"></textarea>
    		</div>
        <div class="col-md-3">
        {!! Form::submit('Send', ['class' => 'button btn btn-default button-medium']) !!}
      </div>
      </fieldset>
    		{!! Form::close() !!}
    	</div>
      </div>
    </div>
@endsection
