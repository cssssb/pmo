<?php
namespace user;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    lion
 * @ver:       
 * @DataTime:  2018-10-18
 * @describe:  user_account controller class
 * ================
 */
class account_controller
{
    private $data,$account;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->user = app::load_service_class('user_class', 'user');//
        $this->route = app::load_service_class('route_class', 'role');//
        $this->common = app::load_service_class('common_class', 'examine');//
        $this->json = app::load_service_class('view_class', 'role');//
        $this->staff = app::load_service_class('staff_user_class','user');
        $this->menu = app::load_service_class('menu_class','role');
    }
    public function test(){
        
        // print_r($this->route->return_url());die;
        $role_id = 2;
        // echo  json_encode($this->json->return_json($role_id));die;
        echo json_encode($this->menu->return_menu($role_id));
    }
    public function login()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-10-19
         * @describe:  login function
         * ================
         * 
         */
         $post = $this->data->get_post();//获得post
        //  $post['account'] = '褚寅良'; 
        //  $post['password'] = '123456';
        if($post['account']!=true){
            $this->data->out(3001,$post);
            
        }
        if($post['password']!=true){
        $this->data->out(3002,$post);
    }
         $strlen_username = strlen($post['account']);
         $strlen_password = strlen($post['password']);
         if(!preg_match(
             "/^[a-zA-Z0-9_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]+$/",$post['account'])){
             $this->data->out(3004,$post);
         } elseif (20 < $strlen_username || $strlen_username < 2) {
             $this->data->out(3005,$post);
         }
         if (!preg_match(
            "/^[a-zA-Z\d_]{6,}$/",$post['password']
        )) {
            $this->data->out(3006);        
        } elseif (19 < $strlen_password) {
            $this->data->out(3007);
        }
         $cond = $this->user->login($post['account'],substr(md5($post['password']),0,8));
        //  var_dump($code);die;
        //开始输出
        switch ($cond) {
           
            case   3://账号密码不符
                $this->data->out(3003,$post);
                break;
            default://登录成功
            //游客
            $tourist = $this->common->return_staff_user_id($cond);
            //  通过用户id获取所在角色
            if($tourist){
            $role_id = $this->common->return_role($cond);
            //  通过角色信息返回路由
            $return['url'] = $this->route->return_role_in_route($role_id);
            // 试图权限
            $return['json'] = $this->json->return_json($role_id);
            // 试图属性权限
            // $return['view'] = $this->view->return_view($role_id);
            }else{
                //返回路由
                $return['url'] = $this->route->return_url();
            }
            // var_dump($return);die;
                //返回所有的路由
                // $return = $this->route->return_url();
                $return['token'] = $cond;
                // echo json_encode($tourist);die;
                $this->data->out(3008,$return);
            }
    }
        public function routelist()
        {
            /**
             * ================
             * @Author:    css
             * @ver:       1.0
             * @DataTime:  2018-12-06
             * @describe:  routelist function
             * ================
             */
            $post = $this->data->get_post();//获得post
            $post['token'] = '8JvIzKRNP5';
            $role_id = $this->common->return_role($post['token']);
            if($role_id){
                //  通过角色信息返回路由
                $return['url'] = $this->route->return_role_in_route($role_id);
                // 试图权限
                // $return['json'] = $this->json->return_json($role_id);
                // 试图属性权限
                $return['view'] = $this->menu->return_menu($role_id);
                $return['menu'] = $this->menu->return_menu_static($role_id);
            }else{
                //返回路由
                $return['url'] = $this->route->return_url();
            }
            echo json_encode($return);die;
            //开始输出
            $this->data->out(2001,$data);
        }
        //12.6 静态栏生成器
        public function addstatic(){
            $data = $this->menu->return_menu(8);
            // echo json_encode($data);die;
            $return = $this->menu->add_v_menu($data);
            if($return){
                echo 1;die;
            }else{
                echo 2;die;
            }
            print_r($data);die;
        }
     //分配账号密码器
    public function admin_user(){
        // $password = '1233211234567';
        // $password_user = substr(md5($password),0,8);
        // echo $password_user;
        $where_sql = 'state >= 0 and ';
        $a = substr($where_sql,0,strrpos($where_sql,'and '));
        echo $a;
    }

    //账号分配器
    private function user_id_add(){
        //获取用户表中姓名
        $users = $this->staff->select();
        //插入至user表的username字段中
        foreach($users as $k){
            $data['username'] = $k['name'];
            $data['password'] = 'e10adc39';
            $user_id = $this->user->model->insert($data,1);
        //把此数据id放到职员表中
            $user['user_id'] = $user_id;
            $where['id'] = $k['id'];
            if($user_id){
            $ass = $this->staff->model->update($user,$where);
        }
        }
        if($ass){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-03-13
     * @Return:        
     * @Notes:         修改密码
     * @ErrorReason:   
     * ================
     */
     public function edit_password()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       
          * @DataTime:  2019-03-13
          * @describe:  edit_password function
          * ================
          */
         $post = $this->data->get_post();//获得post
         if (!preg_match(
            "/^[a-zA-Z\d_]{6,}$/",$post['new_password']
        )){
            $this->data->out(3006);
        }
         $new_password = substr(md5($post['new_password']),0,8);
         $data = $this->user->edit_password($post['token'],$new_password);
         $data?$cond = 0:$cond = 1;
         
         //开始输出
         switch ($cond) {
             case   1://异常1
                 $this->data->out(4007);
                 break;
             default:
                 $this->data->out(4006);
             }
     }
    
} 