<?php
namespace user;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2018-12-19
 * @describe:  user_newding controller class
 * ================
 */
class newding_controller
{
    private $data,$newding;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->token = app::load_config('ding_password');
        //todo 加载相关模块
    }
    private function url($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        if ($data === false) {
            return "CURL Error:" . curl_error($ch);
        }
        return $data;
    }
    public function return_token()
    {
        $corpid = app::load_config('ding_password')['corpid'];
        $corpsecret = app::load_config('ding_password')['corpsecret'];
        $url = "https://oapi.dingtalk.com/gettoken?corpid=" . $corpid . "&corpsecret=" . $corpsecret;
        $data = $this->url($url);
        // echo json_decode($data, true)["access_token"];
        return json_decode($data, true)["access_token"];
    }
     //部门
     public function ding_department()
     {
         $token = $this->token;
         $url = "https://oapi.dingtalk.com/department/list?access_token=" .$this->token;
         $data = $this->url($url);
         $ass = json_decode($data, true);
         return $ass['department'];
     }
     //通过部门查找所有的职工
     public function ding_staff_list(){
        $token = $this->return_token();
        $department = $this->ding_department();
        foreach($department as $key){
            $data[] = $this->return_one($key['id']);
        }
        foreach ($data as $key=>$val ) {
            $ass[] = $val['userlist'];
        }
        foreach($ass as $key){
            foreach($key as $k){
                $list[] = $k;
            }
        }
            $tmp_array = array();
            $new_array = array();
            // 1. 循环出所有的行. ( $val 就是某个行)
            foreach($list as $k => $val){
                $hash = ($val['unionid']);
                if (!in_array($hash, $tmp_array)) {
                    // 2. 在 foreach 循环的主体中, 把每行数组对象得hash 都赋值到那个临时数组中.
                    $tmp_array[] = $hash;
                    $new_array[] = $val;
                }
            }
            //员工去重
        return $this->to_equally($new_array);
     }

     //和表里的老员工进行匹配  有此id quit值变为1
     private function to_equally($new){
        $mode = app::load_model_class('staff','staff');
         $old = $this->old_staff();
         foreach($new as $k){
             foreach($old as $key){
                 //老员工状态的修改
                 if($k['unionid']==$key['unionid']){
                     $mode->update('quit=1','unionid='."'".$key['unionid']."'");
                    }
                }
            }
           foreach($old as $key){
            $tmp[$key['unionid']] = $key;
           }
           foreach($new as $key){
               if(!isset($tmp[$key['unionid']])){
                $department = implode(",", $key['department']);
                $list = [
                    'userid' => $key['userid'],
                                'unionid' => $key['unionid'],
                                'mobile' => $key['mobile'],
                                'isAdmin' => $key['isAdmin'],
                                'isBoss' => $key['isBoss'],
                                'isHide' => $key['isHide'],
                                'isLeader' => $key['isLeader'],
                                'name' => $key['name'],
                                'department' => $department,
                                'position' => $key['position'],
                                'email' => $key['email'],
                                'hiredDate' => $key['hiredDate'],
                                'quit' => 1,
                ];
                $mode->insert($list);
               }
           }
            
            return true;
            //  echo 1;
        }
     //查找表中员工
     public function old_staff(){
         $mode = app::load_model_class('staff','staff');
         $data = $mode->select(1);
         foreach($data as $k){
             $mode->update('quit=0','id = '.$k['id']);
         }
        return $data;
        }
        
     //通过部门查找职工
     public function return_one($department){
         $url = "https://oapi.dingtalk.com/user/list?access_token=" . $this->token . "&department_id=$department";
         return  json_decode($this->url($url),1);
         
     }
    //  public function to_update($data){
    //     $mode = app::load_model_class('staff','staff');
    //     foreach($data as $k){
    //         $department = implode(",", $k['department']);
    //         $list = [

    //             'userid' => $k['userid'],
    //             'unionid' => $k['unionid'],
    //             'mobile' => $k['mobile'],
    //             'isAdmin' => $k['isAdmin'],
    //             'isBoss' => $k['isBoss'],
    //             'isHide' => $k['isHide'],
    //             'isLeader' => $k['isLeader'],
    //             'name' => $k['name'],
    //             'department' => $department,
    //             'position' => $k['position'],
    //             'email' => $k['email'],
    //             'hiredDate' => $k['hiredDate'],
    //         ];
    //        $a[] =  $mode->insert($list);
    //     }
    //     if($a){
    //         echo 1;
    //     }else{
    //         echo 2;die;
    //     }
    //  }
}