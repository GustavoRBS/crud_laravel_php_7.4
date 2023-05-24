@extends('layouts.index')

@section('content')

@section('title', 'Edit contact')

@if($errors->any())
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	{{ $error }} <br>
	@endforeach
</div>
@endif

<div class="container">
	<div class="row">

		{{ Form::model($contact, array('route' => array('contacts.update', $contact->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('name', 'Name', ['class'=>'form-label']) }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('contact', 'Contact', ['class'=>'form-label']) }}
			{{ Form::text('contact', null, array('class' => 'form-control', 'maxlength' => '9')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('email', 'Email', ['class'=>'form-label']) }}
			{{ Form::text('email', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

		{{ Form::close() }}

	</div>
</div>

@stop