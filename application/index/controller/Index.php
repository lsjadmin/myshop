<?php
namespace app\index\controller;
use think\Controller;
class Index extends Common{

    public function index(){
        //dump(cookie('name'));
        //dump(session('userInfo'));exit;
        //左侧导航
     $this->getLeftCateInfo();
    
     //处理楼层
        $cate_id=1;
        $floorInfo=$this->getFloorInfo($cate_id);
        $this->assign('floorInfo',$floorInfo);
        return view();
 }
    public function getFloorInfo($cate_id){
        //获取顶级分类
        $cate_model=model('Cate');
            $where=[
                'cate_id'=>$cate_id
         ];
         $data['topcate']=$cate_model->field('cate_id,cate_name')->where($where)->find()->toArray();
         //print_r($data['topcate']);
        //获取2级分类
         $cateWhere=[
            'pid'=>$cate_id
         ];
         $data['sonCate']=$cate_model->where($cateWhere)->select();
         //dump($data['sonCate']);
        //获取商品信息
         $cateInfo=$cate_model->select();
         $c_id=getSonCateInfo($cateInfo,$cate_id);
         $goodsWhere=[
            'cate_id'=>['in',$c_id]
         ];
         $goods_model=model('Goods');
         $data['goodsInfo']=$goods_model->where($goodsWhere)->select();
         return $data;
    }
    //获取楼层更多数据
    public function getMoreInfo(){
        $cate_id=input('post.cate_id');
        $floor_num=input('post.floor_num');
        // echo $cate_id;
        // echo $floor_num;
        $cate_model=model('cate');
        $where=[
            'pid'=>0,
            'cate_id'=>['>',$cate_id]
        ];
        $cateInfo=$cate_model->where($where)->order('cate_id','asc')->limit(1)->value('cate_id');
        // echo $cate_model->getLastSql();
        // print_r($cateInfo);
        if(empty($cateInfo)){
            echo"no";exit;
        }
        $floorInfo=$this->getFloorInfo($cateInfo);
        //print_r($floorInfo);die;
        $floor_num=$floor_num+1;
        $this->assign("floor_num",$floor_num);
        $this->assign("floorInfo",$floorInfo);
        $this->view->engine->layout(false);
        echo $this->fetch('div');
    }
    
        //测试
        public function show(){
            $this->view->engine->layout(false); 
            return view();
        }

        public function showo(){
            $email=input('param.email');
            $code=input('param.code');
            $code = strval($code);
            $res=sendEmail($email,$code);
             dump($res);die;
        }

}
