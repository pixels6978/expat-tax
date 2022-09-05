<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filing extends Model
{
    use HasFactory;
    protected $table = 'filings';
    protected $fillable = [
        'filing_years_id',
        'additional_returns',
        'partnership',
        'foreign_corporation',
        'ccorporation',
        'scorporation',
        'not_profit',
        'amended_returns',
        'returning_clients',
        'ustax_return',
        'ustax_return_file',
        'taxreturn_extension',
        'duedate_return',
        'claimed_dependent',
        'streamlined_filing',
        'non_willful_wording',
        'immigrated_date',
        'living_us',
        'ip_pin',
        'ippin_number',
        'cant_find_ip_pin',
    ];


    public function AmendedReturnsFiles(){
        return $this->hasMany(AmendedReturnsFile::class, 'filings_id', 'id');
    }
}
