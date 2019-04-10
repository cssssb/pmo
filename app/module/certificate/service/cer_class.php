<?php
namespace certificate;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       certificate
 * @DataTime:  2019-04-09
 * @describe:  certificate_cer service class
 * ================
 */
final class cer_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('certificate', 'certificate');

    }
   public function array_insert($data){
       echo $this->model->array_insert($data);
   }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-04-09
     * @Return:        
     * @Notes:         发送token和
     * @ErrorReason:   
     * ================
     */
    // private function key_filter($data){
    //     $str = '';
    //     foreach($data as $k){
    //         array_filp($k)=='name'?$str .= " name = $k and":true;
    //         array_filp($k)=='phone'?$str .= " phone = $k and":true;
    //         array_filp($k)=='usercode'?$str .= " usercode = $k and":true;
    //     }
    //      substr($str,0,strrpos($str,'and'));

    //     return $str;
    // }
    // public function get_cer($data){
    //     $type = [];
    //     foreach($data as $key){
    //         foreach($key as $k){
    //             switch ($key['type']) {
    //                 case '1':
    //                 $type['one'] =$this->key_filter($key);
    //                     break;
    //                 case '2':
    //                 $type['two'] =$this->key_filter($key);
    //                         break;
    //                 case '3':
    //                 $type['three'] =$this->key_filter($key);
    //                         break;
    //                 default:
    //                     # code...
    //                     break;
    //             }
    //         }
    //     }
    //     $str = $this->key_filter($data);
    //     return $this->model->get_cer($str);
    // }
    public function get_cer($data){
        $token['token'] = $data['token'];
        $user_id = $this->xx->get_one($token);
        return $this->model->select('user_id = '.$user_id);
    }
    
}