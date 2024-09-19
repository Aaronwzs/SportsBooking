<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
    
            if ($usertype == 'user') {
                return view('home.index');
            } elseif ($usertype == 'admin') {
                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }
    }

    public function post(){
        return view("post");
    }


/**
     * Show the user homepage.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('home.index'); // Create this view
    }

    /**
     * Show the user's profile page.
     *
     * @return \Illuminate\View\View
     */
    public function product()
    {
        return view('booking.product'); // Create this view
    }

    /**
     * Show the user's bookings page.
     *
     * @return \Illuminate\View\View
     */
    public function promotion()
    {
        return view('deals.promotion'); // Create this view
    }

    public function book()
    {
        return view('booking.book'); // Create this view
    }

    
}
