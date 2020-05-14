<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class BaseModel extends Authenticable
{
    use HasApiTokens, Notifiable;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
