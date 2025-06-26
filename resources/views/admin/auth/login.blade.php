@extends('admin.layout.authMaster')

@section('content')
<div class="container mt-5">
    <div class="login-sec w-50 m-auto">
        <h2>Giriş Yap</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Hata!</strong> Lütfen bilgilerinizi kontrol edin.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>E-posta</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label>Şifre</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Beni Hatırla</label>
        </div>

        <button type="submit" class="btn btn-primary">Giriş Yap</button>
        <a href="{{ route('password.request') }}" class="btn btn-warning">Şifremi Unuttum</a>

    </form>
    </div>
</div>
@endsection
