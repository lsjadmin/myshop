<?php
namespace app\admin\controller;
use \think\Controller;
class Login extends Controller{
    /**登录展示 */
	public function login(){
        if(checkRequest()){
            //接收
           $admin_name=input('post.admin_name');
           $admin_pwd=input('post.admin_pwd');
           $code=input('post.code');
            //验证
           if(empty($admin_name)){
           fail('名称不能为空');exit;
              
           }
            if(empty($admin_pwd)){
                fail('密码不能为空');
              
           }
            if(empty($code)){
                fail('验证码不能为空');
             
           }else if(!captcha_check($code)){
            fail('验证码有误');
           }
           
           $where=[
               'admin_name'=>$admin_name
           ];
           
           $arr=model('admin')->where($where)->find();
          // dump($arr);exit;
           if(!empty($arr)){
                        //获得盐值
                        $salt=$arr['salt'];
                        //生成密码后加密的密码
                        $pwd=createPwd($admin_pwd,$salt);
                        //判断生成后的密码和数据库是否相同
                        if($arr['admin_pwd']==$pwd){
                            $info=[
                                'admin_id'=>$arr['admin_id'],
                                'admin_name'=>$admin_name
                            ];
                            session('adminInfo',$info);
                           
                          successly('登陆成功');
                        }else{
                      fail('登陆失败');
                    }
           }else{
           fail('用户名或者密码有误');
           }
        }else{
            $this->view->engine->layout(false);
             return  $this->fetch();
          }
         
        }
         //退出
         public function logout(){
            session('admininfo',null);
            $this->success('退出成功','login');
        }
    }
?>
