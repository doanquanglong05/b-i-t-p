<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
