<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklisttask extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function checklist()
    {
        return $this->belongsToMany(Checklist::class, 'checklist_checklisttask')
                    ->withPivot('status');
    }

    public function taskcategory()
    {
        return $this->belongsTo(Taskcategory::class);
    }
}
