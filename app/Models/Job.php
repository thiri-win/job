<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'info', 'photo'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'job_user');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
