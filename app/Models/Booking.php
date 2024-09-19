<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Optionally specify the table name if it doesn't follow Laravel's convention
    protected $table = 'booking';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'id';

    const UPDATED_AT = 'date_updated';
    const CREATED_AT = 'date_created';
    
    // If you want to use timestamps
    public $timestamps = true;

    // Fillable attributes
    protected $fillable = [
        'ref_code',
        'user_id',
        'facility_id',
        'booking_date',
        'time_from',
        'time_to',
        'status',
        'date_created',
        'date_updated',
    ];
}