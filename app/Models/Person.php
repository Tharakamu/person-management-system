<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'full_name',
        'age',
        'date_of_birth',
        'address',
        'contact_no_1',
        'contact_no_2',
        'district',
        'ds_division',
        'gn_division',
        'gs_wasam'
    ];
}
