<?php
namespace system;

defined('IN_LION') or exit('No permission resources.');

final class crawler{
    //爬虫支持
    public function __construct($regex='',$head='',$tail='')
    {   
        // echo $regex;
        // echo $head;
        // echo $tail;
        $this->head = $head;
        $this->tail = $tail;
        $this->regex = $regex;
        header("Content-type: text/html; charset=utf-8");
        // $this->get_web_content();
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-03-21
     * @Return:        
     * @Notes:         51cto学院
     * @ErrorReason:   
     * ================
     */
    public function get_web_content(){
        $regex = "/alt=\"([【2019a-zA-z]|[\x{4e00}-\x{9fa5}]{1,4}).*\n/u";
        $head = 'alt="';
        $tail = '"></a>';
        for ($i=1; $i < 2; $i++) { 
            $str=file_get_contents("https://edu.51cto.com/courselist/index-p$i.html");
            // $preg = "/\s([A-Z]|[\x{4e00}-\x{9fa5}]{1,4}).*<\/a>\n/u";
            $preg = $regex;
            preg_match_all($preg,$str,$array);
            $data[] = $array[0];
            // $list[] = $data;
        }
        $this->filter($data);
    }
    // public function 
    private function filter($data,$head,$fail){
        foreach($data as $key){
            foreach($key as &$k){
                $k = substr($k,0,strrpos($k,$tail));
                $k = str_replace($head,'',$k);
                $list[] = $k;
            }
        }
        foreach($list as $key=>$v)
            {
            $a[$key][]=$v;
            }
        $header = [0=>'课程名称'];
        \app::load_sys_class('csv_out')->csv_class($a,time().'.csv',$header);
    }
}
?>