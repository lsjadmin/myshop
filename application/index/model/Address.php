<?php
    namespace app\index\model;
    use think\Model;
    class Address extends Model{
            //数据完成 在模型
        protected $insert=['user_id'];
        function setUserIdAttr(){
            $user_id=session('userInfo.user_id');
            return $user_id;
        }
    }
?>