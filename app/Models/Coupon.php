<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'discount',
        'type',
        'expire_date',
        'status',
        'trip_type',
        'added_by',
    ];

    public function scopeMine($query) {
        return $query->where('added_by', auth()->user()->id);
    }

    public function scopeOperated($query) {
        return $query->where('added_by', auth()->user()->id)->orWhere('operator_id', auth()->user()->id);
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
