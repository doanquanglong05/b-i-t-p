<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class PaymentController extends Controller
{
    public function processPayment($booking)
    {
        $booking = Booking::findOrFail($booking);

        if ($booking->status != 'Đã đặt') {
            return redirect()->route('bookings.index')->with('error', 'Vé không hợp lệ để thanh toán.');
        }

        return redirect()->route('bookings.index')->with('success', 'Chuyển hướng đến cổng thanh toán.');
    }
}
