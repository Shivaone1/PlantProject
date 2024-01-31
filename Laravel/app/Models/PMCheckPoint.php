<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMCheckPoint extends Model
{
    use HasFactory;
    protected $fillable = ['p_m_check_list_id', 'title', 'std_value', 'check_method', 'actual_value', 'remark', 'media'];
}
