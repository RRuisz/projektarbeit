<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredient()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_recipe')
                    ->withPivot('ingredient_amount');
    }
}
