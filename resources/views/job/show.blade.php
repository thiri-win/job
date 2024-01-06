@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">{{ $job->title }}</h6>
            <p class="card-text">{{ $job->user->name }} posted</p>
            <p class="card-text">{{ $job->info }}</p>
            <img src="{{ Storage::url($job->photo) }}" alt="" width="200">
        </div>
        @auth    
        <div class="card-footer">
            <ul>
                @foreach ($job->users as $user)
                    <li>{{ $user->name }} applied.</li> 
                @endforeach
            </ul>
            <a href="{{ route('jobs.apply', ['job' => $job]) }}" class="{{ $job->users->contains(auth()->user()) ? 'text-danger' : '' }}">
                {{ $job->users->contains(auth()->user()) ? 'Delete Application' : 'Apply' }}
            </a>
            @can('update',$job)
            <a href="{{ route('jobs.edit', ['job' => $job]) }}">Edit</a>
            <form action="{{ route('jobs.destroy', ['job' => $job]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure that you want to delete this offer?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn text-danger">Delete</button>
            </form>
            @endcan
        </div>
        @endauth
    </div>
@endsection