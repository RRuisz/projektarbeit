<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskcategory extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function checklisttask()
    {
        return $this->belongsTo(Checklisttask::class);
    }
}
