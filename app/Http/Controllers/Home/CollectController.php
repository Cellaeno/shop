<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Collections;

class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.collect.index');
    }

    /**
     * 接收 存储商品 到收藏夹
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $uid = session('home_userInfo')->id;
        $gid = $request->input('gid',0);

        $data_goods = Goods::select('title','id','price','pic')->where('id',$gid)->first();

        $collect = Collections::where('gid',$gid)->first();
        if ( !empty($collect)) {
            // $collect = new Collections;
            return back()->with('err','该商品已在你的收藏夹');   
            // dd('11213');
        } else {
            // dd('111243543645');
            $data_goods = new Collections;
            $data_goods->uid = $uid;
            $data_goods->gid = $gid;
            $res = $data_goods->save();
        }
  
        if ($res) {
            return redirect('/collect')->with('success','收藏成功');
        } else {
            return back()->with('err','收藏失败');
        }
    }

    /**
     * 显示确认订单页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * 修改 订单的信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
}
