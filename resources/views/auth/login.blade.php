@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <form action="{{ route('login.request') }}" method="post">
        @csrf

        <x-input-group label="Email" type="email" name="email" id="email" placeholder="Enter your email"
            value="{{ old('email') }}" required />

        <x-input-group label="Password" type="password" name="password" id="password" placeholder="Enter your password" required />

        <div class="row">
            <div class="col-12 mb-2">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="col-12">
                <x-button type="submit" class="btn btn-primary btn-block" label="Sign In" />
            </div>

        </div>
    </form>

    <div class="divider_section">
        <span>Sign up</span>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('register', 'admin') }}" class="text-center">As an admin</a>
        <a href="{{ route('register', 'user') }}" class="text-center">As a user</a>
    </div>
@endsection
