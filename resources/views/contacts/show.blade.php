@extends('layouts.index')

@section('content')

@section('title', 'Contact info')

<div class="table-responsive">
	<table class="table table-bordered" style="background-color: white">
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
			<tr>
				<td>{{ $contact->id }}</td>
				<td>{{ $contact->name }}</td>
				<td>{{ $contact->contact }}</td>
				<td>{{ $contact->email }}</td>

				<td>
					<div class="d-flex gap-2">
						<a href="{{ route('contacts.show', [$contact->id]) }}" class="btn btn-info">Show</a>
						<a href="{{ route('contacts.edit', [$contact->id]) }}" class="btn btn-primary">Edit</a>
						{!! Form::open(['method' => 'DELETE','route' => ['contacts.destroy', $contact->id]]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>

@stop