<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Administrator extends User
{
    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('admin', function (Builder $builder) {
            $builder->where('role', 'admin');
        });
    }
}
