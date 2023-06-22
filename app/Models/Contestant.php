<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;

    public $fillable = [
        'contest_id',
        'user_id',
        'school_level',
        'school_grade',
        'school_name',
        'tshirt_size',
        'tshirt_style',
    ];
}
