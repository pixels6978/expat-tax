<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpouseItin extends Model
{
    use HasFactory;
    protected $table = 'spouse_itins';
    protected $fillable = [
        'user_id',
        'itin',
        'itin_number',
        'apply_itin',
        'passport',
        'driver_license',
        'birth_cert',
        'foreign_id',
        'non_resident_tax',
    ];
}
