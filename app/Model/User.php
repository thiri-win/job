<?php

namespace App\Model;

use App\Model\Resume;
use App\Model\Company;
use App\Model\Profile;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'user_type',
        'address',
        'gender',
        'avatar',
        'dob',
        'experience',
        'bio',
        'cover_letter',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function deleteImage()
    {
        Storage::delete($this->avatar);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function resume()
    {
        return $this->hasOne(Resume::class);
    }
}
