<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function bookings()
    {
        if (! Auth::user()->is_admin) {
            abort(403);
        }
        return Booking::with('user', 'service')->get();
    }
}
