<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stimulus extends Model
{
    use HasFactory;
    protected $table = 'stimuli';
    protected $fillable =[
        'user_id',
        'filing_years_id',
        'type',
        'received_date',
        'taxpayer_amount',
        'spouse_amount',
        'total',
    ];
}
