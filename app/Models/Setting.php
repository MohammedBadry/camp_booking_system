<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'about',
        'terms',
        'king_reserve',
        'facebook',
        'twitter',
        'instaram',
        'snapchat',
        'support_email',
    ];
}
