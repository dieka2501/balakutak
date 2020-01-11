<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RentUnit extends Model 
{
    use SoftDeletes;
    public $table = 'rent_units';

    protected $fillable = [
        'code',
        'unit_id',
        'company_id',
        'customer_id',
        'time_start',
        'time_end',
        'price_per_day',
        'image',
        'is_with_driver',
        'driver_id'
    ];
}