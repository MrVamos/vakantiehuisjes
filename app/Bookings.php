<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    // Table name
    protected $table = 'bookings';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps (default = true)
    public $timestamps = true;
}
