<?php
namespace ding;

// use system\ding_password;


// echo "load ding_controller";
// echo  microtime();
// echo "\n";

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       ding_user
 * @DataTime:  2018-08-21
 * @describe:  V1.0
 * ================
 */
class ding_controller
{
    private $view;
    /**
     * 构造函数
     */
    public function __construct()
    {   
        // $this->ding_corp = \app::load_config('ding_password');//
        // $this->ding_corp = \app::load_config('ding_password');//
        // var_dump($this->ding_corp());
        $this->ding = \app::load_service_class('ding', 'user');//加载json数据模板
        $this->view = \app::load_view_class('budget_paper', 'user');//加载json数据模板
        $this->course_list = \app::load_model_class('course_list', 'ding');//加载json数据模板
        $this->course_list_2 = \app::load_model_class('course_list_2', 'ding');//加载json数据模板
        $this->course_list_3 = \app::load_model_class('course_list_3', 'ding');//加载json数据模板
    }
    public function cto(){
        \app::load_sys_class('crawler')->get_easthome_title_csv();
    }
    public function t(){
        header("Content-type: text/html; charset=utf-8");

        $str=file_get_contents("https://www.easthome.com/front/courseSyllabuss/list/searchables?page.pn=1&page.size=30");

        //拿出网页中所有《a》标签放到数组
        $reg1="/<a .*?>.*?<\/a>/";
        $reg3="/<a.*?>.*?<\/a>/";
       $reg2="/<a target=\"_blank\" href=\"front.*?>.*?<\/a>/";
        $aarray;//这个存放的就是正则匹配出来的所有《a》标签数组
         preg_match_all($reg2,$str,$aarray);
        echo json_encode($aarray);

        //拿出《a》标签中的链接和标签内容
        $hrefarray;//这个存放的是匹配出来的href的链接地址
        $acontent;//存放匹配出来的a标签的内容
        $reg2="/href=\"([^\"]+)/";
        for($i=0;$i<count($aarray[0]);$i++){
        preg_match_all($reg2,$aarray[0][$i],$hrefarray);
        echo $hrefarray[1][0]."\r\n";//这里输出的就是遍历出来的所有a标签的链接
        //拿出《a》标签的内容
        $reg3="/>(.*)<\/a>/";
        preg_match_all($reg3,$aarray[0][$i],$acontent);
        echo $acontent[1][0]."\r\n";//这里输出的就是a标签的文字了
}
    }
    public function pa(){
        header("Content-type: text/html; charset=utf-8");
        for ($i=1; $i < 32; $i++) { 
            $str=file_get_contents("https://www.easthome.com/front/courseSyllabuss/list/searchables?page.pn=$i&page.size=30");
            $preg = "/\s([A-Z]|[\x{4e00}-\x{9fa5}]{1,4}).*<\/a>\n/u";
            preg_match_all($preg,$str,$array);
            $data[] = $array[0];
            // $list[] = $data;
        }
        $this->pa_filter($data);
        // var_dump($array);
        // echo json_encode($data);
    }
    public function time_test(){
        echo 1;die;
        ignore_user_abort();//关闭浏览器后，继续执行php代码
        set_time_limit(0);//程序执行时间无限制
        $sleep_time = 15;//多长时间执行一次
        $data['name'] = 1;
        $this->course_list_3->insert($data);
        sleep($sleep_time);
        $url = 'http://localhost:666/ding/ding/time_test';
        $html = file_get_contents($url);
        // echo 1;
    }

    public function timer(){
        header("Content-type: text/html; charset=utf-8");
        ignore_user_abort();//关闭浏览器后，继续执行php代码
        set_time_limit(0);//程序执行时间无限制
        $sleep_time = 5;//多长时间执行一次
        $_GET['number'] ? $number = $_GET['number']+1 : $number = 1; 
        if($number >= 467){
            return true;
        }
        for ($i=$number; $i < $number*5; $i++) { 
            
            $str = file_get_contents("https://edu.51cto.com/courselist/index-p$i.html");
            $preg = "/alt=\"([【2019a-zA-z]|[\x{4e00}-\x{9fa5}]{1,4}).*\n/u";
            preg_match_all($preg,$str,$array);
            unset($array[0][0],$array[0][1],$array[0][2],$array[0][3],$array[0][4]);
            $data[] = $array[0];
            }
            $this->pa_filter_3($data);
            sleep($sleep_time);
            $url = "http://localhost:666/ding/ding/timer&number=$number";
            file_get_contents($url);
    }
    public function get_number(){
        $url = "http://localhost:666/ding/ding/timer?number=$number";
            $html = file_get_contents($url);
    }
    private function pa_filter_3($data){
        foreach($data as $key){
            foreach($key as &$k){
                $k = substr($k,0,strrpos($k,'"></a>'));
                // $k = substr($k,1,strrpos($k,'alt="'));
                $k = str_replace('alt="','',$k);
                $as['name'] = $k;
                $this->course_list_3->insert($as);
            }
        }
    }
    private function pa_filter($data){
        return 1; die;
        foreach($data as $key){
            foreach($key as &$k){
                $list[] = substr($k,0,strrpos($k,'</a>'));
                $as['name'] = $k;
                $this->course_list->insert($as);
            }
            
        }

        echo json_encode($list);
    }
    public function pa_2(){
        header("Content-type: text/html; charset=utf-8");
        // $preg = "/\s([A-Z]|[\x{4e00}-\x{9fa5}]{1,4}).*<\/a>\n/u"; |[\x{4e00}-\x{9fa5}]{1,4}
        for ($i=461; $i < 468; $i++) { 
            
        $str = file_get_contents("https://edu.51cto.com/courselist/index-p$i.html");
        $preg = "/alt=\"([【2019a-zA-z]|[\x{4e00}-\x{9fa5}]{1,4}).*\n/u";
        preg_match_all($preg,$str,$array);
        unset($array[0][0],$array[0][1],$array[0][2],$array[0][3],$array[0][4]);
        $data[] = $array[0];
        }
        $this->pa_filter_2($data);
        // echo json_encode($data);die;
        // $str1 = "alt=\"python全栈开发高薪就业班\">";
        // var_dump($array);
        // var_dump($str);die;
    }
    private function pa_filter_2($data){
        echo 1;die;
        foreach($data as $key){
            foreach($key as &$k){
                $k = substr($k,0,strrpos($k,'"></a>'));
                // $k = substr($k,1,strrpos($k,'alt="'));
                $k = str_replace('alt="','',$k);

                $list[] = $k;
                $as['name'] = $k;
                $this->course_list_2->insert($as);
            }
        }
        echo json_encode($list);die;
    }
    public function ding_roles(){
        $token = $this->ding_token();
        $ch = curl_init();
        $url = "https://eco.taobao.com/router/rest?access_token=" . $token."sign=11C9D7D9E0581D2F4BDFD287D5952F7C&amp;timestamp=2018-11-22+11%3A54%3A03&amp;v=2.0&amp;app_key=12129701&amp;method=dingtalk.corp.role.list&amp;sign_method=hmac&amp;partner_id=top-apitools&amp;format=json&amp;force_sensitive_param_fuzzy=true";
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        $ass = json_decode($data, true);
        curl_close($ch);
        print_R($ass);
    }
    //token
    public function ding_token()
    {
        $ch = curl_init();
        $corpid = 'ding33c0349684398ce235c2f4657eb6378f';
        $corpsecret = 'm6Pk3bGwq3BdwEwEvMgwt-0O5194aSR0kNG0zEcIhcNlDyHbjdXzqra-VbrT2xIk';
        $url = "https://oapi.dingtalk.com/gettoken?corpid=" . $corpid . "&corpsecret=" . $corpsecret;
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        // echo json_decode($data, true)["access_token"];die;
        return json_decode($data, true)["access_token"];

        if ($data === false) {
            return "CURL Error:" . curl_error($ch);
        }

    }
    //部门
    public function ding_department()
    {
        $token = $this->ding_token();
        $ch = curl_init();
        // $url =  "https://oapi.dingtalk.com/user/list?access_token=32963d3d918d3452bb7dc3d99c96213e&department_id=26509421";
        $url = "https://oapi.dingtalk.com/department/list?access_token=" . $token;
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $ass = json_decode($data, true);
        // echo '<pre>';
        // print_r($ass);die;
        
        return $ass['department'];
        if ($data === false) {
            return "CURL Error:" . curl_error($ch);
        }
    }
//一键更新部门
    public function ding_member()
    {
        
        $token = $this->ding_token();
        $departments = $this->ding_department();
        foreach ($departments as $k => $v) {
            $department[$k]['department_id'] = $departments[$k]['id'];
            $department[$k]['name'] = $departments[$k]['name'];
            $department[$k]['parentid'] = $departments[$k]['parentid'];
        }
        $data = $this->ding->new_member($department);
        if($data){
            return $department;
        }else{
            echo 2;die;
        }
        // return $department;
        // echo '<pre>';
        // print_r($department);die;

    }

    public function ding_bug()
    {
        $member = $this->ding_member();

        $token = $this->ding_token();
        foreach ($member as $members) {
            $ch = curl_init();
            $url = "https://oapi.dingtalk.com/user/list?access_token=" . $token . "&department_id=" . $members['id'];
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            $ass[$members['name']] = json_decode($data, true);
        }
        foreach ($ass as $k => $v) {
            $list[] = $ass[$k]['userlist'];
        }
        foreach ($list as $k) {
            foreach ($k as $v) {
                $css[] = $v;
            }
        }
        echo '<pre>';
        print_r( $ass);die;
    }
    //获取公司所有员工的所有信息
    public function ding_about_staff(){
        $token = $this->ding_token();
        $member = $this->ding->slelct_department();
        foreach($member as $members){
            $ch = curl_init();
            $url = "https://oapi.dingtalk.com/user/list?access_token=" . $token . "&department_id=" . $members['department_id'];
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);    
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);

            curl_close($ch);
            $ass[] = json_decode($data, true);
        }
        foreach ($ass as $k => $v) {
            $list[] = $ass[$k]['userlist'];
        }
        foreach ($list as $k) {
            foreach ($k as $v) {
                $css[] = $v;
            }
        }
        //  echo '<pre>';
        // print_r( $ass);die;
        return $css;
       
    }
    public function add_staff_user(){
        $list = $this->ding_about_staff();
        // print_r($list);
        foreach ($list as $k) {
            $department_id = implode(",", $k['department']);
           
            $data = [];
            $data = [
                'department' => $department_id,

                'userid' => $k['userid'],
                'unionid' => $k['unionid'],
                'mobile' => $k['mobile'],
                'tel' => $k['tel'],
                'workPlace' => $k['workPlace'],
                'remark' => $k['remark'],
                'isAdmin' => $k['isAdmin'],
                'isBoss' => $k['isBoss'],
                'isHide' => $k['isHide'],
                'isLeader' => $k['isLeader'],
                'name' => $k['name'],
                'active' => $k['active'],
                'department' => $department_id,
                'position' => $k['position'],
                'email' => $k['email'],
                'orgEmail' => $k['orgEmail'],
                'jobnumber' => $k['jobnumber'],
                'hiredDate' => $k['hiredDate'],
            ];
            $where['unionid'] = $k['unionid'];
            $have = $this->ding->get_one_role($where);
            // var_dump($have);die;
            if (!$have) {
            $this->ding->add_staff_user($data);}
        }
    echo 1;die;
    }
    public function add_ding()
    {
        error_reporting(E_ALL^E_NOTICE);
        $list = $this->ding_about_staff();
        $number = mt_rand(1, 100);
        $this->ding->del_about();
        foreach ($list as $k) {
            $department_id = implode(",", $k['department']);
            $de_data = [
                'department_id' => $department_id,
                'userid' => $k['userid'],
                'time' => date("y-m-d"),
                 'state'=> 1,
            ];
            $staff = $this->ding->add_about_staff($de_data);
            
            $data = [];
            $data = [
                
                'position' => $k['position'],
                'department' => $department_id,
                'userid' => $k['userid'],
                'unionid' => $k['unionid'],
                'name' => $k['name'],
                'jobnumbers' => $k['jobnumber'],
                'email' => $k['email'],
                'hiredDate' => $k['hiredDate'],
                'openid' => $k['openId'],
                'mobile' => $k['mobile'],
            ];
            $where['userid'] = $k['userid'];
            $have = $this->ding->get_one($where);
            if ($have) {
                $data['state'] = $number;
                $ass = $this->ding->update($where, $data);
            } else {
                $data['state'] = $number;
                $asss = $this->ding->insert($data);
            }
        }
        if ($ass || $asss) {
            $this->ding->not_in($number);
            echo 1;die;
        } else {
        //失败     
        echo 2;die;

        }
    }

    private function http_post_data($url, $data) {  
       
        //将数组转成json格式
        $data = json_encode($data);
        //1.初始化curl句柄
         $ch = curl_init(); 
         //2.设置curl
         //设置访问url
         curl_setopt($ch, CURLOPT_URL, $url);  
         //捕获内容，但不输出
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         //模拟发送POST请求
         curl_setopt($ch, CURLOPT_POST, 1);  
         //发送POST请求时传递的参数
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
         //设置头信息
         curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
             'Content-Type: application/json; charset=utf-8',  
             'Content-Length: ' . strlen($data))  
         );  
         //3.执行curl_exec($ch)
         $return_content = curl_exec($ch);  
         //如果获取失败返回错误信息
         if($return_content === FALSE){ 
             $return_content = curl_errno($ch);
         }
         $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
         //4.关闭curl
         curl_close($ch);
         return json_decode( $return_content,true);
     }
     //获取企业角色列表
     public function ding_post(){
        $token = $this->ding_token();
        $url  = "https://oapi.dingtalk.com/topapi/role/list?access_token=$token";  
        $data = array(
            "size"=>"20",
            "offset	"=>"",
            );   
            var_dump($this->http_post_data($url, $data));die;
            return $this->http_post_data($url, $data);  
          
            // print_r($this->http_post_data($url, $data) );  die;
     }
     //角色下员工
     public function ding_post_de(){
        $token = $this->ding_token();
        $url  = "https://oapi.dingtalk.com/topapi/role/simplelist?access_token=$token";  
        $ass = $this->ding_post();
        $list = $ass['result']['list'];

        foreach($list as $k){
            $arr[] = $k['roles'];
        }

        foreach($arr as $k){
            foreach($k as $key){
                $ar[] = $key['id'];
        }
        }

        foreach($ar as $k){
        $data = array(
            "role_id"=>$k,
            "size"=>200
            );   
           $array[] = $this->http_post_data($url, $data); 

          
    }
    print_r($ass); die;
    //注：因钉钉系统权限未完善，数据权限未完成。
     }
      //获取角色详情
      public function ding_post_about(){
        $url  = "https://oapi.dingtalk.com/topapi/role/simplelist?access_token=0ea8d7f2c7ac398c84a93631ceb9013b";  
        $data = array(
            "role_id"=>"125477309",
            );   
          
        print_r($this->http_post_data($url, $data)); 
     }
     // 8.27 获取所有人信息
     public function staff_small_list(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->ding->small_list();
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
        // print_r($msg);die;
    }
    public function staffOfDing(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->ding->of_ding();
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
        // print_r($msg);die;
    }
    private function getMillisecond() {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
    }

}