<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class EventType extends Model
{

    use SoftDeletes;

    protected $connection = 'smap';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['name', 'description'];

    function events()
    {
        return $this->hasMany('App\Models\Event', 'eventType_id', 'id');
    }
}
