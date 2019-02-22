<?php
/**
 *  db_factory.class.php 数据库工厂类
 *
 * @copyright			(C) 2005-2015 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2015-02-10
 */
namespace system;

defined('IN_LION') or exit('No permission resources.');

final class csv_out {
	public function csv_class($data,$file_name,$header_data)
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
}
?>