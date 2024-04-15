<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'phone_number',
        'email',
        'gpa',
    ];
}
