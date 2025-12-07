@extends('layouts.auth.app')

@section('content')
<div class="auth-container">

    <div class="auth-card">

        <!-- Logo -->
        <div class="auth-logo">
            <img src="{{ asset('assets-guest/images/login.png') }}" alt="logo">
        </div>

        <!-- Title -->
        <h1 class="auth-title">Welcome Back</h1>
        <p class="auth-subtitle">Sign in to continue exploring our platform</p>

        <!-- Error -->
        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('auth.login') }}" class="login-form">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       placeholder="yourname@email.com"
                       required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"
                       placeholder="Enter your password"
                       required>
            </div>

            <!-- Options -->
            <div class="login-options">
                <label class="remember">
                    <input type="checkbox" name="remember">
                    Remember me
                </label>

                <a href="#" class="forgot">Forgot password?</a>
            </div>

            <!-- Button -->
            <button type="submit" class="btn-login">
                Sign in
            </button>
        </form>

        <div class="login-divider">or continue with</div>

        <!-- Social -->
        <div class="social-buttons">
            <a href="#" class="btn-social google">G</a>
            <a href="#" class="btn-social facebook">F</a>
            <a href="#" class="btn-social twitter">T</a>
        </div>

        <!-- Register -->
        <p class="register-text">
            Don’t have an account?
            <a href="{{ route('user.create') }}" class="register-link">Create account</a>
        </p>
    </div>
</div>
@endsection