<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamp = false;
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstname', 'lastname', 'email', 'password', 'created_at', 'updated_at', 'admin', 'profilepic'
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
     * A user cn have many courses
     */
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("username", "LIKE","%$keyword%");
                $query->orWhere("firstname", "LIKE","%$keyword%");
                $query->orWhere("lastname", "LIKE","%$keyword%");
                $query->orWhere("email", "LIKE","%$keyword%");
            });
        }
        return $query;
    }
}
