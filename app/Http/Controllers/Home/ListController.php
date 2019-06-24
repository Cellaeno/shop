<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use DB;

class ListController extends Controller
{
    /**
     * 解析 字符串
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //把局部的$cws 变成全局的 
        
        // 引入类文件
        require 'pscws4/pscws4.class.php';
        // 实例化
        @$this->cws = new \PSCWS4;
        //设置字符集
        $this->cws->set_charset('utf8');
        //设置词典
        $this->cws->set_dict('pscws4/etc/dict.utf8.xdb');
        //设置utf8规则
        $this->cws->set_rule('pscws4/etc/rules.utf8.ini');
        //忽略标点符号
        $this->cws->set_ignore(true);

    }
    /**
     * 对每个标题 进行分词
     */
    public function dataWord()
    {
        $data = Goods::select('title','id')->get();
        foreach ($data as $key => $value) {
            $arr = $this->word($value->title);
            // dump($arr);
            foreach($arr as $kk=>$vv){
                // dd($value->id);
                DB::table('goods_word')->insert(['gid'=>$value->id,'word'=>$vv]);
            }
            
        }
        
    }

    /**
     * 显示商品 列表页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // 调用 标题分词 
        // $this->dataWord();
        // 
        $cate_two_id = $request->input('cate_two_id',0);
        $cate_three_id = $request->input('cate_three_id',0);

        // 搜索页面
        $search = $request->input('search',0);
        
        if ($cate_two_id != 0){
            // 获取商品的信息 通过二级栏目进去的
            $data_goods = Goods::where('cate_twoid',$cate_two_id)->paginate(42);
            // dd($data_goods);

        } else if ($cate_three_id != 0) {
            // 获取商品信息 通过三级栏目进去的
            $data_goods = Goods::where('cate_id',$cate_three_id)->paginate(42);
            // dd($data_goods);
        } else {
            // 优化的搜索
            $gid = DB::table('view_goods_word')->select('gid')->where('word',$search)->get();
            $gids = [];
            foreach ($gid as $key => $value) {
                $gids[] = $value->gid;
            }
            if(empty($gids)){
                return view('home.list.index',['data_goods'=>null,'search'=>$search]);
            }

            $data_goods = Goods::whereIn('id',$gids)->paginate(42);
            
        }

        // dd($data_goods);
        
        return view('home.list.index',['data_goods'=>$data_goods,'cate_two_id'=>$cate_two_id,'cate_three_id'=>$cate_three_id,'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function word($text)
    {   
        // 以空格 分割 标题 (过滤空格)
        $arr = explode(' ',$text);
        $preg = '/[\w\+\%\.\(\)]+/';

        $string = ''; 
        foreach ($arr as $key => $value) {
            // if(!preg_match($preg,$value)){
            //  $string .= $value;
            // }

            $string .= preg_replace($preg,'',$value);

        }

        //传递字符串
        $this->cws->send_text($string);
        //获取权重最高的前十个词
        // $res = $cws->get_tops(10);// top 顶部
        
        //获取所有的结果
        $res = $this->cws->get_result();

        if(!$res){
            return [];
        }
        $list  = [];
        foreach ($res as $k=>$v) {
            $list[] = $v['word'];
        }


        // var_dump($list);
        return $list;
    }
    /**
     * 析构 (释放资源)
     */
    public function __destruct()
    {
        //关闭
        $this->cws->close();
    }


}
