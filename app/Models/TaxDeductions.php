<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxDeductions extends Model
{
    use HasFactory;
    protected $table = 'tax_deductions';
    protected $fillable = [
        'user_id',
        'filing_years_id',
        'tuition',
        'student_loan',
    ];


    public function TuitionFiles(){
        return $this->hasMany(TaxDeductionsTuition::class, 'tax_deductions_id', 'id');
    }

    public function StudentLoanFiles(){
        return $this->hasMany(TaxDeductionsStudentLoan::class, 'tax_deductions_id', 'id');
    }

}
