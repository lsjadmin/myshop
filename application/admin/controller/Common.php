<?php
namespace app\admin\controller;
use think\Controller;
    class Common extends Controller{
        public function _initialize(){
            parent::_initialize();
        // 获取控制器的名字和方法
            
             if(!session('?adminInfo')){
                $this->error('请先登陆',"Login/login");
             }
    }
     // 获取分类数据
     protected function getCateAndBrandInfo(){
           
        $catInfo=collection(model('cate')->select())->toArray();
        $cateinfo=getCateInfo($catInfo);

        //获取分类
        $this->assign('cateinfo',$cateinfo);
    }
  }
?>