@extends('layouts.main')

@section('title', 'Sign Up - Daily Life Stories')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-5">
            {{-- HEADER DAFTAR --}}
            <div class="text-center mb-5">
                <h2 style="font-family: 'Playfair Display', serif;" class="display-5">Join the Journey</h2>
                <p class="text-muted">Mulai bagikan momen-momen kecilmu hari ini.</p>
            </div>

            {{-- FORM REGISTER --}}
            <form method="POST" action="{{ route('register') }}" class="bg-white p-5 rounded-4 shadow-sm border-0">
                @csrf

                <div class="mb-4">
                    <label class="form-label small text-uppercase tracking-widest text-muted">Full Name</label>
                    <input type="text" name="name" class="form-control border-0 bg-light p-3 rounded-3" 
                           placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="text-danger small mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label small text-uppercase tracking-widest text-muted">Email Address</label>
                    <input type="email" name="email" class="form-control border-0 bg-light p-3 rounded-3" 
                           placeholder="nama@email.com" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger small mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label small text-uppercase tracking-widest text-muted">Password</label>
                    <input type="password" name="password" class="form-control border-0 bg-light p-3 rounded-3" 
                           placeholder="Minimal 8 karakter" required autocomplete="new-password">
                    @error('password')
                        <span class="text-danger small mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="form-label small text-uppercase tracking-widest text-muted">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control border-0 bg-light p-3 rounded-3" 
                           placeholder="Ulangi password" required>
                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn btn-dark w-100 p-3 rounded-pill shadow-sm mb-4 fw-bold">
                    Create Account
                </button>

                <div class="text-center">
                    <p class="small text-muted">Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-dark fw-bold text-decoration-none border-bottom border-dark">Sign In</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Styling khusus form agar terlihat melayang halus */
    .bg-light {
        background-color: #f8f9fa !important;
    }
    input::placeholder {
        font-size: 0.85rem;
        opacity: 0.5;
    }
    input:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25 darksalmon rgba(209, 90, 124, 0.25) !important;
        border: 1px solid var(--primary-color) !important;
    }
</style>
@endsection