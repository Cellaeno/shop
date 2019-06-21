<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    public $table = 'cars';

    public function car_goods()
    {
    	return $this->belongsTo('App\Models\goods','gid');
    }
}
