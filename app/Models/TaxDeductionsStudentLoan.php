<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxDeductionsStudentLoan extends Model
{
    use HasFactory;
    protected $table = 'tax_deductions_student_loans';
    protected $fillable = [
        'tax_deductions_id',
        'filename',
        'file_path',
    ];
}
