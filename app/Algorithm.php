<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Algorithm extends Model
{
    protected $table = 'algorithm';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'code',
    ];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
