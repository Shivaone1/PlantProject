<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    
    public function getPhoneNoAttribute($value){ // Its Accessor when use insert then use mutetor
        return $value.Phone No;
    }
    

}
