<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'team';
    protected $fillable = [
        'name',
        'image',
        'social_link',
        'ngo_role',
        'department',
        'profession',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
