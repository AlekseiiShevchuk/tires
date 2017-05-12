@extends('layouts.index')

@section('content')
    <div class="container">
    	<div class="row">
    		 <div class="col-md-6">
    		 	<h3 class="content-header-3">KUNDESERVICE - KONTAKT OS</h3>	
    		 </div>
    	</div>
    </div>
    <div class="container">
    	<div class="row">
    		<div class="col-md-12"><h3 class="content-header-3">SEND EN BESKED</h3></div>
    		{!! Form::open(['method' => 'POST', 'route' => ['contact.store'], 'files' => true,]) !!}
    		<div class="col-md-4">
    			<label>Emne</label><br>
    			<select name="subject_id" class="send-select">
                    @foreach($contacts_subjects as $contact_subject)
                        <option value="{{ $contact_subject->id }}">{{ $contact_subject->name }}</option>
                    @endforeach
                </select>
                <label>E-mail adresse</label><br>
                <input type="email" name="email_from" class="send-text">
                <label>Ordre reference</label><br>
                <input type="text" name="order_reference" class="send-text">
                <hr>
    			{!! Form::submit('Send', ['class' => 'send-btn']) !!}
    		</div>
    		<div class="col-md-8">
    			<label>Besked</label><br>
    			<textarea name="message" class="send-message"></textarea>
    		</div>
    		{!! Form::close() !!}
    	</div>
    </div>
    <hr>
@endsection
