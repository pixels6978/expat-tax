<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxDeductionsTuition extends Model
{
    use HasFactory;
    protected $table = 'tax_deductions_tuitions';
    protected $fillable = [
        'tax_deductions_id',
        'filename',
        'file_path',
    ];
}
