<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['category_id', 'name', 'price', 'stock', 'image', 'description', 'is_available'])]
class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
