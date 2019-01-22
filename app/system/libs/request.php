<?php
namespace system;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2019-01-17
 * @describe:  system_request controller class
 * ================
 */
 final class request
{
    private $data,$request;
    /**
     * 构造函数
     */
    public function __construct()
    {
    }
    // final public function request($request){
    //     //传过来的数组
    //     switch ($request['data_type']) {
    //         case 'csv':
    //           return  $this->request_csv($request['query_condition']);
    //             break;
    //         case 'page_json':
    //           return $this->request_page_json($request['query_condition']);
    //             break;
    //         default:
    //           return $this->request_json($request['query_condition']);
    //             break;
    //     }
        
    // }
    // final public function request_csv($data){
    //     $page_sql = $this->page_sql($data['page_size'],$data['page_num']);
    //     unset($data['page_size'],$data['page_num']);
    //     $where_sql = $this->where_sql($data);
    //     $sql = $where_sql.$page_Sql;
    //     return $sql;
    // }
    final public function sql_make_page($database,$list,$nature,$left_join='',$count){
        $data = $list['query_condition'];
        $page_sql = $this->page_sql($data['page_size'],$data['page_num']);
        // $page_sql = $this->page_sql();
        unset($data['page_size'],$data['page_num']);
        $where_sql = $this->where_sql($data);
        if($left_join!==''){
        $left_join_sql = $this->left_join_sql_all($left_join);}
        // foreach($data as $k=>$v){
        //     if(isset($v['database'])){
        //     $nature .=
        //     $v['database'].".$k "; 
        //    }
        //    $nature .= "$k
        //     ";
        // }
        // if(!isset($nature)){
        //     $nature = '*';
        // }
        // $nature = '*';
        if($count!=true){
        return "select $nature from $database $left_join_sql where ".$where_sql.$page_sql;}else{
            return "select count(*) from $database $left_join_sql where ".$where_sql.$page_sql;
        }
    }
    final public function sql_make($database,$data,$left_join){
        $where_sql = $this->where_sql($data);
        $left_join_sql = $this->left_join_sql_all($left_join);
        return "$database $left_join_sql where ".$where_sql;
    }
    final public function left_join_sql_all($left_soin){
        foreach($left_soin as $k){
            $return .= $this->left_join_sql($k['base'],$k['base_field'],$k['chain_base'],$k['chain_base_field']);
        }
        return $return;
    }
    // final public function request_json($data){
    //     $where_sql = $this->where_sql($data);
    // }
    final public function page_sql($page_size_data,$page_num_data){
        $page_size_data['query_data']? $page_size = $page_size_data['query_data']:$page_size=20;
        $page_num_data['query_data']? $page_num = $page_num_data['query_data']:$page_num = 1;
        $offset = $page_size*($page_num-1);
        return " limit $offset,$page_size";

    }
        final public function where_sql($data){
        // $where_sql  = "";
        foreach($data as $k=>$v){
            
            if($v['condition']=='equal'){
                $v['batabase']?
                $where_sql .=  $v['database'].".$k = '".$v['query_data']."' and ":
                $where_sql .=  "$k = '".$v['query_data']."' and ";
            }
            if($v['condition']=='more'){
                $v['batabase']?
                $where_sql .= $v['database'].".$k >= ".$v['query_data']." and":
                $where_sql .= "$k >= ".$v['query_data']." and";
            }
            if($v['condition']=='less'){
                $v['batabase']?
                $where_sql .= $v['database'].".$k <= ".$v['query_data']." and ":
                $where_sql .= "$k <= ".$v['query_data']." and ";
            }
            if($v['condition']=='like'){
                $v['batabase']?
                $where_sql .= $v['database'].".$k like '%".$v['query_data']."%' and ":
                $where_sql .= "$k like '%".$v['query_data']."%' and ";
            }
            if($v['condition']=='between'){
                $v['batabase']?
                $where_sql .= $v['database'].".$k >= ".$v['query_data'][0]." and ".$v['database'].".$k <= ".$v['query_data'][1]." and ":
                $where_sql .= "$k >= ".$v['query_data'][0]." and $k <= ".$v['query_data'][1]." and ";
            }
            if($v['condition']=='equal_many'){
                $v['key'] = $k;
               $where_sql .= $this->equal_many($v);
            }
        }
       $sql = substr($where_sql,0,strrpos($where_sql,'and '));
       if($sql!=true){
        $sql = 1;
       }
        return $sql;
        // echo $sql;
    }
    
    final public function equal_many($data){
        if(is_numeric($data['query_data'][0])==true){
            $data['batabase']?
            $return = $data['database'].'.'.$data['key'].' in ('.implode(',',$data['query_data']).') and ':
            $return = $data['key'].' in ('.implode(',',$data['query_data']).') and ';
            return $return;
        }
        foreach($data['query_data'] as $k){
            $data['batabase']?
            $return .= " find_in_set('".$k."',".$data['database'].".".$data['key'].") or ":
            $return .= " find_in_set('".$k."',".$data['key'].") or ";
        }
        $str = substr($return,0,strrpos($return,'or '));
        $sql = ' ('.$str.') and ';
        return $sql;
    }
    
    // final public function selelct_data(){
        
    //     $left = $this->left_join_sql();
    //     $sql_all = "
    //     SELECT
    //     *
    //     FORM
    //     WHERE
    //     ";
    // }
    
    final public function left_join_sql($base,$base_field,$chain_base,$chain_base_field){
        $str = "
        LEFT JOIN $chain_base on $base.$base_field = $chain_base.$chain_base_field";
        return $str;
    }
    // final public function total_sql($data,$where,$database,$left){
    //     $data = [
    //         0=>[],
    //         1=>[],
    //         2=>[],
    //     ];
    // }
}