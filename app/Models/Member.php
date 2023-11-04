<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'address',
        'blood_gr',
        'image',
        'idProof',
        'dob',
        'height',
        'weight',
        'disease',
    ];

   
}
