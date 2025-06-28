@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow p-4" style="width: 400px;">
        <h3 class="text-center mb-3">Đăng nhập</h3>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            </div>
        </form>

        <div class="mt-3 text-center">
            <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký ngay</a>
        </div>
    </div>
</div>
@endsection