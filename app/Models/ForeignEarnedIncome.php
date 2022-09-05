<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForeignEarnedIncome extends Model
{
    use HasFactory;
    protected $table = 'foreign_earned_incomes';
    protected $fillable = [
        'user_id',
        'filing_years_id',
        'employer_name',
        'employer_address',
        'national',
        'separate_family_residence',
        'family_country',
        'family_city',
        'family_residence_days',
        'country_resided',
        'residence_start_date',
        'residence_end_date',
        'type_of_living_quarters',
        'did_family_live_with_you_abroad',
        'relative_name',
        'relative_reside_period',
        'stmt_to_foreign_country_authorities',
        'pay_tax_to_foreign_country',
        'present_in_us',
        'us_arrival_date',
        'us_date_left',
        'us_business_days',
        'us_income',
        'contractual_terms',
        'visa_type',
        'visa_limit_stay_lenght',
        'limit_way',
        'maintain_us_home',
        'us_home_address',
    ];
}
