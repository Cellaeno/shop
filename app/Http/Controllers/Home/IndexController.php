<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Banners;
use App\Models\Links;
use DB;

class IndexController extends Controller
{
    /**
     * 获取全部的栏目
     *
     * 
     */
    public static function getPidCatesData($pid = 0)
    {
        // 获取一级分类
        $data = Cates::where('pid',$pid)->get();

        foreach($data as $k=>$v){
            // 回调函数
            $v->sub = self::getPidCatesData($v->id);
            
        }
        return $data; 
    }
    /**
     * 获取规定数目的栏目
     *
     * 
     */
    public static function getCates($pid = 0)
    {
        // 获取一级分类
        $data = Cates::where('pid',0)->skip(0)->take(6)->get();

        foreach($data as $k=>$v){
            // $ = Cates::where('pid',$id)->get();

            // // 给二级压入一个下标
            // $v->sub = $
            // 回调函数
            $v->sub = self::getPidCatesData($v->id);
            
        }
        return $data; 
    }
    
    /**
     * 显示商城前台首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cates_data = self::getPidCatesData(0);
        // 获取前6个父类及其下级cname
        $data_cates = self::getCates();
        // 获取轮播图数据
        $data_banners = Banners::all();
        // 显示热门商品 top1
        $data_top = Goods::orderBy('sale_num','desc','number','desc')->skip(0)->take(1)->get();
        // 显示热门商品 top2~8
        $data_tops = Goods::orderBy('sale_num','desc','number','desc')->skip(1)->take(8)->get();
        // 显示友情链接
        $data_links = Links::all();
        // dd($data_links);

        return view('home.index.index',['data_cates'=>$data_cates,'data_banners'=>$data_banners,'data_tops'=>$data_tops,'data_top'=>$data_top,'data_links'=>$data_links]);
    }
}
