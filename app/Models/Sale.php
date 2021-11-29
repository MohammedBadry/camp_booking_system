<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'booking_id',
        'members_reference',
        'name',
        'email',
        'mobile',
        'passport',
        'booking_type',
        'trip_code',
        'trip_category',
        'trip_type',
        'trip_date',
        'trip_price',
        'operator',
        'total_paid',
        'notes',
        'period',
        'period_from',
        'period_to',
        'added_by',
        'payment_status',
];

    public function scopePaid($query) {
        return $query->where('payment_status', 'paid');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
