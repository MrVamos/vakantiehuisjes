<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookHouse extends Model
{
    // Table name
    protected $table = 'houses';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps (default = true)
    public $timestamps = true;

}
