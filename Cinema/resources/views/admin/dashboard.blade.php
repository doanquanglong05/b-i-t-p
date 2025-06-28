@extends('layouts.app')

@section('content')
    <h2>Chào mừng Admin, {{ Auth::user()->name }}</h2>
    <p>Đây là trang quản trị.</p>
@endsection
