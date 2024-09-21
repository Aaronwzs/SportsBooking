<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    use HasFactory;

    protected $table = 'login_activities';

    protected $fillable = [
        'user_id',
        'ip_address',
        'login_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
