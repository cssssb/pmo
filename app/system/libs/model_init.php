<?php
namespace system;

class model_init{
    public function init_table_create_sql($data_model,$table_name){
        $sql ="CREATE TABLE `$table_name`(
          `id` int NOT NULL AUTO_INCREMENT,
          ";
        foreach($data_model as $data){
            $sql .= "`$data[1]` ".$this->init_table_create_sql_type($data[0])." COMMENT '".$data[2]."',";
        }
        $sql.=" PRIMARY KEY (`id`));";
        return str_replace(PHP_EOL, '', $sql);
    }
    private function init_table_create_sql_type($type){
        $res ="";
        switch ($type){
            case "int":
                $res = "int(11)";
                break;
            case "varchar":
                $res = "varchar(255)";
                break;
            default:
                $res = "varchar(255)";
        }
        return $res;
    }
}