<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}
