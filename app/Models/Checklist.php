<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    public function checklisttask()
    {
        return $this->belongsToMany(Checklisttask::class, 'checklist_checklisttask')
                    ->withPivot('status', 'done_at', 'user_name');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
