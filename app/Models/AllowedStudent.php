<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllowedStudent extends Model
{
    use HasFactory;

    protected $fillable = ['cedula', 'is_registered'];
}
