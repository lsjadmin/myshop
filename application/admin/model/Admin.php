<?php
    namespace app\admin\model;
    use think\Model;
    class Admin extends Model{
        //在数据库中可以填入 salt
        protected $insert=['salt'];
        protected $salt;
        //密码加密(修改器)
        public function setadminPwdAttr($value){
           //生成盐值
           $this->salt=$salt=createSalt();
           //生成密码
           $pwd=createPwd($value,$salt);
           return $pwd;
         }
        //数据补全(数据完成)
         public function setSaltAttr(){
           return $this->salt;
         }

    }
?>