<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model 
{
    use SoftDeletes;
    public $table = 'units';

    protected $fillable = [
        'type_id', 
        'brand_id',
        'rent_company_id',
        'unit_plat_number',
        'unit_color',
        'unit_capacity'

    ];
}