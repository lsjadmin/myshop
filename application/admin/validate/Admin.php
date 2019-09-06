<?php
    namespace app\admin\validate;
    use think\Validate;
    class Admin extends Validate{
        protected $rule =   [
            'admin_name'  => 'require|checkName|unique:admin',
            'admin_pwd'   => 'require',
            'admin_tel'=>'require|checkTel',
            'admin_email'=>'require|email'
            
               
       ];
       protected $message  =   [
              'admin_name.require' => '名称必填',
               'admin_name.unique'     => '名称不能重复',
               'admin_name'=>'用户允许用数字 字母 下划线 4到12位',
               'admin_pwd.require'=>'密码必填',
               'admin_tel.require'=>'手机号必填',
               'admin_tel'=>'手机号13 15 18开头11位数字',
               'admin_email.require'=>'邮箱必填',
               'admin_email'=>'正确的邮箱格式'
            ];
        
            protected $scene = [
                        'insert'  =>  ['admin_name','admin_pwd',],
                        'updo'  =>  ['admin_name','admin_tel','admin_email',],
                        'edit'=> ['admin_name',],
                        'editEmail'=>['admin_email',],
                        'editTel'=>['admin_tel',]
                    ];
        //自定义规则
        //姓名验证
        protected function checkName($value,$rule,$data){
            $reg='/^[a-z]\w{3,10}$/';
              if(!preg_match($reg,$value)){
             return '用户允许用数字 字母 下划线 4到12位';
            }else{
              return true;
             }
          }
         //手机号验证
         protected function checkTel($value,$rule,$data){
            $reg='/^1[358]\d{9}$/';
              if(!preg_match($reg,$value)){
             return '手机号13 15 18开头11位数字';
            }else{
              return true;
             }
          }



    }
       
   
?>