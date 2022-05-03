<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function scopeStatus($query)
    {
        return $query->where('status', true);
    }
}
