@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="company-profile">
			<img src="{{ asset($company->cover_photo) }}" alt="Pic" class="company-cover">
			<div class="company-detail row align-items-center">
				<div class="col-md-4">
					<img src="{{ asset($company->logo) }}" alt="Pic" class="company-logo">
				</div>
				<div class="col-md-8">					
					<h2 class="col-md-8 p-0"><strong>{{ $company->cname }}</strong></h2>
					<p><strong>Slogan</strong> - {{ $company->slogan }}</p>
					<p><strong>Address</strong> - {{$company->address}}</p>
					<p><strong>Phone</strong> - {{ $company->phone }}</p>
					<p><strong>Website</strong> - {{ $company->website }}</p>
				</div>
			</div>
		</div>
		<br>
		<h1>Avaliable Jobs</h1>
		<table class="table">
			<thead>
				<th></th>
				<th>Position</th>
				<th>Address</th>
				<th>Created_At</th>
				<th></th>
			</thead>
			<tbody>
				@foreach ($company->jobs as $job)
				<tr>
					<td>
						<img src="https://i.picsum.photos/id/1012/200/300.jpg" alt="Avatar" width="80" height="80">
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
						<a href="#" class="btn btn-success">Apply</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection