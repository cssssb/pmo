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
    public function get_51cto_title_csv(){
        $this->return_csv($this->get_51cto_title());
    }
    public function get_51cto_title(){
        $regex = "/alt=\"([【2019a-zA-z]|[\x{4e00}-\x{9fa5}]{1,4}).*\n/u";
        $head = 'alt="';
        $tail = '"></a>';
        for ($i=1; $i < 2; $i++) { 
            $str=file_get_contents("https://edu.51cto.com/courselist/index-p$i.html");
            // $preg = "/\s([A-Z]|[\x{4e00}-\x{9fa5}]{1,4}).*<\/a>\n/u";
            $preg = $regex;
            preg_match_all($preg,$str,$array);
            $data[] = $array[0];
        }
       return $this->filter($data,$head,$tail);
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-03-22
     * @Return:        
     * @Notes:         东方瑞通
     * @ErrorReason:   
     * ================
     */
     public function get_easthome_title_csv(){
         $this->return_csv($this->get_easthome_title());
     }
    public function get_easthome_title(){
            $regex = "/\s([A-Z]|[\x{4e00}-\x{9fa5}]{1,4}).*<\/a>\n/u";
            $head = '';
            $tail = '</a>';
        for ($i=1; $i < 2; $i++) { 
            $str=file_get_contents("https://www.easthome.com/front/courseSyllabuss/list/searchables?page.pn=$i&page.size=30");
            preg_match_all($regex,$str,$array);
            $data[] = $array[0];
        }
        return $this->filter($data,$head,$tail);
    }
    public function get_ke_qq_title(){
        // https://ke.qq.com/course/list?mt=1001
        // print_r($a);
        // exit;
        // echo json_encode($str,JSON_UNESCAPED_UNICODE);exit;
        // $regex = "/cors-name=\"course\">.*<\/a>/";
        $regex = "/cors-name=\"course\">.*<\/a>/";
        $head = 'cors-name="course">';
        $tail = '</a>';
        for($i=1;$i<2;$i++){
            $str =  file_get_contents("https://ke.qq.com/course/list?mt=1001&page=$i");
            // var_dump($str);
            preg_match_all($regex,$str,$array);
            $data[] = $array[0];
        }
        return $this->filter($data,$head,$tail);
    }
    public function get_ke_qq_title_csv(){
        $this->return_csv($this->get_ke_qq_title());
    }


    private function filter($data,$head='',$tail=''){
        foreach($data as $key){
            foreach($key as &$k){
               $tail==true? $k = substr($k,0,strrpos($k,$tail)):true;
               $head==true? $k = str_replace($head,'',$k):true;
               $list[] = $k;
            }
        }
        return $list;
    }
    private function return_csv($list){
        foreach($list as $key=>$v)
            {
            $a[$key][]=$v;
            }
        $header = [0=>'课程名称'];
        \app::load_sys_class('csv_out')->csv_class($a,time().'.csv',$header);
    }
    
}
?>