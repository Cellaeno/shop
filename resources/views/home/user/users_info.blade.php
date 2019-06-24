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
            <div class="mem_tit">修改头像</div>
            <div class="m_des" style="margin-top: 20px;">
              <form action="/home/users/saveFace/{{ $data->id }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                    <tr valign="top">
                      <td width="115">
                        @if(!empty($data->usersinfos->profile))
                        <img style="margin-top: 10px;border-radius: 5px;border:1px solid #ccc;" src="/uploads/{{ $data->usersinfos->profile }}" width="90" height="90" />
                        @endif
                      </td>
                    </tr>
                    <tr height="50">
                    <td>
                      <input type="file" name="profile" style="margin-top: 5px;">
                      @if(!empty($data->usersinfos->profile))
                      <input type="hidden" name="profile_path" value="{{ $data->usersinfos->profile }}">
                      @else
                      <input type="hidden" name="profile_path" value="">
                      @endif
                    </td>
                  </tr>
                  <tr height="50">
                    <td>
                      <input type="submit" value="确认修改" class="btn_tj" />
                      <input type="button" value="返回" class="btn_tj" onclick="history.go(-1)" style="margin-left: 55px;" />
                    </td>
                  </tr>
                  </table>
                </div>
              </form>
            <div class="mem_tit">修改基本信息</div>
              <div class="m_des">
                <form action="javascript:;" method="post" id="form1">
                  {{ csrf_field() }}
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">用户名 &nbsp; &nbsp;</td>
                    <td><input type="text" value="{{ $data->uname }}" id="username" name="uname" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
                  </tr>
                  <tr height="45">
                    <td width="80" align="right">性别 &nbsp; &nbsp;</td>
                    @if(!empty($data->usersinfos->sex))
                    <td>
                      <label><input class="sex" type="radio" {{ $data->usersinfos->sex == '男' ? 'checked' : '' }} value="男" name="sex" style="width:20px;" />&nbsp;男</label>
                      <label><input class="sex" type="radio" {{ $data->usersinfos->sex == '女' ? 'checked' : '' }} value="女" name="sex" style="width:20px;" />&nbsp;女</label>
                      <label><input class="sex" type="radio" {{ $data->usersinfos->sex == '保密' ? 'checked' : '' }} value="保密" name="sex" style="width:20px;" />&nbsp;保密</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <font color="#ff4e00">*</font>
                    </td>
                    @else
                    <td>
                      <label><input class="sex" type="radio" value="男" name="sex" style="width:20px;" />&nbsp;男</label>
                      <label><input class="sex" type="radio" value="女" name="sex" style="width:20px;" />&nbsp;女</label>
                      <label><input class="sex" type="radio" value="保密" name="sex" style="width:20px;" />&nbsp;保密</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <font color="#ff4e00">*</font>
                    </td>
                    @endif
                  </tr>
                  <tr height="45">
                    <td width="80" align="right">年龄 &nbsp; &nbsp;</td>
                    <td>
                      @if(!empty($data->usersinfos->age))
                      <input id="age" type="text" value="{{ $data->usersinfos->age }}" name="age" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font>
                      @else
                      <input id="age" type="text" value="" name="age" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font>
                      @endif
                    </td>
                  </tr>
                  <tr height="45">
                    <td width="80" align="right">QQ号 &nbsp; &nbsp;</td>
                    <td>
                      @if(!empty($data->usersinfos->qq))
                      <input id="qq" type="text" value="{{ $data->usersinfos->qq }}" name="qq" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font>
                      @else
                      <input id="qq" type="text" value="" name="qq" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font>
                      @endif
                    </td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
                    <td>
                      <input type="submit" value="确认修改" class="btn_tj" />
                      <input type="button" value="返回" class="btn_tj" onclick="history.go(-1)" style="margin-left: 55px;" />
                    </td>
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
<script>
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  $('#username').blur(function() {
    var uname = $.trim($('#username').val());
    var patt_uname = /^.{1,24}$/;
    if (!patt_uname.test(uname)) {
      $('#username').next('font').eq(0).html('用户名不能为空并且不能超过24个字符');
      return false;
    } else {
      $('#username').next('font').eq(0).html('*');
    }
    // alert(uname);
    $.post("/home/users/saveInfo/{{$data->id}}/{{$data->token}}", {uname:uname}, function(res) {
      if (res.msg == 'error') {
        $('#username').next('font').eq(0).html(res.info);
      }
    },'json');

  });

  $('#age').focus(function() {
    var sex= $('.sex:checked').val();
    if(sex == null){
      $('.sex').eq(2).parent().next('font').eq(0).html('请选择性别');
      return false;
    }
    else{
      $('.sex').eq(2).parent().next('font').eq(0).html('*');
    }
  });

  $('#age').blur(function() {
    var age = $.trim($('#age').val());
    if (age == '') {
      $('#age').next('font').eq(0).html('请填写年龄');
      return false;
    } else {
      $('#age').next('font').eq(0).html('*');
    }
  });

  $('#qq').blur(function() {
    var qq = $.trim($('#qq').val());
    var patt_qq = /^\d{5,10}$/;
    if (!patt_qq.test(qq)) {
      $('#qq').next('font').eq(0).html('qq号的格式错误');
      return false;
    } else {
      $('#qq').next('font').eq(0).html('*');
    }
  });

  /*$("#form1").submit(function(e){
    alert("Submitted");
  });*/

   $('#form1').submit(function(e) {
    
    let qq = $.trim($('#qq').val());
    let sex= $('.sex:checked').val();
    let age = $.trim($('#age').val());
    let uname = $.trim($('#username').val());

    $.post("/home/users/saveInfo/{{$data->id}}/{{$data->token}}", {uname:uname,sex:sex,age:age,qq:qq}, function(res) {
      if (res.msg == 'error') {
        alert(res.info);
      } else if(res.msg == 'danger') {
        location.href = '/users';
        alert(res.info)
      } else {
        alert(res.info);
        location.reload();
      }
    },'json');

  });

</script>

<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
