<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RentCompany extends Model 
{
    use SoftDeletes;
    public $table = 'rent_companies';

    protected $fillable = [
        'user_id', 
        'company_names',
        'company_address',
        'company_phone',
        'company_email',
        'company_twitter',
        'company_facebook',
        'company_instagram',

    ];
}