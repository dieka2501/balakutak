<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model 
{
    use SoftDeletes;
    public $table = 'customers';

    protected $fillable = [
        'fullname',
        'username',
        'password',
        'email',
        'identity_number',
        'birth_date',
        'phone_number',
        'address',
        'city_id',
        'province_id',
        'subdisrict_id',
        'image',
        'licence_number',

    ];
}