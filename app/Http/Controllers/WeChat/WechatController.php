<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tools;
use Illuminate\Support\Facades\Cache;

class WechatController extends Controller
{
    public function index(Request $request)
    {
        $echostr = $request->input("echostr");
        // echo $echostr;die;
        $info = file_get_contents("php://input");
        // dd($info);
        // file_put_contents("1.txt",$info);
        //处理xml格式数据，将xml格式数据转换成对象
        $xmlObj = simplexml_load_string($info,'SimpleXMLElement',LIBXML_NOCDATA);
        // dd($xml_obj);
        // 判断是否关注
        if($xmlObj->MsgType == "event" && $xmlObj->Event == "subscribe"){
            $openid = (string)$xmlObj->FromUserName; //用户的openid
            // dd($openid);
            $EventKey = (string)$xmlObj->EventKey;
            // 二维码的唯一标识
            $status = ltrim($EventKey,'qrscene_');
            // dd($EventKey);
            if($status){
                // 用户扫码登录的流程
                Cache::put('wx_',$status,$openid,20);
                // 回复的文本
                Tools::responseText("正在登陆中",$xmlObj);
            }
        }

        // 用户关注了的话  触发SCAN
        if($xmlObj->MsgType == "event" && $xmlObj->Event == "SCAN"){
            $openid = (string)$xmlObj->FromUserName;
            // dd($openid);
            $status = (string)$xmlObj->EventKey;
            if($status){
                Cache::put('wx_',$status,$openid,20);
                Tools::responseText("正在登陆中",$xmlObj);
            }
        }
    }
}
