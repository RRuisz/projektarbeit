<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }
}
