<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }
}
