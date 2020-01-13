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
            <a href="/test/register">返回注册</a>
            <form action="do_login" method="post">
            @csrf
                <table>
                    姓名：  <input type="text" name="name"><br><br>
                    密码：  <input type="password" name="pwd" id=""><br><br>
                    <input type="submit" value="submit">
                </table>
            </form>
        </center>
</body>
</html>