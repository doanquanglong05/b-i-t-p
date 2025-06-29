@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Danh Sách Rạp Chiếu Phim</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Tên Rạp</th>
                <th>Địa Chỉ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cinemas as $index => $cinema)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $cinema->name }}</td>
                    <td>{{ $cinema->location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
