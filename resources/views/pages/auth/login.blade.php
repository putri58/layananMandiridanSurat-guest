@extends('layouts.auth.app')

@section('content')
<div class="auth-container" style="background-image: url('{{ asset('assets-guest/images/surat.jpg') }}');">

    <div class="auth-card">

        <!-- Logo -->
        <div class="auth-logo">
            <img src="{{ asset('assets-guest/images/login.png') }}" alt="logo">
        </div>

        <!-- Title -->
        <h1 class="auth-title">Welcome</h1>
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
            Don't have an account?
            <a href="{{ route('user.create') }}" class="register-link">Create account</a>
        </p>
    </div>
</div>

<style>
/* Background dengan gambar */
.auth-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url('{{ asset('assets-guest/images/auth-bg.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
}

/* Overlay untuk readability */
.auth-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.85) 0%, rgba(16, 185, 129, 0.85) 100%);
    z-index: 0;
}

.auth-card {
    position: relative;
    z-index: 1;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 40px;
    width: 100%;
    max-width: 420px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Jika ingin gambar yang berbeda */
.auth-container[style*="background-image"] .auth-card {
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
}

/* Responsive */
@media (max-width: 768px) {
    .auth-container {
        background-image: url('{{ asset('assets-guest/images/auth-bg-mobile.jpg') }}');
    }
    
    .auth-card {
        margin: 20px;
        padding: 30px 25px;
    }
}
</style>

{{-- Script untuk dynamic background --}}
<script>
// Jika ingin multiple background images
const backgrounds = [
    "{{ asset('assets-guest/images/bg-1.jpg') }}",
    "{{ asset('assets-guest/images/bg-2.jpg') }}",
    "{{ asset('assets-guest/images/bg-3.jpg') }}",
    "{{ asset('assets-guest/images/bg-4.jpg') }}"
];

// Pilih random background (opsional)
// document.querySelector('.auth-container').style.backgroundImage = `url('${backgrounds[Math.floor(Math.random() * backgrounds.length)]}')`;
</script>

@endsection