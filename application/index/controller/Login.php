<?php
namespace app\index\controller;
use think\Controller;
class Login extends Common{
    //注册
    public function register(){
        if(checkRequest()){
            $data=input('param.');
            //dump($data);die;
            //验证
            $validate=validate('user');
            if(!$validate->check($data)){
                fail($validate->getError());
            }
            $user_model=model('user');
            $res=$user_model->allowField(true)->save($data);
            $user_id=$user_model->getLastInsId();
            
            if($res){
                //存储登陆成功的id(注册后直接到前台首页)
                $userInfo=[
                    'user_id'=>$user_id,
                    'user_email'=>$data['user_email']
                ];
                session('userInfo',$userInfo);
                successly('注册成功');
            }else{
                fail('注册失败');
            }   
     }else{
            $this->view->engine->layout(false);
            return view();
        }
       
    }
     //登陆
     public function login(){
         if(checkRequest()){
            $account=input('post.account');
            $user_pwd=input('post.user_pwd');
            $remember_me=input('post.remember_me');
            //验证
            if(empty($account)){
                fail('账号必填');
            }   
            if(empty($user_pwd)){
                fail('密码必填');
            }
            //判断账号是手机号登陆还是邮箱登陆
            // if(substr_count($account,'@')>0){
            //     $where=[
            //         'user_email'=>$account
            //     ];
            // }else{
            //     $where=[
            //         'user_tel'=>$account
            //     ];
            // }
            $where=[
                  'user_email'=>$account,
                ];
            $user_model=model('user');
            $arr=$user_model->where($where)->find();
            if(!empty($arr)){
                $time=time();
                $error_num=$arr['error_num'];
                $last_error_time=$arr['last_error_time'];
                //验证密码
                if($arr['user_pwd']==md5($user_pwd)){
                    //echo "正确";
                    //错误次数>=3次&&当前时间-最后一次错误时间<3600
                    if($error_num>=3&&$time-$last_error_time<3600){
                            // 当前为锁定状态，还有**分钟可以重新登录；exit;
                            $m=60-ceil(($time-$last_error_time)/60);
                            fail('你还有'.$m.'分钟后登陆');die; 
                    }
            
                    //判断remember_me==’true’把账号密码存入cookie中10天
                    if($remember_me=='true'){
                        $rememberInfo=[
                            'account'=>$account,
                            'user_pwd'=>$user_pwd
                        ];
                        $sec=60*60*24*10;
                        cookie('name',$rememberInfo,$sec);
                    }
                    //把用户信息存入session中
                    $userInfo=[
                        'user_id'=>$arr['user_id'],
                        'user_email'=>$account
                    ];
                    session('userInfo',$userInfo);
                    //清空错误时间和归零错误次数
                    $Info=[
                        'error_num'=>0,
                        'last_error_time'=>NULL
                    ];
                    $where=[
                        'user_id'=>$arr['user_id']
                    ];
                    $res=$user_model->save($Info,$where);
                     //同步浏览记录
                     $cookie_str=cookie('arr');
                     if(!empty($cookie_str)){
                         $str=unserialize(base64_decode($cookie_str));
                         $user_id=$arr['user_id'];
                         foreach($str as $k=>$v){
                             $str[$k]['user_id']=$user_id;
                         }
                        // return $str;
                      
                     $history_model=model('history');
                     $historyInfo=$history_model->saveAll($str);
                         if($historyInfo){
                             cookie('arr',null);
                         }
                     }
                     //同步购物车
                     $cookie=cookie('cartInfo');
                     $cart_model=model('cart');
                     //dump($cookie);die;
                     //判断 cookie是否有值
                     // dump($cart_srt);die;
                     if(!empty($cookie)){
                         $cartInfo=unserialize(base64_decode($cookie));
                         //dump($cartInfo);die;
                         foreach($cartInfo as $k=>$v){
                              //dump($v);die;
                             $cartwhere=[
                                 'user_id'=>$this->userInd(),
                                 'goods_id'=>$v['goods_id']
                             ];
                             // dump($cartwhere);die;
                             //根据登录的用户和商品id来查询购物车是否有此商品
                             $cartArr=$cart_model->where($cartwhere)->find();
                             //dump($cartArr);die;
                             //如果购物车表有此商品，修改
                             if(!empty($cartArr)){
                                 //检测库存checkCartNum
                                 $this->checkCartNum($v['goods_id'],$v['buy_num'],$cartArr['buy_num']);
                                 //改购买的数量
                                 //dump($v['buy_number']);die;
                                 $cartUpdate=[
                                     'buy_num'=>$cartArr['buy_num']+$v['buy_num'],
                                     'update_time'=>time()
                                 ];
                                 // dump($cartArr['buy_number']+$v['buy_number']);die;
                                 // die;
                                 $result=$cart_model->where($cartwhere)->update($cartUpdate);
                                 // dump($result);die;
                             }else{	
                                 //检测库存
                                 $this->checkCartNum($v['goods_id'],0,$v['buy_num']);
                                 $cartWhere=[
                                    'user_id'=>$this->userInd(),
                                    'goods_id'=>$v['goods_id'],
                                    'buy_num'=>$v['buy_num'],
                                    'create_time'=>time(),
                                    'update_time'=>time()
                                 ];
                                 $result=$cart_model->insert($cartWhere);
                             }
                             //dump($result);
                         }
                         //die;
                         //同步成功后删除cookie
                         if($result){
                             cookie('cartInfo',null);
                         }
                     }
                    
                    //提示登录成功
                    successly("登陆成功");
                }else{
                   // echo "错误";
                   //当前时间-最后一次错误时间
                   if($time-$last_error_time>3600){
                        //错误次数改为1  错误时间改为当前时间
                        $updateInfo=[
                            'error_num'=>1,
                            'last_error_time'=>$time
                        ];
                        $where=[
                            'user_id'=>$arr['user_id']
                        ];
                        $userInfo=$user_model->save($updateInfo,$where);
                        if($userInfo){
                            fail('你错误了1次，你还有2次登陆机会');
                        }
                   }else{
                       // 判断错误次数》=3
                       if($error_num>=3){
                            $m=60-ceil(($time-$last_error_time)/60);
                            fail('你还有'.$m.'分钟后登陆');die;
                       }else{
                        //错误次数+1，错误时间改为当前时间
                        $error_num+=1;
                        $updateInfo=[
                            'error_num'=>$error_num,
                            'last_error_time'=>$time
                        ];
                        $where=[
                            'user_id'=>$arr['user_id']
                        ];
                        $res=$user_model->save($updateInfo,$where);
                            if($res){
                                $num=3-$error_num;
                                if($num==0){
                                    fail('你的账号已经被锁定一小时');
                                }else{
                                    fail('你错误了'.$error_num.'次'.',还有'.$num.'次');
                                }
                            }
                       }
                   }
                }
            }else{
                fail('用户不存在');
            }
         }else{
            $this->view->engine->layout(false);
            return view();
         }
    }
    //检测邮箱是否正确
    public function checkEmail(){
        $email=input('post.email');
        $where=[
            'user_email'=>$email
        ];
        $user_model=model('User');
        $arr=$user_model->where($where)->find();
        //print_r($arr);
        if($arr){
            fail('邮箱已经存在');
        }else{
            successly('');
        }
        
    }
    //发送验证码
    public function sendEmail(){
        $user_email=input('post.email');
        //验证
        //生成验证码
        $code=rand(100000,999999);
        //发送邮件
        $res=sendEmail($user_email,$code);
        if($res){
            $sendInfo=[
                'sendTime'=>time(),
                'sendCode'=>$code,
                'sendEmail'=>$user_email
            ];
            session('sendInfo',$sendInfo);
            successly('发送成功');
        }else{
            fail('发送失败');
        }
    }
    //退出
    public function secede(){

        session('userInfo',null);
        cookie('name',null);
        $this->error('退出成功','Login/login');
    }

}
