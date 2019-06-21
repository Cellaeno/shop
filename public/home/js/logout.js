
function logout(obj) {

    if(!confirm("确定要退出吗?")) {
        return false;
    }

    $.get('/home/login/logout', function(res) {
        if (res.msg == 'success') {
            location.href= res.url;
        }
    },'json');
}

