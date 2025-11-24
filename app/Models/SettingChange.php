<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingChange extends Model
{
    protected $fillable = ['key','old_value','new_value','changed_by'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
