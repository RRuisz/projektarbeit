<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user() 
    {
        return $this->belongsToMany(User::class);
    }

    public function workingtime() 
    {
        return $this->belongsToMany(Workingtime::class);
    }
    
    public function weekday() 
    {
        return $this->belongsToMany(Weekday::class);
    }
}
