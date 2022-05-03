<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function movies()
    {
        return $this->hasMany(Movie::class)->orderBy('id', 'desc');
    }

    public function scopeStatus($query)
    {
        return $query->where('status', true);
    }
}
