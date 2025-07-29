<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory; // ✅ THIS IS REQUIRED

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
