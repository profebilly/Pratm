<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Student extends User
{
    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('student', function (Builder $builder) {
            $builder->where('role', 'student');
        });
    }

    public function parents()
    {
        return $this->belongsToMany(ParentUser::class, 'student_parent', 'student_id', 'parent_id');
    }
}
