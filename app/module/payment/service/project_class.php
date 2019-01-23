<?php
namespace payment;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       payment_project
 * @DataTime:  2019-01-16
 * @describe:  payment_project service class
 * ================
 */
final class project_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('payment_project', 'payment');
        $this->common = app::load_service_class('common_class','examine');
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-22
     * @Return:        
     * @Notes:         list_csv 根据查询条件导出csv数据
     * @ErrorReason:   
     * ================
     */
     
     public function list_csv($post){
        $list = $this->model->list_csv($post);
        foreach($list as &$k){
            $k['submit_time'] = date('Y-m-d H:i:s',$k['submit_time']);
            $k['create_time'] = date('Y-m-d H:i:s',$k['create_time']);
        }
        $header_data = array(
            '支出内容',
            '支出金额',
            '创建时间',
            '领款人姓名',
            '提交时间',
            '财务编号',
            '项目编号',
            '项目名称'
        );
        $file_name = date('Y-m-d', time())."file.csv"; 
        return  $this->csv_class($list,$file_name,$header_data);
    }
     
    private function csv_class($data,$file_name,$header_data)
    {    
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename='.$file_name);
        header('Cache-Control: max-age=1000');
        // header( "Content-Type:   application/force-download ");
        $fp = fopen('php://output', 'a');
        if (!empty($header_data)){
            foreach ($header_data as $key => $value) {
                 $header_data[$key] = iconv('utf-8', 'gbk//IGNORE', $value);
            }
            fputcsv($fp, $header_data);
        }
        $num = 0;
        //每隔$limit行，刷新一下输出buffer，不要太大，也不要太小
        $limit = 1000;
        //逐行取出数据，不浪费内存
        $count = count($data);
             if ($count > 0) {
                 for ($i = 0; $i < $count; $i++) {
                   $num++;
                     //刷新一下输出buffer，防止由于数据过多造成问题
                     if ($limit == $num) {
                         ob_flush();
                         flush();
                         $num = 0;
                     }
                     $row = $data[$i];
                     foreach ($row as $key => $value) {
                         $row[$key] = iconv('utf-8', 'gbk//IGNORE', $value);
                     }
                    fputcsv($fp, $row);
                 }
             }
        fclose($fp);
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-16
     * @Return:        
     * @Notes:         add 关联支出到项目
     * @ErrorReason:   
     * ================
     */
     public function add($payment_id,$proejct_id){
        $where['payment_id'] = $payment_id;
        $data['project_id'] = $proejct_id;
        $a = $this->model->get_one($where);
        if($a==true){
            return $this->model->update($data,$where);
        }
        $data['payment_id'] = $payment_id;
        return $this->model->insert($data);
     }

     /**
      * ================
      * @Author:        css
      * @Parameter:     
      * @DataTime:      2019-01-16
      * @Return:        
      * @Notes:         list 查看所有支出和其所属项目
      * @ErrorReason:   
      * ================
      */
      public function list($token,$page_num,$page_size){
          $id = $this->common->return_user_id($token)['id'];
          $data['data_body'] = $this->model->payment_project_list($id,$page_num,$page_size);
          $data['page_num'] = $page_num;
          $data['page_size'] = $page_size;
          $data['count'] = $this->model->payment_project_count($id);
          return $data;
      }
}