@extends('layouts.app')
@section('content')
    <form action="{{ isset($job) ? route('jobs.update', ['job' => $job]) : route('jobs.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($job)
            @method('PUT')
        @endisset
        <div class="mb-2">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') ?? isset($job) ? $job->title : "" }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="info">Detail Information</label>
            <textarea name="info" id="info" cols="30" rows="5" class="form-control">{{ old('info') ?? isset($job) ? $job->info : "" }}</textarea>
            @error('info')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @error('photo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <button type="submit" class="btn {{ isset($job) ? "btn-warning" : "btn-primary" }} btn-sm">
                {{ isset($job) ? "Update" : "Create" }}
            </button>
        </div>
    </form>
@endsection