<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'members_reference',
        'mobile',
        'email',
        'passport',
        'trip_id',
        'category_id',
        'trip_date',
        'coupon_id',
        'total_paid',
        'status',
        'notes',
        'period',
        'period_from',
        'period_to',
        'payment_status',
        'payment_id',
        'operator_id',
        'entry_id',
        'added_by',
    ];

    public function extras() {
        return $this->hasMany(BookingExtra::class);
    }

    public function scopePaid($query) {
        return $query->where('payment_status', 'paid');
    }

    public function scopeMine($query) {
        return $query->where('added_by', auth()->user()->id);
    }

    public function scopeOperated($query) {
        return $query->where('added_by', auth()->user()->id)->orWhere('operator_id', auth()->user()->id);
    }
    
    public function trip() {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
    
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function coupon() {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function operator() {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function entry() {
        return $this->belongsTo(User::class, 'entry_id');
    }

    public function adder() {
        return $this->belongsTo(User::class, 'added_by');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];
}
