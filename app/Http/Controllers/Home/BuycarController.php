<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Users;
use App\Models\Goods;
use App\Models\Cars;

class BuycarController extends Controller
{
    /**
     * 显示购物车的第一个页面(选择)
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($_SESSION['car']);
        // 未登录的用户 进入购物车
        if (!empty($_SESSION['car']) && session('home_flag') == false) {
            // dd('12121');
            $data = $_SESSION['car'];
            // 未登录用户计算 总价格
            $priceCount = self::priceCount();
            return view('home.buycar.index',['data'=>$data,'priceCount'=>$priceCount]);
         } //else {
        //     // return view('home.buycar.empty');
        // }

        // dd($data);
        

        // 登录用户计算 加入购物车的 商品总数
        // // 未登录用户计算 加入购物车的 商品总数
        // $countCar = self::countCar();
        // dump($countCar);
        if (!empty(session('home_userInfo'))) {
            // dd('qqq');
            // 登录用户 进入购物车
            $uid = session('home_userInfo')->id;
            $datas = Cars::where('uid',$uid)->get();
            // dd($datas);
            // 
            // 获取商品
            // $data =  Goods::select('id','title','price','pic')->where('id',$id)->first();
            foreach ($datas as $key => $value) {
                $datas[$key]->xiaoji = $value->car_goods->price * $value->num;
            }
            // dd($datas);
            return view('home.buycar.index',['datas'=>$datas]);
        }
        
        // dd($datas);
        
        // return view('home.buycar.index',['data'=>$data,'priceCount'=>$priceCount,'datas'=>$datas]);
    }

    /**
     * 添加商品到购物车 (未登录的用户)
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        // 清空session
        // $_SESSION['car'] = null;
        // exit;
        
        $id = $request->input('gid',0);

        if (empty($_SESSION['car'][$id])) {
            // 获取商品
            $data = DB::table('goods')->select('id','title','price','pic')->where('id',$id)->first();
            // 记录加入的商品数量
            $data->num = 1;
            $data->xiaoji = ($data->price * $data->num);
            $_SESSION['car'][$id] = $data;
        } else {
            // 当前数量
            $_SESSION['car'][$id]->num = $_SESSION['car'][$id]->num + 1;
            // 小计
            $xiaoji = $_SESSION['car'][$id]->num * $_SESSION['car'][$id]->price;
             $_SESSION['car'][$id]->xiaoji = $xiaoji;
        }
        // //加入多个商品
        // $_SESSION['car'][$id] = $data;
        
        return redirect('/buycar');
        // dump($_SESSION['car']);      
    }
    /**
     * 计算添加到购物车的 商品总数 (未登录用户)
     *
     */
    public static function countCar()
    {
         if (empty($_SESSION['car'])) {
            $count = 0;
         } else {
            $count = 0;
            foreach($_SESSION['car'] as $key=>$value){
                $count += $value->num;
            }
         }
         return $count;
    }
    /**
     * 计算添加到购物车的 商品总价格 (未登录用户)
     *
     */
    public static function priceCount()
    {
        if (empty($_SESSION['car'])) {
            $priceCount = 0;
         } else {
            $priceCount = 0;
            foreach($_SESSION['car'] as $key=>$value){
                $priceCount += $value->xiaoji;
            }
         }
         return $priceCount;
    }
    /**
     * 购物车的 商品 +1 (未登录用户)
     *
     */
    public static function addNum(Request $request)
    {
        $gid = $request->input('gid');

        if (empty($_SESSION['car'])) {
            return back();
         } else {
            $n = $_SESSION['car'][$gid]->num+1;
            $price = $_SESSION['car'][$gid]->price;
            $_SESSION['car'][$gid]->num = $n;
            $_SESSION['car'][$gid]->xiaoji = ($n * $price);
            // dd($_SESSION['car']);
            }
         return back();
    }
    /**
     * 购物车的 商品 -1 (未登录用户)
     *
     */
    public static function descNum(Request $request)
    {
        $gid = $request->input('gid');

        if (empty($_SESSION['car'])) {
            return back();
         } else {
            if ($_SESSION['car'][$gid]->num <=1) {
                return back();
                exit;
            } 
            $n = $_SESSION['car'][$gid]->num-1;
            $price = $_SESSION['car'][$gid]->price;
            $_SESSION['car'][$gid]->num = $n;
            $_SESSION['car'][$gid]->xiaoji = ($n * $price);
            // dd($_SESSION['car']);
            }
         return back();
    }
    /**
     * 购物车的 商品 删除 (未登录用户)
     *
     */
    public function del(Request $request)
    {
        $id = $request->input('id');
        // dd($_SESSION['car'][$id]);

        if (empty($_SESSION['car'][$id])) {
            echo json_encode(['msg'=>'success','info'=>'删除成功']);
         } else {
            unset($_SESSION['car'][$id]);
            echo json_encode(['msg'=>'success','info'=>'删除成功']);
        }
    }
    /**
     * 当前订单 信息 结算页面 
     *
     */
    public function edit($id)
    {
        return view('home.buycar.showaccount');
    }
    /**
     * 添加商品到购物车 (登录的用户)
     *
     * @param  int  $id
     */
    public function show(Request $request,$id)
    {
        // dd('qqq');
        $uid = session('home_userInfo')->id;
        // 获取商品
        $data =  Goods::select('id','title','price','pic')->where('id',$id)->first();
        // 保存数据
        $cars = Cars::where('gid',$id)->first();
        if (empty($cars)) {
            $cars = new Cars;
            $cars->num = 1;
        } else {
            $cars->num = $cars->num + 1;
        }
            $cars->uid = $uid;
            $cars->gid = $id;
            // dd($cars);
            $res = $cars->save();
            if ($res) {
                return redirect('/buycar')->with('success','加入购物车成功');
            } else {
                return back()->with('error','添加失败');
            }
    }

    /**
     * 
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     /**
     * 显示 提交 订单成功页面
     *
     * @return \Illuminate\Http\Response
     */
    public function paymoney()
    {
        return view('home.buycar.pay');
    }
}
