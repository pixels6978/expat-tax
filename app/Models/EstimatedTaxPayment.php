<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatedTaxPayment extends Model
{
    use HasFactory;
    protected $table = 'estimated_tax_payments';
    protected $fillable = [
        'user_id',
        'filing_years_id',
        'payment_date',
        'amount',
    ];
}
