<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // 
	protected $table = "courses";
	protected $primaryKey = "id";
	
	protected $cast = ["id" => 'INT'];

    protected $fillable = [
        'courseName', 'courseYear', 'userID'
    ];

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("courseName", "LIKE","%$keyword%")
                    ->orWhere("courseYear", "LIKE", "%$keyword%");
            });
        }
    }

    /**
     * A Course can only belong to one user
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
