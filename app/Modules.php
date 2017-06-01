<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    //
    protected $table = "modules";
	protected $primaryKey = "id";
	protected $cast = ["id" => 'INT'];
	protected $fillable = [
        'moduleName', 'moduleCode', 'courseID'
    ];

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("moduleName", "LIKE","%$keyword%")
                    ->orWhere("moduleCode", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
