<?php

namespace App\Models;

class User extends BaseModel
{
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
