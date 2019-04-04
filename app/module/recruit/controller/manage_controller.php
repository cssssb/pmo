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
        $this->job = app::load_service_class('jobr_class','recruit');
        // echo 1;
        // include 'D:\PHPTutorial\code\erp\app\system\libs\phpexcel.php';
    }
    public function index(){
        echo  "<!DOCTYPE html>" ;
        echo  " <html lang='en'>" ;
        echo  " <head>" ;
        echo  "     <meta charset='UTF-8'>" ;
        echo  "     <meta name='viewport' content='width=device-width, initial-scale=1.0'>" ;
        echo  "     <meta http-equiv='X-UA-Compatible' content='ie=edge'>" ;
        echo  "     <title>招聘</title>" ;
        echo  " </head>" ;
        echo  " <body>" ;
        echo  "     <form action='http://192.168.60.175:666/recruit/manage/post_job' method='post' enctype='multipart/form-data'>" ;
        echo  "     <input type='file' name='file' accept='application/vnd.ms-excel'>智联" ;
        echo  "     <input type='submit' name='上传智联文件'>" ;
        echo  " </form>" ;
        echo  " <form action='http://192.168.60.175:666/recruit/manage/post_job_2' method='post' enctype='multipart/form-data'>" ;
        echo  "     <input type='file' name='file' accept='application/vnd.ms-excel'>51" ;
        echo  "     <input type='submit' name='上传51文件'>" ;
        echo  " </form>" ;
        echo  " <form action='http://192.168.60.175:666/recruit/manage/post_job2' method='post' enctype='multipart/form-data'>" ;
        echo  "     <input type='submit' name='上传51文件'>生成etc模板" ;
        echo  " </form>" ;
        echo  " </body>" ;
        echo  " </html>";
    }
    public function a(){
        echo 12;
    }
    public function post_job(){
        // echo '一'.microtime();
        // var_dump(readfile($_FILES['file']['tmp_name']));
        // echo '二'.microtime();
        $file_name = 'C:\Users\Administrator\Desktop\phpexl\智联.xls';
        // $this->job->read_execl($_FILES['file']['tmp_name'],'智联');
        $this->job->read_execl($file_name,'智联');
        // echo '三'.microtime();

           
    }
    public function post_job_2(){
        $this->job->read_execl($_FILES['file']['tmp_name'],'51');
    }
    public function ceshi(){
        $filename = 'D:\PHPTutorial\code\erp\app\text\list.xls';
        $this->job->read_execl($filename);
    }
    public function about(){
        $data = [
            ['a','b','c'],
            [1,2,3],
            [4,5,6]
        ];
        $data[0] =  $this->b($data[0]);
        echo '<pre>';
        print_r($data);
    }
    public function b($data){
            foreach($data as $key=>$val){
                $data[$key][$val]=='a'?$data[$key][$val]=1:true;
            }
        return $data;
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

    public function out_51_excel(){

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

    $filename = 'D:\PHPTutorial\code\erp\app\text\list.xls';
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
    $date = $objPHPExcel->getActiveSheet()->getCell('A16')->getValue();
    print_r($objPHPExcel);
    print_r($date);

    
  }

}