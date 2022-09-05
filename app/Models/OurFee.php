<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurFee extends Model
{
    use HasFactory;
    protected $table = 'our_fees';
    protected $fillable = [
        'user_id',
        'how_did_you_hear_about_firm',
        'seventy_five_plus_vat',
        'comment',
    ];
}
