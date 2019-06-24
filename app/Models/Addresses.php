<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    //
    public $table = 'addresses';

    // 配置用户表属于关系
    public function addressusers()
    {
        return $this->belongsTo('App\Models\Users','id');
    }
}
