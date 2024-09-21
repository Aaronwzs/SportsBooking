<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\LoginActivity;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;

class LogLoginActivity
{
    public function handle(Login $event)
    {
        LoginActivity::create([
            'user_id' => $event->user->id,
            'ip_address' => Request::ip(),
            'login_at' => Carbon::now(),
        ]);
    }
}
