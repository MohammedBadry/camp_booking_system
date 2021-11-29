<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'title',
        'description',
        'capacity',
        'price',
        'trip_date',
        'category_id',
        'operator_id',
        'added_by',
        'image',
    ];

    public function scopeMine($query) {
        return $query->where('added_by', auth()->user()->id);
    }

    public function scopeOperated($query) {
        return $query->where('added_by', auth()->user()->id)->orWhere('operator_id', auth()->user()->id);
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function operator() {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function adder() {
        return $this->belongsTo(User::class, 'added_by');
    }
}
