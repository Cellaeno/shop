<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public $table = 'goods';
    

    // 属于 (对应 二级栏目)
    public function goodscate_two()
    {
    	return $this->belongsTo('App\Models\Cates','cate_twoid');

    }

    // 属于 (对应 三级栏目)
    public function goodscate_three()
    {
        return $this->belongsTo('App\Models\Cates','cate_id');
    }
}
