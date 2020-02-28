@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<h1>Recents Job</h1>
		<table class="table">
			<thead>
				<th></th>
				<th>Position</th>
				<th>Address</th>
				<th>Created_At</th>
				<th></th>
			</thead>
			<tbody>
				@foreach ($jobs as $job)
				<tr>
					<td>
						<img src="{{ asset($job->company->logo) }}" alt="Avatar" width="80" height="80">
					</td>
					<td>
						Position : {{ $job->position }}
						<p><i class="fa fa-clock text-info"></i> {{ $job->type }}</p>						
					</td>
					<td>
						<i class="fa fa-map-marked-alt text-info"></i> Address: {{ $job->company->address }}
					</td>
					<td>
						<i class="fa fa-history text-info"></i>
						{{ $job->created_at->diffforHumans() }}
					</td>
					<td>
						<a href="{{ route('job.show', ['id' => $job->id, 'slug' => $job->slug ]) }}" class="btn btn-success">More Details</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $jobs->links() }}
	</div>
</div>

@endsection