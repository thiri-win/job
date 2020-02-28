@extends('layouts.app')

@section('content')

<div class="container">
	
<h2>List of Seekers</h2>
<table class="table">
	<thead>
		<th></th>
		<th>Name</th>
		<th>Email</th>
		<th></th>
	</thead>
	<tbody>
		@foreach ($users as $user)
			<tr>
				<td>PIC</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					<a href="{{ route('user.show', $user) }}" class="btn btn-info">Profile</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
</div>

@endsection