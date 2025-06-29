@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard</h2>
    
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('movies.index') }}" class="btn btn-primary btn-block">Quản lý Phim</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('cinemas.index') }}" class="btn btn-secondary btn-block">Quản lý Rạp Chiếu</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('bookings.index') }}" class="btn btn-success btn-block">Quản lý Đặt Vé</a>
        </div>
    </div>
</div>
@endsection
