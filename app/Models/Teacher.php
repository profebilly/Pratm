<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Teacher extends User
{
    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('teacher', function (Builder $builder) {
            $builder->where('role', 'teacher');
        });
    }
}
