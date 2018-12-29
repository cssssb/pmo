<?php 
/**
 *  orm_interface.php 对象关系模型接口
 *
 */
interface orm_interface{
    
    public static function tableName();
    // 返回调用的类名 get_called_class

    public static function primaryKey();
    // 返回主键

    public static function findOne($condition);

    public static function findAll($condition);

    public static function updateAll($condition, $attributes);

    public static function deleteAll($condition);

    public function insert();

    public function update();

    public function delete();
}