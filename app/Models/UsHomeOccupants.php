<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsHomeOccupants extends Model
{
    use HasFactory;
    protected $table = 'us_home_occupants';
    protected $fillable = [
        'user_id',
        'filing_years_id',
        'name',
        'relationship',
        'taxpayer_or_spouse',
    ];
}
