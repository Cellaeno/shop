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
            	<span class="fr"><a href="#">修改</a></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="140">属性</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td>
                <td class="car_th" width="140">返还积分</td>
              </tr>
              <tr>
                <td>
                    <div class="c_s_img"><img src="/home/images/c_1.jpg" width="73" height="73" /></div>
                    Rio 锐澳 水蜜桃味白兰地鸡尾酒（预调酒） 275ml
                </td>
                <td align="center">颜色：灰色</td>
                <td align="center">1</td>
                <td align="center" style="color:#ff4e00;">￥620.00</td>
                <td align="center">26R</td>
              </tr>
              <tr class="car_tr">
                <td>
                    <div class="c_s_img"><img src="/home/images/c_2.jpg" width="73" height="73" /></div>
                    Rio 锐澳 水蜜桃味白兰地鸡尾酒（预调酒） 275ml
                </td>
                <td align="center">颜色：灰色</td>
                <td align="center">1</td>
                <td align="center" style="color:#ff4e00;">￥620.00</td>
                <td align="center">26R</td>
              </tr>
              <tr>
                <td>
                    <div class="c_s_img"><img src="/home/images/c_3.jpg" width="73" height="73" /></div>
                    Rio 锐澳 水蜜桃味白兰地鸡尾酒（预调酒） 275ml
                </td>
                <td align="center">颜色：灰色</td>
                <td align="center">1</td>
                <td align="center" style="color:#ff4e00;">￥620.00</td>
                <td align="center">26R</td>
              </tr>
              <tr>
                <td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
                    商品总价：￥1899.00 ； 返还积分 56R  
                </td>
              </tr>
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
            	配送方式
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="80"></td>
                <td class="car_th" width="200">名称</td>
                <td class="car_th" width="370">订购描述</td>
                <td class="car_th" width="150">费用</td>
                <td class="car_th" width="135">免费额度</td>
                <td class="car_th" width="175">保价费用</td>
              </tr>
              <tr>
              	<td align="center"><input type="checkbox" name="ch" checked="checked" /></td>
                <td align="center" style="font-size:14px;"><b>申通快递</b></td>
                <td>江、浙、沪地区首重为15元/KG，其他地区18元/KG，续重均为5-6元/KG， 云南地区为8元</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
              	<td align="center"><input type="checkbox" name="ch" /></td>
                <td align="center" style="font-size:14px;"><b>城际快递</b></td>
                <td>运费固定</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
              	<td align="center"><input type="checkbox" name="ch" /></td>
                <td align="center" style="font-size:14px;"><b>邮局平邮</b></td>
                <td>运费固定</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
              	<td colspan="6">
                	<span class="fr"><label class="r_rad"><input type="checkbox" name="baojia" /></label><label class="r_txt">配送是否需要保价</label></span>
                </td>
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
              <tr>
                <td align="right">
                	该订单完成后，您将获得 <font color="#ff4e00">1815</font> 积分 ，以及价值 <font color="#ff4e00">￥0.00</font> 的红包 <br />
                    商品总价: <font color="#ff4e00">￥1815.00</font>  + 配送费用: <font color="#ff4e00">￥15.00</font>
                </td>
              </tr>
              <tr height="70" style="margin-right: -100px">
                <td align="right">
                	<b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">￥2899</span></b>
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


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
