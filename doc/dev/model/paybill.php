<?php
interface bill{
    public function bill_list();
    public function creat_bill();
    public function save();
}

class paybill{
    private $id,$name,$value,$project,$owner;
    
}