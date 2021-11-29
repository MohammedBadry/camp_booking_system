<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CampExtra extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'camp_id',
        'name',
        'price',
        'quantity',
    ];

    public function camp() {
        return $this->belongsTo(Trip::class, 'camp_id');
    }
}
