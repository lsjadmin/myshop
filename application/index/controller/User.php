<?php
namespace app\index\controller;
use think\Controller;
class User extends Common{
    public function index(){
        if(!$this->checkLogin()){
            $this->error('请先登录','Login/login');
        }
        return view();
    }
    public function membercollect(){
         //左侧导航
         $this->getLeftCateInfo();
         $praise_model=model('praise');
         $where=[
             'user_id'=>$this->userInd()
         ];
         $praiseInfo=$praise_model->where($where)->select();
        // dump($praiseInfo);die;
        $this->assign('praiseInfo',$praiseInfo);
        return view();
    }
    public function del(){
        //echo "a";die;
        $praise_id=input('post.praise_id');
       // echo $praise_id;die;
        $where=[
            'praise_id'=>$praise_id
        ];
        //dump($where);die;
        $praise_model=model('praise');
        $res=$praise_model->where($where)->delete();
        if($res){
            successly('删除成功');
        }else{
            fail('删除失败');
        }
    }
}
?>