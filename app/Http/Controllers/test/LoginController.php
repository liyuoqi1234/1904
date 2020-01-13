<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function login()
    {
        return view('test/login');
    }

    public function do_login(Request $request)
    {
        $all = $request->all();
        // dd($all);
        if(empty($all['name']  && $all['pwd'])){
            echo '<script>alert("账号或密码不能为空"); location.href="/test/login"</script>';
        }
        $name = $all['name'];
        $pwd = $all['pwd'];
        $info = UserModel::where("name",$name)->first();
        // dd($info);
        if($all["name"]==$info["name"] && $all["pwd"]==$info["pwd"])
        {
            echo '<script>alert("欢迎登录"); location.href="/test/index"</script>';
        }else{
            echo '<script>alert("没有这个大人物，请注册"); location.href="/test/register"</script>';
        }
    }

    public function index()
    {
        $all = UserModel::get();
        return view('test/index',['all'=>$all]);
    }
}
