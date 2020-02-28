<?php

namespace App\Model;

use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = ['file_name', 'user_id'];

    public function user()
    {
    	return $this->hasOne(User::class);
    }
}
