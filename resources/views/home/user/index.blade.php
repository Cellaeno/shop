<!-- 引入头文件 -->
@include('home.public.header')
<style type="text/css">
  #a1 div a:hover{
    color: red;
  }
</style>
<body>  
<!--Begin 头部 开始-->
@include('home.public.header_cates')
<!--End 头部 结束--> 

<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<!-- 用户中心 左侧栏开始 -->
        @include('home.public.user_sideboard')
        <!-- 用户中心 右侧栏开始 -->
		<div class="m_right">
          <div id="a1" class="m_user" style="margin-top: 42px;float: right; margin-right: 540px;"><a href="/home/users/elementInfo" >修改信息</a></div>
        	<div class="m_des">
            	<table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="115"><img style="margin-left:10px;" src="/home/images/user.jpg" width="90" height="90" /></td>
                    <td>
                    	<div class="m_user">TRACY</div>
                        <p>
                            等级：注册用户 <br />
                            <font color="#ff4e00">您还差 270 积分达到 分红100</font><br />
                            上一次登录时间: 2015-09-28 18:19:47<br />
                            您还没有通过邮件认证 <a href="#" style="color:#ff4e00;">点此发送认证邮件</a>
                        </p>
                        <div class="m_notice">
                        	用户中心公告！
                        </div>
                    </td>
                  </tr>
                </table>	
            </div>
            
            <div class="mem_t">资产信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="33%">用户等级：<span style="color:#555555;">普通会员</span></td>
                <td width="33%">消费金额：<span>￥200元</span></td>
                <td width="33%">返还积分：<span>99R</span></td>
              </tr>
              <tr>
                <td>账户余额：<span>￥200元</span></td></td>
                <td>红包个数：<span style="color:#555555;">3个</span></td></td>
                <td>红包价值：<span>￥50元</span></td></td>
              </tr>
              <tr>
                <td colspan="3">订单提醒：
                	<font style="font-family:'宋体';">待付款(<span>0</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待收货(<span>2</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待评论(<span>1</span>)</font>
                </td>
              </tr>
            </table>

            <div class="mem_t">账号信息</div>
            <table border="0" class="acc_tab" style="width:870px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="td_l">用户ID： </td>
                <td>12345678</td>
              </tr>
              <tr>
                <td class="td_l b_none">身份证号：</td>
                <td>522124***********8</td>
              </tr>
              <tr>
                <td class="td_l b_none">电  话：</td>
                <td>186****1234</td>
              </tr>
              <tr>
                <td class="td_l">邮   箱： </td>
                <td>*******789@qq.com</td>
              </tr>
              <tr>
                <td class="td_l b_none">注册时间：</td>
                <td>2015/10/10</td>
              </tr>
              <tr>
                <td class="td_l">完成订单：</td>
                <td>0</td>
              </tr>
            </table>
               
            
        </div>
    </div>
	<!--End 用户中心 End--> 

    <!--Begin 底部 开始 -->
    @include('home.public.footer')
    <!--End 底部  结束  -->   
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
