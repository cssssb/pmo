<?php
namespace user;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       ding_user
 * @DataTime:  2018-08-21
 * @describe:  V1.0
 * ================
 */
class ding_one_controller
{
    private $view;
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->ding = \app::load_service_class('ding', 'user');//加载json数据模板
        $this->view = \app::load_view_class('budget_paper', 'user');//加载json数据模板
       
    }
    //token
    public function ding_token()
    {


        $ch = curl_init();
        $corpid = 'ding33c0349684398ce235c2f4657eb6378f';
        $corpsecret = 'm6Pk3bGwq3BdwEwEvMgwt-0O5194aSR0kNG0zEcIhcNlDyHbjdXzqra-VbrT2xIk';
        $url = "https://oapi.dingtalk.com/gettoken?corpid=" . $corpid . "&corpsecret=" . $corpsecret;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data, true)["access_token"];

        if ($data === false) {
            return "CURL Error:" . curl_error($ch);
        }

    }

    private function ding_department()
    {
        $token = $this->ding_token();
        $ch = curl_init();
        // $url =  "https://oapi.dingtalk.com/user/list?access_token=32963d3d918d3452bb7dc3d99c96213e&department_id=26509421";
        $url = "https://oapi.dingtalk.com/department/list?access_token=" . $token;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $ass = json_decode($data, true);
        // echo '<pre>';
        // print_r($ass['department']);die;
        return $ass['department'];
        if ($data === false) {
            return "CURL Error:" . curl_error($ch);
        }
    }

    private function ding_member()
    {
        
        $token = $this->ding_token();
        $departments = $this->ding_department();
        foreach ($departments as $k => $v) {
            $department[$k]['id'] = $departments[$k]['id'];
            $department[$k]['name'] = $departments[$k]['name'];
        }
        return $department;
        // echo '<pre>';
        // print_r($department);die;

    }

    public function ding_member_about()
    {
        $member = $this->ding_member();

        $token = $this->ding_token();
        foreach ($member as $members) {
            $ch = curl_init();
            $url = "https://oapi.dingtalk.com/user/list?access_token=" . $token . "&department_id=" . $members['id'];
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            $ass[$members['name']] = json_decode($data, true);
        }
        $a = array_keys($ass);
        foreach ($ass as $k => $v) {
            $list[] = $ass[$k]['userlist'];
        }
        foreach ($list as $k) {
            foreach ($k as $v) {
                $css[] = $v;
            }
        }
        echo '<pre>';
        return $css;
    }

    public function add_ding()
    {
        $list = $this->ding_member_about();
        $number = mt_rand(1, 100);
        foreach ($list as $k) {
            $department_id = implode(",", $k['department']);
            $data = [
                'position' => $k['position'],
                'department' => $department_id,
                'userid' => $k['userid'],
                'unionid' => $k['unionid'],
                'name' => $k['name'],
                'jobnumber' => $k['jobnumber'],
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
        } else {
        //失败        
        }
    }
   
    //二维数组去重
    function array_unique_fb($data)
    {
        foreach ($array2D as $v) {
            $v = join(',', $v); //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
            $temp[] = $v;
        }
        $temp = array_unique($temp); //去掉重复的字符串,也就是重复的一维数组
        foreach ($temp as $k => $v) {
            $temp[$k] = explode(',', $v); //再将拆开的数组重新组装
        }
        return $temp;
    }

    public function staff_of_ding(){
        // echo  json_encode(111);die;
        $data = $this->ding->of_ding();
        // var_dump($data);die;
        $ass = $this->view->staff_of_ding($data);
        // var_dump($ass);die;
        // print_r( $ass);die;
        echo  ($ass);
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
     private function ding_post(){
        $token = $this->ding_token();
        $url  = "https://oapi.dingtalk.com/topapi/role/list?access_token=$token";  
        $data = array(
            "size"=>"200",
            "offset	"=>"0",
            );   
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
    print_r($array); die;
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
        $data = $this->ding->small_list();
        echo json_encode($data);
    }
    /**
     * ================
     * @Author:    css
     * @ver:       V1.0
     * @DataTime:  2018-08-28
     * @describe:  各部门人员函数封装
     * ================
     */
    //管理
    public function header_staff(){
        $department = 26509419;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->header_staff($data);
        // echo json_encode($data);
        return var_dump($data);die;
    }
    //财务
    public function finance_staff(){
        $department = 26509420;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->finance_staff($data);

        return var_dump($data);die;
    }
    //人事
    public function personnel_matters_staff(){
        $department = 26509421;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->personnel_matters_staff($data);
        return var_dump($data);die;
    }
    //技术
    public function skill_staff(){
        $department = 26509422;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->skill_staff($data);
        return var_dump($data);die;
    }
}