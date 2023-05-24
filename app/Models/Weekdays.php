<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekdays extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function roster()
    {
        return $this->belongsToMany(Roster::class);
    }
}
