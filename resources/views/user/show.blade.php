@extends('layouts.app')

@section('content')
<div class="container">
	<a href="{{ route('user.edit', $user->id) }}" class="btn btn-success d-block">Edit Your Profile</a><br>
	<div class="card mb-3" >
		<div class="row">
			<div class="col-md-2">
				<img src="{{ asset($user->avatar) }}" class="company-logo" alt="Pic" width="200px">
			</div>
			<div class="col-md-10">
				<div class="card-body">
					<div class="container">

						<h5 class="card-text m-3">{{ $user->name }}</h5>

						<span class="text-muted col-md-2">Email : </span>
						<p class="card-text col-md-10">{{ $user->email }}</p>

						<span class="text-muted col-md-2">Address : </span>
						<p class="card-text col-md-10">{{ $user->address }}</p>

						<span class="text-muted col-md-2">Gender</span>
						<p class="card-text col-md-10">{{ $user->gender }}</p>

						<span class="text-muted col-md-2">DOB : </span>
						<p class="card-text col-md-10">{{ $user->dob }}</p>


						<span class="text-muted col-md-2">Experience : </span>
						<p class="card-text col-md-10">{{ $user->experience }}</p>

						<span class="text-muted col-md-2">Bio : </span>
						<p class="card-text col-md-10">{{ $user->bio }}</p>

						<span class="text-muted col-md-2">Cover_letter : </span>
						<p class="card-text col-md-10">{{ $user->cover_letter }}</p>

						<span class="text-muted col-md-2">Resume : </span>
						<p class="card-text col-md-10"></p>
						@if (isset($user->resume))						
						<p class="card-text col-md-10"><a href="{{ Storage::url($user->resume->file_name) }}">Download Resume</a></p>
						@else
						<p class="card-text col-md-10">Please Uploade Your Resume.</p>
						@endif


						<span class="text-muted col-md-2">Member On : </span>
						<p class="card-text col-md-10">{{ $user->created_at->diffForHumans() }}</p>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection