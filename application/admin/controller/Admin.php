<?php
namespace app\admin\controller;
use think\Controller;
    class Admin extends Common{
        //添加
        public function adminAdd(){
            if(checkRequest()){
               //验证
             $data=input('param.');
            //print_r($data);exit;
            $validate=validate('Admin');
            $result = $validate->check($data);
            if(empty($result)){
                // 验证失败 输出错误信息
               fail($validate->getError());
            }
            
                $adminModel=model('admin');
                $res=$adminModel->save($data);
                if($res){
                    successly('添加成功');
                }else{
                    fail('添加失败');
                }
      
            
            
            }else{
                return view();
            }
           
        }
        //验证用户唯一性
        public function checkName(){
         
            $admin_name=input('param.admin_name');
            $admin_model=model('admin');
            $type=input('param.');
            if($type=='1'){
                $where=[
                    'admin_name'=>$admin_name
                ];
            }else{
                //neq= 不等于
                $admin_id=input('param.');
                $where=[
                    'admin_id'=>['neq',$admin_id],
                    'admin_name'=>$admin_name
                ];
                
            }
            dump($where);exit;
            $res=$admin_model->where($where)->find();
            if(!empty($res)){
                echo 'no';
            }else{
                echo 'ok';
            }
        }
        //展示视图
        public function adminList(){
            return view();
        }
        //执行的方法
        public function find(){
            $admin_model=model('admin');
            $admin_name=input('param.admin_name');
             $p=input('get.page');
             $num=input('get.limit');
             $where=[
                'admin_name'=>['like',"%$admin_name%"]
             ];
            $adminInfo=$admin_model->where($where)->page($p,$num)->select();
            $count=$admin_model->where($where)->count();
            $arr=[
                'code'=>'0',
                'data'=>$adminInfo,
                'count'=>$count
               
            ];
            echo json_encode($arr);
        }
        //删除
        public function admindel(){
            $admin_id=input('post.admin_id');
            // dump($admin_id);exit;
             $admin_model=model('admin');
             $where=[
                'admin_id'=>$admin_id
             ];
           $res=$admin_model->where($where)->delete();
           
            if($res){
                successly('删除成功');
            }else{
             fail('删除失败');
            }
          
        }
        //既点即改
        public function adminedit(){
            $admin_id=input('post.admin_id');
            $value=input('post.value');//修改后的值
            $field=input('post.field');//字段名
            $where=[
                'admin_id'=>$admin_id
            ];
            $data=[
                $field=>$value
            ];
            //在修改前验证名称

            if($field=='admin_name'){
                $scene='edit';
            }else if($field=='admin_tel'){
                $scene='editTel';
            }else if($field=='admin_email'){
                $scene='editEmail';
            }
                $validate=validate('Admin');
                $result = $validate->scene($scene)->check($data);
                if(empty($result)){
                    // 验证失败 输出错误信息
                   fail($validate->getError());
                }
                
            $admin_model=model('admin');
            $res=$admin_model->save($data,$where);
            if($res){
                successly('修改成功');
            }else{
                fail('修改失败');
            }
        }
        //修改视图
        public function adminUpda(){
            $admin_id=input('get.admin_id','','intval');
            if(empty($admin_id)){
                $this->error('请正常操作',url('Admin/adminList'));exit;
            }
            $where=[
                'admin_id'=>$admin_id
            ];
            $adminInfo=model('admin')->where($where)->find();
            if(empty($adminInfo)){
                $this->error('请正常操作',url('Admin/adminList'));exit;
            }
            $this->assign('adminInfo',$adminInfo);
            return view();
        }
        //修改执行
        public function adminUpdaDo(){
            $data=input('param.');
            $where=[
                'admin_id'=>$data['admin_id']
            ];
            //验证
             $validate=validate('Admin');
                $result = $validate->scene('updo')->check($data);
                if(empty($result)){
                    // 验证失败 输出错误信息
                   fail($validate->getError());
                }

            $admin_model=model('admin');
            $res=$admin_model->where($where)->update($data);

            if($res===false){
                fail('修改失败');
            }else{
                 successly('修改成功');
            }
        }
    }
?>
