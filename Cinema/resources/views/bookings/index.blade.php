@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Danh sách vé của bạn</h2>

    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Đặt vé mới</a>

    @if ($bookings->isEmpty())
        <p>Bạn chưa đặt vé nào.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Phim</th>
                    <th>Rạp</th>
                    <th>Loại vé</th>
                    <th>Số lượng vé</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->movie->title }}</td>
                        <td>{{ $booking->cinema->name }}</td>
                        <td>{{ $booking->ticket->type }}</td>
                        <td>{{ $booking->quantity }}</td>
                        <td>{{ number_format($booking->total_price, 0, ',', '.') }} VND</td>
                        <td>
                            @if($booking->status == 'Đã đặt')
                                <span class="badge bg-warning">Đã đặt</span>
                            @elseif($booking->status == 'Đã thanh toán')
                                <span class="badge bg-success">Đã thanh toán</span>
                            @else
                                <span class="badge bg-danger">Đã hủy</span>
                            @endif
                        </td>
                        <td>
                            @if ($booking->status == 'Đã đặt' && !$booking->paid)
                            <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hủy</button>
                                </form>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>Không thể hủy</button>
                            @endif
                        </td>
                        <td>
                            @if($booking->status == 'Đã đặt')
                                <a href="{{ route('payment.gateway', ['booking' => $booking->id]) }}" class="btn btn-primary">Thanh toán</a>
                            @elseif($booking->status == 'Đã thanh toán')
                                <button class="btn btn-success" disabled>Đã thanh toán</button>
                            @endif
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
