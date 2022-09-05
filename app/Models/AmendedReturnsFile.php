<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmendedReturnsFile extends Model
{
    use HasFactory;
    protected $table = 'amended_returns_files';
    protected $fillable = [
        'filings_id',
        'file'
    ];
}
