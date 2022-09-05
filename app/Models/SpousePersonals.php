<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpousePersonals extends Model
{
    use HasFactory;
    protected $table = 'spouse_personals';
    protected $fillable =[
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'occupation',
        'us_citizen',
        'ssn',
        'ss_card',
    ];

}
