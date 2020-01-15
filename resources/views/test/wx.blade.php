<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <center>
            <p style='color:red'>
                @if(!empty($errors->first()))
                    {{$errors->first()}}
                @endif
            </p>
            <a href="/test/login">返回账号密码登录</a>
            <form>
            @csrf
                <table>
                    <img src="{{$img_url}}" alt="">
                </table>
            </form>
        </center>
</body>
</html>
<script src="/jquery.js"></script>
<script>
    var t = setInterval("check();",2000);
    var status = "{{$status}}";//二维码标识
    function check(){
        $.ajax({
            url:"{{url('test/checkWechatLogin')}}",
            dataType:"json",
            data:{status:status},
            success:function(res){
                if(res.ret == 1){
                    clearInterval(t);
                    alert(res.msg);
                    location.href="{{url('/')}}";
                }
            }
        })
    }
</script>