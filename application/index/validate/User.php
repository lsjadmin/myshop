<?php
    namespace app\index\validate;
    use think\Validate;
    class User extends Validate{
        protected $rule =   [
                    'user_email'  => 'require|email|unique:user|checkEmail',
                    'user_code'   => 'require|checkCode',
                    'user_pwd' => 'require',   
                    'user_pwd1' => 'require|confirm:user_pwd',  
               ];


               protected $message  =   [
                        'user_email.require' => '邮箱不能为空',
                        'user_email.email'     => '请填写正确的邮箱格式',
                        'user_email.unique'   => '邮箱已经注册',
                       'user_code.require'  => '验证码不能为空',
                       'user_pwd.require'        => '密码不能为空',
                       'user_pwd1.confirm'        => '确认密码要和密码保持一致',        
                    ]; 
            //验证邮箱
            protected function checkEmail($value,$rule,$data){
                $email=session('sendInfo.sendEmail');
                if($email!=$value){
                    return "发送验证码邮箱与注册邮箱不一致";
                }else{
                    return true;
                }   
            }
            //验证
             protected function checkCode($value,$rele,$data){
                $code=session('sendInfo.sendCode');
                $time=session('sendInfo.sendTime');
                if($code!=$value){
                    return "注册验证码与当前填写邮箱不一致";
                }else if(time()-$time>3600){
                    return "验证码已经过期";
                }else{
                    return true;
                }
            }         
                    
    }
?>