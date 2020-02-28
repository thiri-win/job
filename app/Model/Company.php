<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	public function getRouteKeyName()	
	{
		return 'slug';
	}
	
    public function jobs()
    {	
    	return $this->hasMany(Job::class);
    }

    public function owner()
    {
    	return $this->belongsTo(User::class);
    }
}
