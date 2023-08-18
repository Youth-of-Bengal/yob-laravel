<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumImages extends Model
{
    use HasFactory;
    protected $fillable = ['album_id', 'filename'];

    public function album()
    {
        return $this->belongsTo('App\Models\Album');
    }
}
