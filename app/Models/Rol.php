<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{

    use SoftDeletes;

    protected $connection = 'smap';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['name', 'description', 'date', 'start', 'end'];

    function abilities()
    {
        return $this->belongsToMany('App\Models\Ability');
    }
}
