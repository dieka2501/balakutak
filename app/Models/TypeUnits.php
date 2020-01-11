<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TypeUnit extends Model 
{
    use SoftDeletes;
    public $table = 'type_units';

    protected $fillable = [
        'name'
    ];
}