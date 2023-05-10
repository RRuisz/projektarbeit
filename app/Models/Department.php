<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function handover()
    {
        return $this->belongsToMany(Handover::class, 'handover_department');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
