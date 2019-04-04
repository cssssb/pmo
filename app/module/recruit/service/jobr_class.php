<?php
namespace recruit;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       job
 * @DataTime:  2019-04-01
 * @describe:  recruit_job service class
 * ================
 */
final class jobr_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('job_resume', 'recruit');
    }
        // 1：文件名， 2：数据， 3-10 ：lattice 第一行名称 ， 10-18：字段下标  ###注意###：参数必填
        public function excel($filename = 'excel', $data, $A, $B, $C, $D, $E, $F, $G, $H,$I,$J,$K,$L,$M, $va, $vb, $vc, $vd, $ve, $vf, $vg, $vh){
            // Vendor('phpoffice.phpexcel.Classes.PHPExcel');
            // $this->objPHPExcel = app::load_sys_class('phpexcel');
            include 'D:\PHPTutorial\code\erp\app\system\libs\phpexcel.php';
            $objPHPExcel = new \PHPExcel();
            $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
            $objActSheet = $objPHPExcel->getActiveSheet();
    
            $objActSheet->setCellValue('A1', $A);
            $objActSheet->setCellValue('B1', $B);
            $objActSheet->setCellValue('C1', $C);
            $objActSheet->setCellValue('D1', $D);
            $objActSheet->setCellValue('E1', $E);
            $objActSheet->setCellValue('F1', $F);
            $objActSheet->setCellValue('G1', $G);
            $objActSheet->setCellValue('H1', $H);
            $objActSheet->setCellValue('I1', $I);
            $objActSheet->setCellValue('J1', $J);
            $objActSheet->setCellValue('K1', $K);
            $objActSheet->setCellValue('L1', $L);
            $objActSheet->setCellValue('M1', $M);
    
            //设置个表格宽度
            // $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
            // $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            // $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            // $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            // $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
            // $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
            // $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            // $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    
            // 垂直居中
            $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
    
            //水平居中
            $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
             //水平居中
            $objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //字段字体
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('宋体')->setSize(12)->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setName('宋体')->setSize(12)->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setName('宋体')->setSize(12)->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setName('宋体')->setSize(12)->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setName('宋体')->setSize(12)->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setName('宋体')->setSize(12)->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setName('宋体')->setSize(12)->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setName('宋体')->setSize(12)->setBold(true);
            foreach($data as $k=>$v){
                $k +=2;
                $objActSheet->setCellValue('A'.$k, $v["$va"]);
                $objActSheet->setCellValue('B'.$k, $v["$vb"]);
                $objActSheet->setCellValue('C'.$k, $v["$vc"]);
                $objActSheet->setCellValue('D'.$k, $v["$vd"]);
                $objActSheet->setCellValue('E'.$k, $v["$ve"]);
                $objActSheet->setCellValue('F'.$k, $v["$vf"]);
                $objActSheet->setCellValue('G'.$k, $v["$vg"]);
                $objActSheet->setCellValue('H'.$k, $v["$vh"]);
                $objActSheet->getRowDimension($k)->setRowHeight(40);
            }
    
            $fileName = $filename;
            $date = date("Y-m-d",time());
            $fileName .= "_{$date}.xls";
            $fileName = iconv("utf-8", "gb2312", $fileName);
            ob_end_clean();//清除缓冲区,避免乱码
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");
            header("Content-Disposition:attachment;filename=\"$fileName\"");
            header("Content-Transfer-Encoding:binary");
            $objWriter->save('php://output');
        }
    public function read_execl($filename,$demo){
        $data  = $this->print_execl($filename);
        print_r($data);die;
        $list=[];
        $return=[];
        foreach($data as $key){
           $list = $data[0];
           foreach($key as $k=>$v){
               $return[$list[$k]] = $v;
           }
           $as[] = $return;
           unset($as[0]);
        }
       
        foreach($as as $k){
            $k['demo'] = $demo;
            $this->model->insert($k);
        }
        echo  '测试成功';
    }
    private function print_execl($filename){
        include 'D:\PHPTutorial\code\erp\app\system\libs\PHPExcel\IOFactory.php';
        $PHPReader = \PHPExcel_IOFactory::createReaderForFile($filename);

        $PHPExcel = $PHPReader->load($filename);
        /**读取excel文件中的第一个工作表*/
       
        $currentSheet = $PHPExcel->getSheet(0);
        /**取得最大的列号*/

       
        $allColumn = $currentSheet->getHighestColumn();
        /**取得一共有多少行*/
       
        $allRow = $currentSheet->getHighestRow();

        /**从第1行开始输出*/
        for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
       
         /**从第A列开始输出*/
         for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {
          $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65, $currentRow)->getValue();
          /**ord()将字符转为十进制数*/
          $date[$currentRow - 1][] = $val;
         }
       
        }

        $date[0] = $this->filter_data($date[0]);
        return $date;
      }
      private function filter_data($data){
          
          foreach($data as &$key){
            $key =='姓名'? $key = 'name':true;
            $key =='性别'? $key ='sex':true;
            $key =='电子邮件'? $key ='email':true;
            $key =='手机'?$key ='phone':true;
            $key =='市场专员'?$key ='marketing_specialist':true;
            $key =='来源渠道'?$key ='from_web':true;
            $key =='渠道明细'?$key ='from_web_detailed':true;
           $key =='年龄'? $key ='age':true;
           $key =='QQ/邮箱'? $key ='email':true;
            $key =='学校'?$key ='school':true;
           $key =='专业'? $key ='major':true;
            $key =='学历'?$key ='education':true;
            $key =='意向课程/求职意向'?$key ='intention':true;
            $key =='备注'?$key ='mark':true;
            $key =='匹配度'?$key ='matching_degree':true;
            $key =='简历编号'?$key ='number':true;
            $key =='应聘职位'?$key ='intention':true;
            $key =='应聘公司'?$key ='go_company':true;
            $key =='发布城市'?$key ='city':true;
            $key =='应聘日期'?$key ='application_time':true;
            $key =='性别'?$key ='sex':true;
            $key =='出生日期'?$key ='age':true;
            $key =='目前居住地'?$key ='live_city':true;
            $key =='户口/国籍'?$key ='from_city':true;
            $key =='工作年限'?$key ='work_year':true;
            $key =='学历/学位'?$key ='education':true;
            $key =='毕业学校'?$key ='school':true;
            $key =='联系电话'?$key ='phone':true;
            $key =='电子邮箱'?$key ='email':true;
            $key =='地址'?$key ='detailed_address':true;
            $key =='邮编'?$key ='zip_code':true;
            $key =='最近一家公司'?$key ='last_company':true;
            $key =='最近一个职位'?$key ='last_job':true;
            $key =='目前年收入'?$key ='annual_income':true;
            $key =='期望薪资'?$key ='salary_expectation':true;
            $key =='求职状态'?$key ='state':true;
            $key =='标签名称'?$key ='mark':true;
            $key =='移动电话'?$key ='phone':true;
            $key =='通讯地址'?$key ='city':true;
            $key =='户口'?$key ='from_city':true;
            $key =='现在(前)单位'?$key ='last_company':true;
            $key =='学校名称'?$key ='school':true;
            $key =='专业名称'?$key ='major':true;
            $key =='最高学历'?$key ='education':true;
            $key =='期望月薪（税前）'?$key ='salary_expectation':true;
            $key =='投递时间'?$key ='marketing_speciadata':true;
        }
        
        return $data;
      }
}