@extends('layouts.index')

@section('content')

@section('title', 'Contact List')

<div class="d-flex justify-content-end mb-3"><a href="{{ route('contacts.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Create</a></div>

<div class="table-responsive">
	<table class="table table-bordered table-hover" style="background-color: white">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($contacts as $contact)

			<tr>
				<td>{{ $contact->id }}</td>
				<td>{{ $contact->name }}</td>
				<td>{{ $contact->contact }}</td>
				<td>{{ $contact->email }}</td>

				<td>
					<div class="d-flex gap-2">
						<a href="{{ route('contacts.show', [$contact->id]) }}" class="btn btn-info"><i class="fa fa-file"></i>Show</a>
						<a href="{{ route('contacts.edit', [$contact->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
						{!! Form::open(['method' => 'DELETE','route' => ['contacts.destroy', $contact->id]]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</div>
				</td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>

@stop