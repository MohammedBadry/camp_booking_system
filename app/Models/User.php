<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\CompanyRole;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'name',
        'email',
        'mobile',
        'password',
        'role',
        'details',
        'image',
        'added_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeMine($query) {
        return $query->where('added_by', auth()->user()->id);
    }

    public function scopeOperated($query) {
        return $query->where('added_by', auth()->user()->id)->orWhere('operator_id', auth()->user()->id);
    }
    
    public function isAdmin() {
        return $this->role === 'admin';
    }
 
    public function isCompany() {
        return $this->role === 'company';
    }
 
    public function isOperator() {
        return $this->role === 'operator';
    }

    public function isEntry() {
        return $this->role === 'entry';
    }

    public function adder() {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function roles() {
        return $this->hasMany(CompanyRole::class);
    }
}
