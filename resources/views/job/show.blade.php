@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ $job->title }}</div>
				<div class="card-body">
					<p>
						<h4><em>Description</em></h4>
						{{ $job->description }}
					</p>
					<p>
						<h4><em>Responsibility</em></h4>
						{{ $job->roles }}
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Short Info</div>
				<div class="card-body">					
					<p>Company : 
						<a href="{{ route('company.show', ['id' => $job->company->id, 'name' => $job->company->slug]) }}" class="text-decoration-none">
							{{ $job->company->cname }}
						</a>
					</p>					
					<p>Address : {{ $job->company->address }}</p>
					<p>Employment Type : {{ $job->type }}</p>
					<p>Position : {{ $job->position }}</p>
					<p>Date : {{ $job->created_at->diffForHumans() }}</p>
				</div>
				@if (auth()->user() && auth()->user()->user_type = 'seeker')
				<div class="card-footer">
					<a href="#" class="btn btn-success d-block">Apply</a>
				</div>
				@endif				
			</div>
		</div>
	</div>
</div>

@endsection