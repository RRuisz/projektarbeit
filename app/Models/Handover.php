<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handover extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsToMany(Department::class, 'handover_department');
    }
}
