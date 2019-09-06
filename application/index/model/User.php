<?php
    namespace app\index\model;
    use think\Model;
    class User extends Model{
            //密码加密
            public function setUserPwdAttr($value){
                return md5($value);
            }
    }
?>