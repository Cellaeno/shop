<!-- 引入头文件 -->
@include('home.public.header') 
<script type="text/javascript" src="/home/js/n_nav.js"></script>
<link rel="stylesheet" type="text/css" href="/home/css/ShopShow.css" />
<link rel="stylesheet" type="text/css" href="/home/css/MagicZoom.css" />
<script type="text/javascript" src="/home/js/MagicZoom.js"></script>

<script type="text/javascript" src="/home/js/num.js">
    var jq = jQuery.noConflict();
</script>

<script type="text/javascript" src="/home/js/p_tab.js"></script>
<script type="text/javascript" src="/home/js/shade.js"></script>
<body>  
<!--Begin 头部 开始-->
@include('home.public.header_cates')
<!--End 头部 结束--> 

<!--Begin Menu Begin-->
@include('home.public.menu')
<!--End Menu End--> 
 
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="/home/images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20">
    	<table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="490">商品名称</td>
            <td class="car_th" width="140">属性</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">单价</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
          </tr>
          @if(session('home_flag') == true)
          @foreach($datas as $k=>$v)
          <tr>
            <td>
            	<div class="c_s_img"><img src="{{ $v->car_goods->pic }}" width="73" height="73" /></div>
               {{ $v->car_goods->title }}
            </td>
            <td align="center">颜色：灰色</td>
            <td align="center">
            	<div class="c_num">
                    <a href="/home/buycar"><input type="button" value="" onclick="jianUpdate1(jq(this));" class="car_btn_1" /></a>
                	<input type="text" value="{{ $v->num }}" name="" class="car_ipt" />  
                    <a href="/home/buycar"><input type="button" value="" onclick="addUpdate1(jq(this));" class="car_btn_2" /></a>
                </div>
            </td>
            <td align="center" style="color:#ff4e00;">￥{{ $v->car_goods->price }}</td>
            <td align="center" style="color:#ff4e00;">￥{{ $v->xiaoji }}</td>
            <td align="center"><a onclick="ShowDiv('MyDiv','fade')">删除</a>&nbsp; &nbsp;<a href="/collect">加入收藏</a></td>
          </tr>
          @endforeach
          <tr height="70">
            <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <label class="r_rad"><input type="checkbox" name="clear" checked="checked" /></label><label class="r_txt">清空购物车</label>
                <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;">￥2899</b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
            <td colspan="6" align="right">
                <a href="#"><img src="/home/images/buy1.gif" /></a>&nbsp; &nbsp; <a href="/buycar/{id}/edit"><img src="/home/images/buy2.gif" /></a>
            </td>
          </tr>
          @else
          @foreach($data as $k=>$v)
          <tr>
            <td>
                <div class="c_s_img"><img src="{{ $v->pic }}" width="73" height="73" /></div>
                {{ $v->title }}
            </td>
            <td align="center">颜色：灰色</td>
            <td align="center">
                <div class="c_num">
                    <a href="/home/buycar/descNum?gid={{ $v->id }}"><input type="button" value="" onclick="jianUpdate1(jq(this));" class="car_btn_1" /></a>
                    <input type="text" value="{{ $v->num }}" name="" class="car_ipt" />  
                    <a href="/home/buycar/addNum?gid={{ $v->id }}"><input type="button" value="" onclick="addUpdate1(jq(this));" class="car_btn_2" /></a>
                </div>
            </td>
            <td align="center" style="color:#ff4e00;">￥{{ $v->price }}</td>
            <td align="center" style="color:#ff4e00;">￥{{ $v->xiaoji }}</td>
            <td align="center"><a href="javascript:;" onclick="abc({{ $v->id }})">删除</a>&nbsp; &nbsp;<a href="/home/login">加入收藏</a></td>
          </tr>
          @endforeach
          <tr height="70">
            <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <label class="r_rad"><input type="checkbox" name="clear" checked="checked" /></label><label class="r_txt">清空购物车</label>
                <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;">￥{{ $priceCount }}</b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
            <td colspan="6" align="right">
                <a href="/list"><img src="/home/images/buy1.gif" /></a>&nbsp; &nbsp; <a href="/home/login"><img src="/home/images/buy2.gif" /></a>
            </td>
          </tr>
          @endif

          
        </table>
        
    </div>
	<!--End 第一步：查看购物车 End--> 

    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/home/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		<input type="hidden" name="" id="cur_id" value="">
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td>您确定要把该商品移除购物车吗？</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href="javascript:;" class="b_sure" onclick="del(this)">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-删除商品 End-->
    
    <!--Begin 底部 开始 -->
    @include('home.public.footer')
    <!--End 底部  结束  --> 
    
</div>
<script type="text/javascript">
    function del(obj)
    {
        $('#fade').css('display','none');
        $('#MyDiv').css('display','none');

        // alert($('#cur_id').val());
        let id = $('#cur_id').val();
        $.get('/home/buycar/del',{id:id},function(res){
            // 提示信息
            if (res.msg == 'success') {
                //删除成功
                // alert(res.info);
                //跳转
                location.reload();
            }
            // console.log(res.msg);
        },'json');
    }
    function abc(id){
        ShowDiv('MyDiv','fade');
        $('#cur_id').val(id)
    }
</script>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
