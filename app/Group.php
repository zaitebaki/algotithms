<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';
    protected $primaryKey = 'id';
    public $timestamps  = false;

    protected $fillable = [
        'name',
    ];

    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role', 'permission_role');
    // }
}
