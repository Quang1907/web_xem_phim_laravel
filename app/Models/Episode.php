<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeStatus($query)
    {
        return $query->where('status', true);
    }
}
