<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $table = 'donations';
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'amount',
        'donation_id',
        'razorpay_id',
        'donation_status'
        ];
}
