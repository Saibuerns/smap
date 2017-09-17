<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{

    use SoftDeletes;

    protected $connection = 'smap';
    protected $dates = ['date', 'created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['name', 'description', 'date', 'start', 'end', 'eventType_id', 'users_id'];

    function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    function eventType()
    {
        return $this->belongsTo('App\Models\EventType');
    }
}
