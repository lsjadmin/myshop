<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller{
    public function _initialize(){
        $controllerName=request()->controller();
       //echo($controllerName);exit;
        $this->assign('controllerName',$controllerName);
    }
   //获取左侧导航栏分类
   public function getLeftCateInfo(){
    $cate_model=model('Cate');
    //获取左侧分类
    $cateWhere=[
        'cate_show'=>1
    ];
    $cateInfo=collection($cate_model->where($cateWhere)->select())->toArray();
    //dump($cateInfo);exit;
    $cateInfo=getLeftCateInfo($cateInfo);
    //dump($cateInfo);exit;
    $this->assign('cateInfo',$cateInfo);

    //获取导航分类
    $navWhere=[
        'cate_nevshow'=>1
    ];
    $navInfo=collection($cate_model->where($navWhere)->select())->toArray();
    $this->assign('navInfo',$navInfo);

}
  //验证登陆
  public function checkLogin(){
      return session('?userInfo');
  }
  //取出登陆时存取的user_id
  public function userInd(){
     return session('userInfo.user_id');
  }
  //购物车库存
  //$goods_num 文本上的商品数量
  //购物车库里的商品数量 $num
  public function checkCartNum($goods_id,$num,$buy_num,$type=1){
      //dump($num);die;
      $goods_model=model('goods');
      $goodswhere=[
        'goods_id'=>$goods_id
      ];
      $goodsInfo=$goods_model->where($goodswhere)->value('goods_num');
     //dump($goodsInfo);die;
        if(($num+$buy_num)>$goodsInfo){
            $n=$goodsInfo-$num;
            // dump($n);die;
            if($type==1){
              fail('购买商品超过库存，你还可以购买'.$n.'件');
            }else{
              return false;
            }
          
        }
  }
  //收货地址的展示
  public function getAddressInfo(){
      $addressWhere=[
        'user_id'=>$this->userInd()
      ];
      $address_model=model('address');
      $area_model=model('area');
      $addressInfoa=$address_model->where($addressWhere)->select();
      if(!empty($addressInfoa)){
          //处理收货的省份
          foreach($addressInfoa as $k=>$v){
            $addressInfoa[$k]['province']=$area_model->where(['id'=>$v['province']])->value('name');
            $addressInfoa[$k]['city']=$area_model->where(['id'=>$v['city']])->value('name');
            $addressInfoa[$k]['area']=$area_model->where(['id'=>$v['area']])->value('name');
          }
        return $addressInfoa;
      }else{
        return false;
      }
  }
  //购物车确认结算
  public function getGoodsInfoa(){
     //获取数据
     $goods_id=input('get.goods_id');
    //  if(empty($goods_id)){
    //     $this->error('请选择一个商品');
    //  }
     $cart_model=model('cart');
     $goods_model=model('goods');
    // dump($goods_id);die;
     $where=[
         'g.goods_id'=>['in',$goods_id],
         'user_id'=>$this->userInd(),
         'create_stater'=>1
     ];
    // dump($where);die;
     $cartInfo=$cart_model
    
     ->alias('c')
     ->join('goods g',"g.goods_id=c.goods_id")
     ->order('c.create_time','desc')
     ->where($where)
     ->select();
    // dump($cartInfo);die;
    return $cartInfo;
  }
                
}
