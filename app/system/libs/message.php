<?php
/**
 *  model.class.php 数据模型基类
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-6-7
 */
namespace system;
defined('IN_LION') or exit('No permission resources.');
\app::load_sys_class('db_factory','', 0);

// echo "load model";
// echo  microtime();
// echo "\n";
class message {
	private function sendSMS($username, $password_md5, $apikey, $mobile, $contentUrlEncode, $encode)
    {
        //发送链接（用户名，密码，apikey，手机号，内容）
        $url = "http://115.28.23.78/api/send/index.php?";  //如连接超时，可能是您服务器不支持域名解析，请将下面连接中的：【m.5c.com.cn】修改为IP：【115.28.23.78】
        $data = array(
            'username' => $username,
            'password_md5' => $password_md5,
            'apikey' => $apikey,
            'mobile' => $mobile,
            'content' => $contentUrlEncode,
            'encode' => $encode,
        );
        $result = $this->curlSMS($url, $data);
        //print_r($data); //测试
        return $result;
    }
    private function curlSMS($url, $post_fields = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);//用PHP取回的URL地址（值将被作为字符串）
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//使用curl_setopt获取页面内容或提交数据，有时候希望返回的内容作为变量存储，而不是直接输出，这时候希望返回的内容作为变量
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);//30秒超时限制
        curl_setopt($ch, CURLOPT_HEADER, 1);//将文件头输出直接可见。
        curl_setopt($ch, CURLOPT_POST, 1);//设置这个选项为一个零非值，这个post是普通的application/x-www-from-urlencoded类型，多数被HTTP表调用。
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);//post操作的所有数据的字符串。
        $data = curl_exec($ch);//抓取URL并把他传递给浏览器
        curl_close($ch);//释放资源
        $res = explode("\r\n\r\n", $data);//explode把他打散成为数组
        return $res[2]; //然后在这里返回数组。
    }

    public function send_mes($mobile, $code, $name = "CSST")
    {
        $encode = 'UTF-8';  //页面编码和短信内容编码为GBK。重要说明：如提交短信后收到乱码，请将GBK改为UTF-8测试。如本程序页面为编码格式为：ASCII/GB2312/GBK则该处为GBK。如本页面编码为UTF-8或需要支持繁体，阿拉伯文等Unicode，请将此处写为：UTF-8
        $username = '15652185697';  //用户名
        $password_md5 = '2b31525a4c099fc30f6662b479578a3b';  //32位MD5密码加密，不区分大小写
        $apikey = '4ebef9c33cb520e77c6f7bdb254b037f';  //apikey秘钥（请登录 http://m.5c.com.cn 短信平台-->账号管理-->我的信息 中复制apikey）
        $content = '【' . $name . '】您好，您的手机验证码是：' . $code;  //要发送的短信内容，特别注意：签名必须设置，网页验证码应用需要加添加【图形识别码】。
        $contentUrlEncode = urlencode($content);//执行URLencode编码  ，$content = urldecode($content);解码
        $result = $this->sendSMS($username, $password_md5, $apikey, $mobile, $contentUrlEncode, $encode);
        if (strpos($result, "success") > -1) {
            return true;
	        //提交成功
	        //逻辑代码
        } else {
            return false;
        }
    }
    //报名回执
    public function root_send_mes($mobile, $course,$name,$number,$company_name)
    {
        $encode = 'UTF-8';  //页面编码和短信内容编码为GBK。重要说明：如提交短信后收到乱码，请将GBK改为UTF-8测试。如本程序页面为编码格式为：ASCII/GB2312/GBK则该处为GBK。如本页面编码为UTF-8或需要支持繁体，阿拉伯文等Unicode，请将此处写为：UTF-8
        $username = '15652185697';  //用户名
        $password_md5 = '2b31525a4c099fc30f6662b479578a3b';  //32位MD5密码加密，不区分大小写
        $apikey = '4ebef9c33cb520e77c6f7bdb254b037f';  //apikey秘钥（请登录 http://m.5c.com.cn 短信平台-->账号管理-->我的信息 中复制apikey）
        $content = '通知: '.$company_name.'公司的'.$name.'报名参加课程：' . $course.'。联系方式为:'.$number.'\n--市场部支持';  //要发送的短信内容，特别注意：签名必须设置，网页验证码应用需要加添加【图形识别码】。
        $contentUrlEncode = urlencode($content);//执行URLencode编码  ，$content = urldecode($content);解码
        $result = $this->sendSMS($username, $password_md5, $apikey, $mobile, $contentUrlEncode, $encode);
        if (strpos($result, "success") > -1) {
            return true;
	        //提交成功
	        //逻辑代码
        } else {
            return false;
        }
    }
}