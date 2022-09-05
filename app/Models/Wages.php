<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wages extends Model
{
    use HasFactory;
    protected $table = 'wages';
    protected $fillable =  [
        'filing_year_id',
        'user_id',
        'salary_income',
        'w2forms',
        'wage_country',
    ];

    // public TaxReturnFiles{
    //     return $this->hasMany(TaxReturns::class, 'id', 'wages_id');
    // }
}
