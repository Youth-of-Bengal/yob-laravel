<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['album_name'];

    public function getImages()
    {
        return $this->hasMany('App\Models\AlbumImages');
    }
}
