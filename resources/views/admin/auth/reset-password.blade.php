@extends('admin.layout.authMaster')

@section('content')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">Yeni Şifre Belirle</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        {{-- Gizli alan: Token --}}
                        <input type="hidden" name="token" value="{{ request()->route('token') }}">

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">E-Posta</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', request()->email) }}" required autofocus>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Yeni Şifre --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Yeni Şifre</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" required>

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Şifre Tekrar --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Şifre (Tekrar)</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Şifreyi Sıfırla</button>
                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}">Girişe Dön</a>
            </div>

        </div>
    </div>
</div>
@endsection
