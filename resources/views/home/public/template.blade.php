<template id="temp_email">
  <div>
    <form action="/home/register/email" method="post">
      {{ csrf_field() }}
      <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
      <tr height="10">
        <td align="right"></td>
        <td>
          <span class="one" style="color: red;font-size: 16px;"></span>
        </td>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;邮箱账号 &nbsp;</td>
        <td><input type="text" value="{{old('email')}}" name="email" class="l_user" /></td>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
        <td><input type="password" value="" name="upwd" class="l_pwd" /></td>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
        <td><input type="password" value="" name="repwd" class="l_pwd" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td style="font-size:12px; padding-top:20px;">
            <span style="font-family:'宋体';" class="fl">
                <label class="r_rad"><input type="checkbox" /></label><label class="r_txt">我已阅读并接受《用户协议》</label>
            </span>
        </td>
      </tr>
      <tr height="60">
        <td>&nbsp;</td>
        <td>
          <input type="submit" value="立即注册" class="log_btn" /></td>
      </tr>
      </table>
    </form>
  </div>
</template>

<template id="temp_phone">
  <div>
    <form action="/home/register/phone" method="post" name="reg">
      {{ csrf_field() }}
      <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
        <tr height="10">
          <td align="right"></td>
          <td>
            <span class="one" style="color: red;font-size: 16px;"></span>
          </td>
        </tr>
        <tr height="50">
          <td align="right"><font color="#ff4e00">*</font>&nbsp;手机号 &nbsp;</td>
          <td>
            <input type="text" name="phone" class="l_user" id="phone" value="{{old('phone')}}" />
          </td>
        </tr>
        <tr height="50">
          <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
          <td style="vertical-align: middle;line-height: 25px;">
              <input type="code" value="" name="code" class="l_ipt" style="width: 230px;margin-right: 10px;" />
              <button type="button" onclick="getCode(this)" style="height: 38px;width: 50px;">获取</button>
          </td>
        </tr>
        <tr height="50">
          <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
          <td><input type="password" value="" name="upwd" class="l_pwd" /></td>
        </tr>
        <tr height="50">
          <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
          <td><input type="password" value="" name="repwd" class="l_pwd" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td style="font-size:12px; padding-top:20px;">
              <span style="font-family:'宋体';" class="fl">
                  <label class="r_rad"><input type="checkbox" /></label><label class="r_txt">我已阅读并接受《用户协议》</label>
              </span>
          </td>
        </tr>
        <tr height="60">
          <td>&nbsp;</td>
          <td>
            <input type="submit" value="立即注册" class="log_btn" /></td>
        </tr>
      </table>
    </form>
  </div>
</template>