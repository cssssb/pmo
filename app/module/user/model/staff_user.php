<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-09
 * @describe:  user_staff_user model class
 * ================
 */
class staff_user extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'staff_user';
        parent::__construct();
    }
    // //11.20  
    // public function get_the_user_leader_data($user_id){
    //     $where['id'] = $user_id;
    //     $user_data = $this->get_one($where);
    //     //判读此user_id是不是管理员
    //     if($user_data['isLeader']==1){
    //         //如果是管理员
    //         //搁置等褚哥
    //     }
    //         //如果不是管理员 通过部门信息获取部门管理员id
    //         $admin['department'] = $user_data['department'];
    //         $admin_id = $this->get_one($admin);
    //         return $admin_id;
    // }
    public function get_the_leader_department($deparment_id)
	{
		$sql = "SELECT
		* 
		FROM
		pmo_staff_user where  FIND_IN_SET($deparment_id,department)";

		$all = $this->query($sql);
		$date = $this->fetch_array($all);
		return $date;
	}
}