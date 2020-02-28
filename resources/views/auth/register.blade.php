@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('JOB PORTAL Registeration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ isset($user) ? route('user.update', $user->id) : route('register') }}" enctype='multipart/form-data'>
                        @csrf
                        @if (isset($user))
                        @method('PUT')
                        @endif        

                        {{-- Name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($user) ? $user->name : old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ isset($user) ? $user->address : old('address') }}" required autocomplete="address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Gender --}}
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input 
                                type="radio" 
                                name="gender" 
                                value="male" 
                                required="" 
                                @if ( old('gender', isset($user) ? $user->gender : '') == "male" )
                                checked="checked" 
                                @endif>
                                Male
                                <input 
                                type="radio" 
                                name="gender" 
                                value="female" 
                                required="" 
                                @if ( old('gender', isset($user) ? $user->gender : '') == "female" )
                                checked="checked" 
                                @endif>
                                Female
                                

                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Avatar --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>
                            <div class="col-md-6">
                                @if (isset($user))                                
                                <img src="{{ asset($user->avatar) }}" alt="Pic" width="100px" height="100px">
                                @endif
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" id="avatar">
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- User Type --}}
                        <div class="form-group row">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User_Type') }}</label>
                            <div class="col-md-6">
                                <select name="user_type" id="user_type" class="form-control">
                                    <option 
                                    value="{{ config('job.user_type.2') }}" 
                                    @if ( old('user_type', isset($user) ? $user->user_type : '') == config('job.user_type.2') )
                                    selected="selected" 
                                    @endif
                                    >
                                        {{ config('job.user_type.2') }}
                                    </option>

                                    <option 
                                    value="{{ config('job.user_type.1') }}" 
                                    @if ( old('user_type', isset($user) ? $user->user_type : '') == config('job.user_type.1') )
                                    selected="selected" 
                                    @endif
                                    >
                                    {{ config('job.user_type.1') }}
                                    </option>

                                    @if ( isset($user) && $user->user_type == config('job.user_type.0') )
                                    <option 
                                    value="{{ config('job.user_type.0') }}" 
                                    @if ( old('user_type', isset($user) ? $user->user_type : '') == config('job.user_type.0') )
                                    selected="selected" 
                                    @endif
                                    >
                                    {{ config('job.user_type.0') }}
                                    </option>
                                    @endif
                                </select>

                                @error('user_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @if (! isset($user))                       

                        {{-- Email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        @endif                      

                        {{-- DOB --}}
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ isset($user) ? $user->dob : ''  }}">

                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Experience --}}
                        <div class="form-group row">
                            <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

                            <div class="col-md-6">
                                <textarea name="experience" id="experience" cols="30" rows="5" class="form-control @error('experience') is-invalid @enderror">{{ isset($user) ? $user->experience : old('experience') }}</textarea>

                                @error('experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Bio --}}
                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <textarea name="bio" id="bio" cols="30" rows="5" class="form-control @error('bio') is-invalid @enderror">{{ isset($user) ? $user->bio : old('bio') }}</textarea>

                                @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Cover Letter --}}
                        <div class="form-group row">
                            <label for="cover_letter" class="col-md-4 col-form-label text-md-right">{{ __('Cover_Letter') }}</label>

                            <div class="col-md-6">
                                <textarea name="cover_letter" id="cover_letter" cols="30" rows="5" class="form-control @error('cover_letter') is-invalid @enderror">{{ isset($user) ? $user->cover_letter : old('cover_letter') }}</textarea>

                                @error('cover_letter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- file_name --}}
                        @if (isset($user))
                            <div class="form-group row">
                            <label for="file_name" class="col-md-4 col-form-label text-md-right">{{ __('Resume') }}</label>

                            <div class="col-md-6">                                
                                <input type="file" name="file_name" id="file_name" class="form-control @error('file_name') is-invalid @enderror" value="{{ isset($user) ? $user->file_name : old('file_name') }}">

                                @error('file_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        

                        {{-- Register Button --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @if (isset($user))
                                        {{ __('Update') }}
                                    @else
                                        {{ __('Register') }}
                                    @endif
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
