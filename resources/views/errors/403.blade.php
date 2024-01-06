{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}

@extends('layouts.app')
@section('content')
    <h4 class="my-5 text-center">Sorry. You are not authorize to access this page.</h4>
@endsection