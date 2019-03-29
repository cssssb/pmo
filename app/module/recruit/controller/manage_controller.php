<?php
namespace recruit;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-28
 * @describe:  recruit_manage controller class
 * ================
 */
class manage_controller
{
    // private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        // echo 1;
        // include 'D:\PHPTutorial\code\erp\app\system\libs\phpexcel.php';
    }
  
    public function out_ETC_excel(){
        $data = [
            0=>[
                '1','2','3'
            ],
            1=>[
                '4','5','6'
            ]
        ];
        $data = '';

        $this->excel('ETC', $data, '姓名', '性别', '手机', '市场专员', '来源渠道', '渠道明细', '年龄', 'QQ/邮箱','学校','专业','学历','意向课程/求职意向','备注', 'order_number', 'total_price', 'order_num', 'pay_type', 'buy_time', 'addr_name', 'addr_tel', 'addr_address');

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
    public function txt(){
        $filename = 'D:\PHPTutorial\code\erp\app\text\list.xls';
        // var_dump(file_exists($filename));
        // die;
        include 'D:\PHPTutorial\code\erp\app\system\libs\phpexcel.php';
        include 'D:\PHPTutorial\code\erp\app\system\libs\PHPExcel\IOFactory.php';
        $execl = new \PHPExcel_IOFactory;
        
        // $objReader = $execl::createReaderForFile($filename);
        // $objPHPExcel = $execl->load($filename);
        var_dump($objPHPExcel);
        // $objPHPExcel->setActiveSheetIndex(1);
        // $date = $objPHPExcel->getActiveSheet()->getCell('A16')->getValue();  
        $currentSheet = $objPHPExcel->getSheet(0);

        for ($i = 10; $i <= 17; $i++){
            $result = (string) ($currentSheet->getCell('I'.$i)->getValue());
            echo $result . "</br>";
        }
  }
  public function xls(){
    //   echo 1;die;
    $filename = 'D:\PHPTutorial\code\erp\app\text\list.txt';
    // print_r(file_get_contents($filename));
    include 'D:\PHPTutorial\code\erp\app\system\libs\PHPExcel\IOFactory.php';
    include 'D:\PHPTutorial\code\erp\app\system\libs\phpexcel.php';
    // $objReader = \PHPExcel_IOFactory::createReaderForFile($filename);
    // $objPHPExcel = $objReader->load($objReader);
    // $objPHPExcel->setActiveSheetIndex(1);
    // $date = $objPHPExcel->getActiveSheet()->getCell('A16')->getValue();
    // // $objReader = $execl::createReaderForFile($filename);
    // var_dump($date);
    $objReader = \PHPExcel_IOFactory::createReaderForFile($filename);
    $objPHPExcel = $objReader->load($filename);
    $objPHPExcel->setActiveSheetIndex(0);
    // $date = $objPHPExcel->getActiveSheet()->getCell('A16')->getValue();
    // print_r($objPHPExcel);
  }
}