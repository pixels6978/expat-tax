<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentForOurService extends Model
{
    use HasFactory;
    protected $table = 'payment_for_our_services';
    protected $fillable = [
        'user_id',
        'card_number',
        'expiration_date',
        'cvv',
        'card_name',
        'comment',
    ];
}
