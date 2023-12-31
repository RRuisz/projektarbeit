<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engineeringtask extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskcomment()
    {
        return $this->belongsToMany(Taskcomment::class, 'engineeringtask_taskcomment');
    }
}
