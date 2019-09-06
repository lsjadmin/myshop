<?php
    namespace app\admin\model;
    use think\Model;
    class Goods extends Model{
        public function getIsUpAttr($value){
            $status = [1=>'上架',2=>'下架'];
            return $status[$value];
            }
    }
?>