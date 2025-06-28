<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Ticket;
use App\Models\Booking;

class BookingController extends Controller
{
    // Hiển thị danh sách vé đặt của người dùng hiện tại
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem vé đặt.');
        }

        $bookings = Booking::where('user_id', $user->id)->get();

        return view('bookings.index', compact('bookings'));
    }

    // Hiển thị form đặt vé
    public function create()
    {
        $movies = Movie::all();
        $cinemas = Cinema::all();
        $tickets = Ticket::all(); // Lấy danh sách tất cả vé (thường & VIP)

        return view('bookings.create', compact('movies', 'cinemas', 'tickets'));
    }

    // Xử lý đặt vé
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để đặt vé.');
        }

        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'cinema_id' => 'required|exists:cinemas,id',
            'ticket_id' => 'required|exists:tickets,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Lấy thông tin vé từ database
        $ticket = Ticket::find($request->ticket_id);
        if (!$ticket) {
            return redirect()->back()->with('error', 'Vé không tồn tại.');
        }

        // Kiểm tra loại vé: Thường hoặc VIP
        $ticketType = $ticket->type; // Ví dụ: "Thường" hoặc "VIP"

        // Tính tổng tiền theo loại vé
        $total_price = $ticket->price * $request->quantity;

        // Lưu đặt vé vào database
        Booking::create([
            'user_id' => $user->id,
            'movie_id' => $request->movie_id,
            'cinema_id' => $request->cinema_id,
            'ticket_id' => $request->ticket_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
            'ticket_type' => $ticketType, // Lưu loại vé vào bảng đặt vé
        ]);

        return redirect()->route('bookings.index')->with('success', 'Đặt vé thành công!');
    }
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status == 'Đã đặt') {
            $booking->status = 'Đã hủy';
            $booking->save();
            
            return redirect()->route('bookings.index')->with('success', 'Vé đã được hủy thành công!');
        }

        return redirect()->route('bookings.index')->with('error', 'Không thể hủy vé đã thanh toán.');
    }
    public function payment($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status == 'Đã đặt') {
            return redirect()->route('payment.gateway', ['booking_id' => $booking->id]);
        }

        return redirect()->route('bookings.index')->with('error', 'Vé đã thanh toán hoặc không hợp lệ.');
    }
}
