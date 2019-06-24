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
    	<img src="/home/images/img2.jpg" />        
    </div>
    
    <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
    	<div class="two_bg">
        	<div class="two_t">
            	<span class="fr"></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="140">属性</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">单价</td>
                <td class="car_th" width="130">小计</td>
                <td class="car_th" width="140">操作</td>
              </tr>
              @foreach($data_order as $k=>$v)
              <tr>
                <td>
                    <div class="c_s_img"><img src="{{ $v->car_goods->pic }}" width="73" height="73" /></div>
                    {{ $v->car_goods->title }}
                </td>
                <td align="center">颜色：灰色</td>
                <td align="center">{{ $v->num }}</td>
                <td align="center" style="color:#ff4e00;">￥{{ $v->car_goods->price }}</td>
                <td align="center">{{ $v->xiaoji}}</td>
                <td align="center"><a onclick="remove({{ $v->id }})">删除</a></td>
              </tr>
              @endforeach
            </table>
            
            <div class="two_t">
            	<span class="fr"><a href="#">修改</a></span>收货人信息
            </div>
            <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="p_td" width="160">商品名称</td>
                <td width="395">海贼王</td>
                <td class="p_td" width="160">电子邮件</td>
                <td width="395">12345678@qq.com</td>
              </tr>
              <tr>
                <td class="p_td">详细信息</td>
                <td>四川省成都市武侯区</td>
                <td class="p_td">邮政编码</td>
                <td>6011111</td>
              </tr>
              <tr>
                <td class="p_td">电话</td>
                <td></td>
                <td class="p_td">手机</td>
                <td>18600002222</td>
              </tr>
              <tr>
                <td class="p_td">标志建筑</td>
                <td></td>
                <td class="p_td">最佳送货时间</td>
                <td></td>
              </tr>
            </table>

            <div class="two_t">
            	支付方式
            </div>
            <ul class="pay">
                <li class="checked">支付宝支付<div class="ch_img"></div></li>
                <li>微信支付<div class="ch_img"></div></li>
                <li>银行卡<div class="ch_img"></div></li>
            </ul>
            
            <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="70" style="margin-right: -100px">
                <td align="right">
                	<b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">￥{{ $Count }}</span></b>
                </td>
              </tr>
              <tr height="70">
               <!--  <td align="right"><a href="/buycar"><button style="width: 170px;height: 46px;background: rgba(100,100,100,.2);border-radius: 5px;color: white;font-size: 16px;font-weight: 800;">返回上一级</button></a></td> -->
                <td align="right">
                  <a href="/buycar" style="display:block;width: 150px;height: 30px;background-color: transparent;font-size: 14px;">返回上一级</a>
                  <a href="/home/buycar/paymoney"><img src="/home/images/btn_sure.gif" /></a>
                </td>
              </tr>
            </table>

            
        	
        </div>
    </div>
	<!--End 第二步：确认订单信息 End-->
    
    
    <!--Begin 底部 开始 -->
    @include('home.public.footer')
    <!--End 底部  结束  -->   
</div>

</body>
<script type="text/javascript">
  function remove(id){
    alert("真的要删除吗?");
    $.get('/home/buycar/remove',{id:id},function(res){
      // 提示信息
      if (res.msg == 'success') {
          //删除成功
          alert(res.info);
          //跳转
          location.reload();
      }
    },'json');
  }
</script>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
