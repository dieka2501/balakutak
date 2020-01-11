<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Driver extends Model 
{
    use SoftDeletes;
    public $table = 'drivers';

    protected $fillable = [
        'company_id',
        'fullname',
        'licence_number',
        'gender',
        'rating',
        'age'
    ];
}