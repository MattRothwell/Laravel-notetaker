<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = "subcriptions";
	protected $primaryKey = "id";
	protected $cast = ["id" => 'INT'];
	protected $fillable = [
        'courseID', 'courseName', 'userID', 'created_at', 'updated_at'
    ];

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("courseName", "LIKE","%$keyword%");
            });
        }
        return $query;
    }
}
