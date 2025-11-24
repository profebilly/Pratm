<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class ParentUser extends User
{
    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('parent', function (Builder $builder) {
            $builder->where('role', 'parent');
        });
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_parent', 'parent_id', 'student_id');
    }
}
