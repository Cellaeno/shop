<!-- 引入头文件 -->
@include('home.public.header')
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
            <p></p>
            <div class="mem_tit">账户安全</div>
            <div class="m_des">
              <form method="post" enctype="multipart/form-data">
                <table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                    <td width="80" align="left" style="font-size: 16px; margin-bottom: 10px;">头像 &nbsp; &nbsp;</td>
                    <tr valign="top">
                      <td width="115"><img style="margin-left: 10px;" src="/home/images/user.jpg" width="90" height="90" /></td>
                    </tr>
                  </table>
                  <input type="file" name="" style="margin-left: 60px;margin-top: 5px;">
              </form>   
            </div>
            
            <div class="m_des">
                <form>
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">用户名 &nbsp; &nbsp;</td>
                    <td><input type="text" value="" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
                  </tr>
                  <tr height="45">
                    <td width="80" align="right">性别 &nbsp; &nbsp;</td>
                    <td>
                      
                      <label><input type="radio" value="" name="sex" style="width:20px;" />&nbsp;男</label>
                      <label><input type="radio" value="" name="sex" style="width:20px;" />&nbsp;女</label>
                      <label><input type="radio" value="" name="sex" style="width:20px;" />&nbsp;保密</label>

                    </td>
                  </tr>
                  <tr height="45">
                    <td width="80" align="right">年龄 &nbsp; &nbsp;</td>
                    <td><input type="text" value="" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
                  </tr>
                  <tr height="45">
                    <td width="80" align="right">QQ号 &nbsp; &nbsp;</td>
                    <td><input type="text" value="" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
                    <td><input type="submit" value="确认修改" class="btn_tj" /></td>
                  </tr>
                </table>
                </form>
            </div>
            
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
