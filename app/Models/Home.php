<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $table = 'homepage';
    protected $fillable = [
        'heading',
        'subheading',
        'video_url',
        'served_number',
        'served_description',
        'image',
        'meta_title',
        'meta_description',
        ];

}
