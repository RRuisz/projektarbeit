<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function checklisttask()
    {
        return $this->belongsToMany(Checklisttask::class, 'checklist_checklisttask')
                    ->withPivot('status');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
