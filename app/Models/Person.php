<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  protected $fillable = [
    'full_name',
    'id_card_number',
    'age',
    'date_of_birth',
    'gender',
    'address',
    'contact_no_1',
    'contact_no_2',
    'district',
    'ds_division',
    'gn_division'
];
}
