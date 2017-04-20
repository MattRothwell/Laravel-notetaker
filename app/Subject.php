<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = "subjects";
	protected $primaryKey = "id";
	protected $cast = ["id" => 'INT'];
	protected $fillable = [
        'subjectTitle', 'subjectType', 'subjectInfo', 'moduleID', 'courseID', 'created_at', 'updated_at'
    ];

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("subjectTitle", "LIKE","%$keyword%")
                    ->orWhere("subjectType", "LIKE", "%$keyword%")
                    ->orWhere("subjectInfo", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
