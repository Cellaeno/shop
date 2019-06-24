<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Addresses;

class AddressController extends Controller
{
    /**
     * 显示我的地址的 主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = session('home_userInfo')->id;

        $user_addresses = Addresses::where('uid',$uid)->orderBy('status','desc')->get();
        // dd($uid,$user_addresses);


        return view('home.address.index',['user_addresses'=>$user_addresses]);
    }

    /**
     * 执行 添加地址
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 验证表单
        $this->validate($request, [
            'rename' => 'required|max:24',
            'phone' => 'required|regex:/^1[3-8]\d{9}$/',
            'postal_code' => 'nullable|regex:/^\d{6}$/',
            'province' => 'required',
            'country' => 'required',
            'town' => 'required',
            'detail' => 'required',
        ],[
            'rename.required' => '收件人不能为空',
            'rename.max' => '收件人名称过长',
            'phone.regex' => '手机号格式不正确',
            'phone.required' => '手机号不能为空',
            'postal_code.regex' => '邮政编码格式不正确',
            'province.required' => '请填写完整的地址',
            'country.required' => '请填写完整的地址',
            'town.required' => '请填写完整的地址',
            'detail.required' => '请填写完整的地址',

        ]);

        $address_province = $request->input('province');
        $address_country = $request->input('country');
        $address_town = $request->input('town');
        $address_detail = $request->input('detail');
        $address_address = $address_province.$address_country.$address_town.$address_detail;

        $address = new Addresses;
        $address->uid = session('home_userInfo')->id;
        $address->rename = $request->input('rename','');
        $address->phone = $request->input('phone','');
        $address->address = $address_address;
        $address->postal_code = $request->input('postal_code','');
        // dd($address);
        $res = $address->save();
        if ($res) {
            echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
        } else {
            return back()->with('error','添加失败,请稍后再试');
        }
    }

    /**
     * 设置 默认 地址
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        //
        $address_status = Addresses::where('status',1)->first();
        if (!empty($address_status)) {
            $address_status->status = 0;
            $res1 = $address_status->save();
            if ($res1) {
                $address = Addresses::find($id);
                $address->status = 1;
                $res2 = $address->save();
                if ($res2) {
                    echo 'ok';
                    exit;
                } else {
                    echo 'err';
                    exit;
                }
            }
        } else {
            $address = Addresses::find($id);
            $address->status = 1;
            $res3 = $address->save();
            if ($res3) {
                echo 'ok';
                exit;
            } else {
                echo 'err';
                exit;
            }
        }
    }


    /**
     * 执行 地址修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 验证表单
        $this->validate($request, [
            'rename' => 'required|max:24',
            'phone' => 'required|regex:/^1[3-8]\d{9}$/',
            'postal_code' => 'nullable|regex:/^\d{6}$/',
            'address' => 'required',
        ],[
            'rename.required' => '收件人不能为空',
            'rename.max' => '收件人名称过长',
            'phone.regex' => '手机号格式不正确',
            'phone.required' => '手机号不能为空',
            'postal_code.regex' => '邮政编码格式不正确',
            'address.required' => '地址不能为空'
        ]);
        // dump($request->all());

        $address = Addresses::find($id);
        $address->rename = $request->input('rename');
        $address->phone = $request->input('phone');
        $address->address = $request->input('address');
        $address->postal_code = $request->input('postal_code');

        $res = $address->save();
        if($res) {
            echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
        } else {
            return back()->with('error','修改失败,请稍后再试');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Addresses::destroy($id);
        if ($res) {
            echo "ok";
            exit;
        } else {
            echo "err";
            exit;
        }
        
    }
}
