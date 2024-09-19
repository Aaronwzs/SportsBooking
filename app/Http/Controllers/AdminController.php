<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AdminController extends Controller
{
  

    public function manageUsers()
    {
        return view('admin.users'); // Create this view
    }

    public function reports()
    {
        return view('admin.reports'); // Create this view
    }
}
