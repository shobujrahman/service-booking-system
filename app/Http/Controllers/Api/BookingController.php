<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {

        // Alternatively, you can use:
        return Booking::where('user_id', Auth::id())->with(['user', 'service'])->get();

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'service_id'   => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        return Booking::create([
            'user_id'      => Auth::id(),
            'service_id'   => $data['service_id'],
            'booking_date' => $data['booking_date'],
            'status'       => 'pending',
        ]);
    }

}
