<?php
    namespace app\admin\model;
    use think\Model;
    class Cate extends Model{

    public function getCateShowAttr($value){
      $status = [1=>'√',2=>'×'];
      return $status[$value];
      }
    public function getCateNevshowAttr($value){
      $status = [1=>'√',2=>'×'];
      return $status[$value];
      }

    }
?>