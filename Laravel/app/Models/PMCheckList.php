<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMCheckList extends Model
{
    use HasFactory;
    public $fillable=[
        'plant_id'
    ];
}
