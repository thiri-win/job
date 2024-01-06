@extends('layouts.app')
@section('content')
    @foreach ($jobs as $job)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $job->title }}</h6>
                <p class="card-text">{{ $job->info }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('jobs.show', ['job' => $job]) }}">Details</a>
                <a href="{{ route('jobs.apply', ['job' => $job]) }}">
                    {{ $job->users->contains(auth()->user()) ? 'Delete Application' : 'Apply' }}
                </a>
                <p>{{ $job->users->count() == 0 ? '' :  $job->users->count(). ' applied this opportunity'}}</p>
            </div>
        </div>
    @endforeach
    {{ $jobs->links() }}
@endsection