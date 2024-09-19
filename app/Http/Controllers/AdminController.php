<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function booking()
    {
        // Fetch data from the database using DB facade
        $data = DB::table('booking')->get();
    
        // Count the number of records
        $totalRecords = DB::table('booking')->count();

        // Pass data and total record count to the view
        return view('admin.booking', [
            'data' => $data,
            'totalRecords' => $totalRecords
        ]);
    }

}
