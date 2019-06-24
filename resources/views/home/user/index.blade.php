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
          <div id="a1" class="m_user" style="margin-top: 45px;float: right; margin-right: 600px;"><a href="/home/users/elementInfo" >修改信息</a></div>
          <div class="m_des">
              <table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="115">
                      @if(!empty($data->usersinfos->profile))
                        <img style="margin-left: 20px;" src="/uploads/{{$data->usersinfos->profile}}" width="80" height="80" />
                      @endif
                    </td>
                    <td>
                      <div class="m_user">{{$data->uname}}</div>
                        <p>
                          @if($data->auth == 1)
                          等级：超级会员
                          @elseif($data->auth == 2)
                          等级：普通会员
                          @endif
                          <br />
                          @if(empty($data->status))
                          您还没有通过邮件认证 <a href="/home/users/email/{{$data->id}}/{{$data->token}}" style="color:#ff4e00;">点此发送认证邮件</a>
                          @endif
                        </p>
                    </td>
                  </tr>
                </table>  
            </div>
            
            <!-- <div class="mem_t">资产信息</div>
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
            </table> -->

            <div class="mem_t">账号信息</div>
            <table border="0" class="acc_tab" style="width:870px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="td_l">用户名： </td>
                <td>{{$data->uname}}</td>
              </tr>
              <tr>
                <td class="td_l b_none">电  话：</td>
                <td>{{$data->phone}}</td>
              </tr>
              <tr>
                <td class="td_l">邮   箱： </td>
                <td>{{$data->email}}</td>
              </tr>
              <tr>
                <td class="td_l b_none">注册时间：</td>
                <td>{{$data->created_at}}</td>
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

<script>

</script>
</html>
