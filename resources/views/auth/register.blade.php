@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <form action="{{ route('register.request') }}" method="post">
        @csrf
        <input type="hidden" name="role" value="{{ $role ?? 'user' }}">

        <x-input-group label="Name" type="text" name="name" id="name" placeholder="Enter your name"
            value="{{ old('name') }}" required />

        <x-input-group label="Email" type="email" name="email" id="email" placeholder="Enter your email"
            value="{{ old('email') }}" required />

        <x-input-group label="Password" type="password" name="password" id="password" placeholder="Enter your password"
            required />

        <div class="row">
            <div class="col-12">
                <x-button type="submit" class="btn btn-primary btn-block" label="Sign In" />
            </div>
        </div>
    </form>

    <p class="my-2">
        <a href="{{ route('login') }}" class="text-center">{{ __('I already have a account') }}</a>
    </p>
@endsection
