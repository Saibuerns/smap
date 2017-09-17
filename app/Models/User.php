<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{

    use SoftDeletes;

    protected $connection = 'smap';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['last_name', 'first_name', 'email', 'password'];

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Encrypt the user's password.
     *
     * @param  string  $value
     * @return void
     */
    public function SetPasswordAttribute($value)
    {
        $this->attributes['password'] = encrypt($value);
    }

    public function rols()
    {
        return $this->belongsToMany('App\Models\Rol', 'users_has_rols');
    }

    public function events()
    {
        return $this->hasMany('App\Models\Event', 'users_id', 'id');
    }
}
