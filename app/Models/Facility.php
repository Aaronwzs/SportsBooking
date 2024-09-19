<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities'; // Ensure this matches your database table name
    protected $fillable = ['facility_name', 'facility_id', 'status']; // Add fields as necessary
}