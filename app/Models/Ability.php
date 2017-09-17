<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Ability extends Model
{

    use SoftDeletes;

    protected $connection = 'smap';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    function rols()
    {
        return $this->belongsToMany('App\Models\Rol', 'rols_has_abilities', 'rols_id', 'abilities_id');
    }
}
