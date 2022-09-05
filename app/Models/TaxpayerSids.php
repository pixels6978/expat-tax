<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxpayerSids extends Model
{
    use HasFactory;
    protected $table = 'taxpayer_sids';
    protected $fillable =[
        'user_id',
        'id_type',
        'id_number',
        'issue_state',
        'nydigit_number',
        'expiration_date',
        'issue_date',
    ];
}
