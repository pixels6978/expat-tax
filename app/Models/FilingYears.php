<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilingYears extends Model
{
    use HasFactory;

    protected $table = 'filing_years';
    protected $fillable = [
        'user_id',
        'year',
        'status'
    ];


    public function Filing(){
        return $this->belongsTo(Filing::class, 'id', 'filing_years_id');
    }
}
