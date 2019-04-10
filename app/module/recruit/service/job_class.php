<?php
namespace recruit;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       job_recruit
 * @DataTime:  2019-04-02
 * @describe:  recruit_job service class
 * ================
 */
final class job_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('job_resume', 'recruit');
    }
    public function all_out(){
        $where = "time = '".date('Y-m-d',time())."'";
       

        $data = $this->model->select($where);
        return $this->export_filter($data);
    }
    public function get_ver_list(){
        $time = date('Y-m-d',time());
        // $time_where = "time like '".$time."%'";
        // $time_where = "time = '".$time;
        // for ($i=1; $i < 20; $i++) { 
        //     $where = $time_where.' and file_name ='.$i;
        //     if(!$this->model->get_one($where)){
        //         $number = $i-1;
        //         break;
        //     }
        // }
        // $nums = null;
        // for ($num=$number; $num > 0; $num--) { 
        //     $nums .= $num.',';
        // }
        // $where_file_name = substr($nums,0,strrpos($nums,','));
        // return explode(',',$where_file_name);
        // $where = $time_where;
        $data = $this->model->select_distinct($time);
        $str = '';
        foreach($data as $k){
            $str .= $k['file_name'].',';
        }
        return explode(',',substr($str,0,strrpos($str,',')));

    }
    public function export(){
        $where['out_state'] = 0;
        // $where = 'id in (1,2,3)';
        $data = $this->model->select($where);
        foreach($data as $k){
            $id = $k['id'];
            $array_id[] = $id;
        }
        
        $ids = implode(',',$array_id);
        // $ids ? true:$ids = '1,2,3';
        // echo $ids;die;
        $this->model->update('out_state =1',"id in ($ids)");
        return $this->export_filter($data);
    }
    // public function where_out($num=''){
    //     $num==null?$where = 'out_state=0':$where = $this->export_where($num);
    //     return $this->model->select($where);
    // }
    // private function export_where($where){
        
    //     $str = '';
    //     $where = explode(',',$where);
    //     foreach($where as $k){
    //         $str .= "'".$k."',"; 
    //     }
    //     $sql = "file_name in ($str) and time = '".date('Y-m-d');
    //     return $sql;

    // }
    public function where_out($where){
        $time = date('Y-m-d',time());
        $where_sql = "time = '$time' and file_name in ($where)";
        $data =  $this->model->select($where_sql);
        return $this->export_filter($data);
    }
    private function export_filter($data_list){
        if(!$data_list){
            return false;die;
        }
        foreach($data_list as $k){
            
            if($k['education']!=='' && $k['education']!=='中专' && $k['education']!=='高中' && $k['education']!=='初中' && (substr($k['age'],0,4)>1989)){
                $data[] = $k;
            }
        }
        foreach($data as $key){
            foreach($key as $k=>$v){
                $k=='name'?$a['姓名'] = $v:true;
                $k=='sex'?$a['性别'] = $v:true;
                $k=='phone'?$a['手机'] = $v:true;
                $k=='marketing_specialist'?$a['市场专员'] = $v:true;
                $k=='from_web'?$a['来源渠道'] = $v:true;
                $k=='demo'?$a['渠道明细'] = $v:true;
                $k=='age'?$a['年龄'] = $v:true;
                $k=='email'?$a['QQ/邮箱'] = $v:true;
                $k=='school'?$a['学校'] = $v:true;
                $k=='major'?$a['专业'] = $v:true;
                $k=='education'?$a['学历'] = $v:true;
                $k=='intention'?$a['意向课程/求职意向'] = $v:true;
                $k=='go_company'?$a['备注'] = $v:true;
            }
            $list[] = $a;
        }
        return $list;
    }
    public function out_zhilian($data){
       $data =  $this->filter($data,'智联投递');
       $time = date('Y-m-d');
       $file_name = $this->model->get_one("time = '$time' order by id desc")['file_name']+1;

       foreach($data as $k){
           if(!$this->model->get_one('phone='.$k['phone'])){
               $k['time'] = $time;
               $k['file_name'] = $file_name;
               $this->model->insert($k);
           }
       }
    //    var_dump($data);die;
       if($data){
           return true;
       }
       return false;
    }
    public function out_51($data){
       $time = date('Y-m-d');
        $data =  $this->filter($data,'前程无忧');
        $file_name = $this->model->get_one("time = '$time' order by id desc")['file_name']+1;
       foreach($data as $k){
        $k['time'] = $time;
        $k['file_name'] = $file_name;
           if(!$this->model->get_one('phone='.$k['phone'])){
            $k['time'] = $time;
               $this->model->insert($k);
           }
       }
       if($data){
        return true;
    }
    return false;
    }
    private function filter($data,$demo){
        // print_r($data);
        foreach($data as $k){
        // print_r($k);

                foreach($k as $key=>$val){
                    
                    $key =='姓名'? $a['name'] = $val:true;
                    // print_r($key);
                    $key =='性别'? $a['sex'] = $val:true;
                    $key =='电子邮件'? $a['email'] = $val:true;
                    $key =='手机'?$a['phone'] = $val:true;
                    $key =='市场专员'?$a['marketing_specialist'] = $val:true;
                    $key =='来源渠道'?$a['from_web'] = $val:true;
                    $key =='渠道明细'?$a['from_web_detailed'] = $val:true;
                   $key =='年龄'? $a['age'] = $val:true;
                   $key =='QQ/邮箱'? $a['email'] = $val:true;
                    $key =='学校'?$a['school'] = $val:true;
                   $key =='专业'? $a['major'] = $val:true;
                    $key =='学历'?$a['education'] = $val:true;
                    $key =='意向课程/求职意向'?$a['intention'] = $val:true;
                    $key =='课程/求职'?$a['intention'] = $val:true;
                    $key =='备注'?$a['mark'] = $val:true;
                    $key =='匹配度'?$a['matching_degree'] = $val:true;
                    $key =='简历编号'?$a['number'] = $val:true;
                    $key =='应聘职位'?$a['intention'] = $val:true;
                    $key =='应聘公司'?$a['go_company'] = $val:true;
                    $key =='发布城市'?$a['city'] = $val:true;
                    $key =='应聘日期'?$a['application_time'] = $val:true;
                    $key =='性别'?$a['sex'] = $val:true;
                    $key =='出生日期'?$a['age'] = $val:true;
                    $key =='目前居住地'?$a['live_city'] = $val:true;
                    $key =='户口/国籍'?$a['from_city'] = $val:true;
                    $key =='工作年限'?$a['work_year'] = $val:true;
                    $key =='学历/学位'?$a['education'] = $val:true;
                    $key =='毕业学校'?$a['school'] = $val:true;
                    $key =='联系电话'?$a['phone'] = $val:true;
                    $key =='电子邮箱'?$a['email'] = $val:true;
                    $key =='地址'?$a['detailed_address'] = $val:true;
                    $key =='邮编'?$a['zip_code'] = $val:true;
                    $key =='最近一家公司'?$a['last_company'] = $val:true;
                    $key =='最近一个职位'?$a['last_job'] = $val:true;
                    $key =='目前年收入'?$a['annual_income'] = $val:true;
                    $key =='期望薪资'?$a['salary_expectation'] = $val:true;
                    $key =='求职状态'?$a['state'] = $val:true;
                    $key =='标签名称'?$a['mark'] = $val:true;
                    $key =='移动电话'?$a['phone'] = $val:true;
                    $key =='通讯地址'?$a['city'] = $val:true;
                    $key =='户口'?$a['from_city'] = $val:true;
                    $key =='现在(前)单位'?$a['last_company'] = $val:true;
                    $key =='学校名称'?$a['school'] = $val:true;
                    $key =='专业名称'?$a['major'] = $val:true;
                    $key =='最高学历'?$a['education'] = $val:true;
                    $key =='期望月薪（税前）'?$a['salary_expectation'] = $val:true;
                    $key =='投递时间'?$a['marketing_speciadata'] = $val:true;
                    $a['demo'] = $demo;
                }
                $list[] = $a;
        }
        return $list;
    }
}