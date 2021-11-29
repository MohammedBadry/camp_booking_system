<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingExtra extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'booking_id',
        'extra_id',
    ];

    public function booking() {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function extra() {
        return $this->belongsTo(CampExtra::class, 'extra_id');
    }
}
