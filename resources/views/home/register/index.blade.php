<!-- 引入头部文件 -->
@include('home.public.header')
<body>  
<!--Begin 头部 开始-->
@include('home.public.login_header')
<!--End 头部 结束--> 

<!--Begin Login Begin-->
<!-- <div id="tel"> -->
<div class="log_bg">	
  <div class="top">
      <div class="logo"><a href="Index.html"><img src="/home/images/logo.png" /></a></div>
  </div>
  <div class="regist">
  	<div class="log_img"><img src="/home/images/l_img.png" width="611" height="425" /></div>
    
    <div class="reg_c" style="height: 550px;" id="tel">
        <div id="mail_phone">
          <span style="font-size:24px;"><a @click="is = 'temp_email'">邮箱注册</a>&nbsp;|&nbsp;<a @click="is = 'temp_phone'">手机号注册</a></span>
          <br>
          <span class="fr" style="margin-right: 50px;">已有商城账号，<a href="/home/login" style="color:#ff4e00;">我要登录</a></span>
          @include('home.public.error')
          @include('home.public.messages')
        </div>
        <!-- :is 控制组件的名称 -->
        <component :is="is"></component>
      </div>
    </div>
  </div>
<!-- </div> -->

<!--End Login End--> 
<!--Begin 底部(网站配置) 开始-->
@include('home.public.login_footer')
<!--End 底部 结束 -->   

<!-- 组件 -->
@include('home.public.template')   

</body>

<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
<script>
    Vue.component('temp_email',{
        template:'#temp_email'
    });
    Vue.component('temp_phone',{
        template:'#temp_phone'
    });

    // 钩子函数（生命周期）
    var tel = new Vue({
        data:{
          // phone:
          is:'temp_email',
        }
    }).$mount('#tel');
</script>
<script>
  // document.reg.phone.focus();
  // // document.reg.phone.onblur = function () {
  // //   console.log(123)
  // // }
  // $('#phone').blur(function () {
  //     // alert($);
  //     $.get('/home/register/phone', {data_phone:phone}, (res) => {
  //       if (res.msg == 'error') {
  //         $('.one').html(res.info);
  //         return false;
  //       }
  //     },'json');
  //   });

  function getCode(obj) {
    // 获取用户验证码
    let phone = $('#phone').val();
    // 验证格式
    let phone_preg = /^1{1}[3-8]{1}[0-9]{9}$/;
    if (!phone_preg.test(phone)) {
      $('.one').html('手机号格式不正确');
      // alert($('#phone').attr('placeholder'));
      return false;
    }

    $.get('/home/register/sendPhone', function(res) {
      if (res.msg == 'error') {
        $('.one').html('该手机号已被注册');
        return false;
      }
    },'json');

    // alert($);

    $(obj).attr('disabled', true);
    $(obj).css({
      color: '#ccc',
      cursor: 'no-drop'
    });

    let time = null;

    if ($(obj).attr('disabled')) {
      let i = 5;
      time = setInterval(function(){
        i--;
        $(obj).html('('+i+')s');

        if (i < 1) {
          $(obj).html('获取');
          $(obj).attr('disabled', false);
          $(obj).css({
            color: '#333',
            cursor: 'pointer'
          });
          clearInterval(time);
        }
      },1000);

      // 发送ajax 发送验证码
      $.get('/home/register/sendPhone', {phone:phone}, function(res) {
        // console.log(res);
        if (res.error_code == 0) {
          alert('验证码发送成功,10分钟内有效');
        } else {
          alert('验证码发送失败');
        }
      },'json');
    }
  }
</script>

</html>
