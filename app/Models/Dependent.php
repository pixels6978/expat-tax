<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;
    protected $table = 'dependents';
    protected $fillable =[
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'ssn',
        'ssn_date',
        'birth_date',
        'relationship',
        'naturalized',
        'year',
    ];
}
