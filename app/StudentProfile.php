<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    protected $fillable = ['user_id', 'name', 'is_submitted', 'is_cleared'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
