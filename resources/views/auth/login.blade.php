@extends('layout')

@section('title', 'Admin Login')

@section('content')
<section class="d-flex align-items-center justify-content-center min-vh-100 position-relative marbled-effect">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card border-0 shadow-lg admin-card" style="border-radius: 20px; overflow: hidden;">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="bi bi-shield-lock display-4" style="color: var(--current-gold);"></i>
                            <h2 class="fw-bold mt-3" style="color: var(--current-gold); font-family: var(--font-primary);">Admin Access</h2>
                            <p class="small" style="color: var(--current-text-light);">Please enter your credentials to continue.</p>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger py-2" role="alert" style="font-size: 0.9rem;">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <input type="hidden" name="theme" id="loginThemeInput" value="solice">
                            
                            <div class="mb-3">
                                <label for="email" class="form-label small text-uppercase fw-bold" style="color: var(--current-text-light); letter-spacing: 1px;">Email Address</label>
                                <input type="email" class="form-control py-2" id="email" name="email" value="{{ old('email') }}" required autofocus 
                                    style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label small text-uppercase fw-bold" style="color: var(--current-text-light); letter-spacing: 1px;">Password</label>
                                <input type="password" class="form-control py-2" id="password" name="password" required
                                    style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold text-uppercase" style="letter-spacing: 1px;">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="text-decoration-none small" style="color: var(--current-text-light);">
                        <i class="bi bi-arrow-left me-1"></i> Return to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Admin Card Styling Reuse */
    .admin-card {
        background: var(--current-secondary);
    }
    
    /* Force Dark Form Styles for Vault Theme */
    [data-theme="vault"] .form-control {
        background-color: #1a1a1c !important;
        border-color: #333 !important;
        color: #e8e9eb !important;
    }

    [data-theme="vault"] .form-control:focus {
        background-color: #222 !important;
        border-color: var(--current-gold) !important;
        color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(197, 165, 114, 0.25) !important;
    }
    
    /* Button Styling */
    .btn-primary {
        background: var(--current-gold);
        color: var(--current-primary);
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background: var(--current-gold) !important;
        color: var(--current-primary) !important;
        filter: brightness(1.1);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px var(--current-shadow);
    }
</style>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeInput = document.getElementById('loginThemeInput');
        const currentTheme = localStorage.getItem('theme') || 'solice';
        if (themeInput) {
            themeInput.value = currentTheme;
        }
    });
</script>
