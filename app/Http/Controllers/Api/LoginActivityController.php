<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\LoginActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginActivityController extends Controller
{
    // Fetch all users for the dropdown
    public function getUsers()
    {
        return response()->json(User::all());
    }

    // Fetch login activities for the selected user
    public function getUserLoginRecords($user_id)
    {
        $loginActivities = LoginActivity::where('user_id', $user_id)->get();
        return response()->json($loginActivities);
    }
}
