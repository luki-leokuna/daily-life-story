@extends('layouts.main')

@section('title', 'Sign In - Daily Life Stories')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="col-md-4">
            <div class="text-center mb-5">
                <h2 style="font-family: 'Playfair Display', serif;">Welcome Back</h2>
                <p class="text-muted small">Silahkan masuk untuk mengelola ceritamu.</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label small text-uppercase tracking-widest text-muted">Email Address</label>
                    <input type="email" name="email" class="form-control border-0 bg-white shadow-sm p-3 rounded-3" required autofocus>
                </div>

                <div class="mb-4">
                    <label class="form-label small text-uppercase tracking-widest text-muted">Password</label>
                    <input type="password" name="password" class="form-control border-0 bg-white shadow-sm p-3 rounded-3" required>
                </div>

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label small text-muted" for="remember_me">Ingat saya</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark w-100 p-3 rounded-pill shadow-sm mb-4">
                    Sign In
                </button>

                <div class="text-center">
                    <p class="small text-muted">Belum punya akun? <a href="{{ route('register') }}" class="text-dark fw-bold text-decoration-none border-bottom border-dark">Daftar sekarang</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection