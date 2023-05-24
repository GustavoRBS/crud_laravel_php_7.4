@extends('layouts.index')

@section('content')

@section('title', 'Create contact')

@if($errors->any())
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	{{ $error }} <br>
	@endforeach
</div>
@endif

{!! Form::open(['route' => 'contacts.store']) !!}

<div class="container">
	<div class="row">
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
			{{ Form::email('email', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

		{{ Form::close() }}

	</div>
</div>

@stop