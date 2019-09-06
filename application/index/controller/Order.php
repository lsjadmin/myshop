<?php
namespace app\index\controller;
use think\Controller;
class Order extends Common{
    //确认结算
    public function confirmCount(){
         //左侧导航
     $this->getLeftCateInfo();

       $addressInfoa=$this->getAddressInfo();
       $this->assign('addressInfoa',$addressInfoa);
       $cartInfo=$this->getGoodsInfoa();
       $this->assign('cartInfo',$cartInfo);
        return view();
    }
    //检测登陆
    public function checkLogin(){
        $res=parent::checkLogin();
        echo json_encode(['login_status'=>$res]);
    }
    //提交订单
    public function submit(){
        if(checkRequest()){
            //echo"11";die;
            if(!parent::checkLogin()){
                fail('请先登录');
            }
            $goods_id=input('post.goods_id');
            //dump($goods_id);die;
            if(empty($goods_id)){
                fail('请选择你要购买的商品');
            }
            $address_id=input('post.address_id',0,'intval');
           // dump($address_id);die;
            if(!$address_id){
                fail('请选择收货地址');
            }
           // $pay=[1,2,3];
            $pay_type=input('post.pay_type');
            // if(!in_array($pay_type,$pay)){
            //     fail('请选择正确的支付方式');
            // }
            $order_text=input('post.order_text');
            $order_model=model('order');
           
            //抛出异常
             $order_model->startTrans();
           
            try{
                //添加订单表
                $user_id=$this->userInd();
                $orderInfo['order_no']=$this->getOrderOn();
                $cart_model=model('cart');
                $goods_model=model('goods');
                $where=[
                        'g.goods_id'=>['in',$goods_id],
                        'user_id'=>$user_id,
                        'create_stater'=>1
                 ];
                $goodsInfo=$cart_model
                ->alias('c')
                ->join('goods g',"g.goods_id=c.goods_id")
                ->order('c.create_time','desc')
                ->where($where)
                ->select();
                $order_amount=0;
                foreach($goodsInfo as $k=>$v){
                    $order_amount+=$v['goods_price']*$v['buy_num'];
                }
               $orderInfo['order_amount']=$order_amount;
               $orderInfo['order_text']=$order_text;
               $orderInfo['pay_type']=$pay_type;
               $orderInfo['user_id']=$user_id;
                $res=$order_model->allowField(true)->save($orderInfo);
                if(!$res){
                    throw new Exception('订单信息写入失败');
                }
                //订单详情表
                $order_id=$order_model->getLastInsId();
                // echo $order_id;die;
                foreach($goodsInfo as $k=>$v){
                    // $res1=$this->checkCartNum($goods_id,$v['buy_num'],2);
                    // if(!$res1){
                    //     throw new Exception('库存不够');
                    // }
                    $goodsInfo[$k]['order_id']=$order_id;
                    $goodsInfo[$k]['user_id']=$user_id;
                }
                $goodsInfo=collection($goodsInfo)->toArray();
                $orderDetail=model('OrderDetail');
                $res2=$orderDetail->allowField(true)->saveAll($goodsInfo);
                if(!$res2){
                    throw new Exception('订单详情写入失败');
                }
                //订单收货地址
                 $address_mode=model('address');
                $addresswhere=[
                    'address_id'=>$address_id
                 ];
             
                $addressInfo=$address_mode->where($addresswhere)->find();
                $addressInfo=$addressInfo->toArray();
                $addressInfo['order_id']=$order_id;
                $addressInfo['user_id']=$user_id;
                $orderAddress=model('OrderAddress');
                $res3=$orderAddress->allowField(true)->save($addressInfo);
                if(!$res3){
                    throw new Exception('订单地址写入失败');
                }
                 //清空购物车
                 $cart_model=model('cart');
                 $cartWhere=[
                    'user_id'=>$user_id,
                    'goods_id'=>['in',$goods_id]
                 ];
                 $res4=$cart_model->save(['create_stater'=>2],$cartWhere);
                 if(!$res4){
                    throw new Exception('清空购物表失败');
                }
              
               //修改库存
               $goods_model=model('goods');
               foreach($goodsInfo as $k=>$v){
                    $goodsWhere=[
                        'goods_id'=>$v['goods_id']
                    ];
                    $goodsData=[
                        'goods_num'=>$v['goods_num']-$v['buy_num']
                    ];
                    $res5=$goods_model->save($goodsData,$goodsWhere);
                    if(!$res5){
                        throw new Exception('减少库存失败');
                    }
               }
               session('order_id',$order_id);
                 $order_model->commit();
                 successly('订单提交成功');
            }catch (\Exception $e){
                $order_model->rollback();
                echo $e->getMessage();exit;
            }
        }else{

        }
    }
    //获取订单号
    public function getOrderOn(){
        return time().rand(1111,9999);
    }
    //成功提交订单
    public function ordersuccess(){
            //左侧导航
     $this->getLeftCateInfo();
        $order_id=session('order_id');
        if(empty($order_id)){
            $this->error('请重新提交订单');exit;
        }
        $orderWhere=[
            'order_id'=>$order_id
        ];
        $order_model=model('order');
        $orderInfo=$order_model->where($orderWhere)->find();
        // dump($orderInfo);die;
        if(empty($orderInfo)){
            $this->error('请重新提交订单');exit;
        }
        $this->assign('orderInfo',$orderInfo);
        return view();
    }
}
?>