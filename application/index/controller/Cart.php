<?php
namespace app\index\controller;
use think\Controller;
class Cart extends Common{
    public function cartAdd(){
        $goods_id=input('post.goods_id',0,'intval');
        //echo $goods_id;
        $buy_num=input('post.buy_num',0,'intval');
      //  echo $buy_num;die;
        $goods_model=model('goods');
        $goodsWhere=[
            'goods_id'=>$goods_id,
            'is_up'=>1
        ];
        $goodsInfo=$goods_model->where($goodsWhere)->find();
       //dump($goodsInfo);die;
        if(empty($goods_id)){
            fail('请选择一个商品');
        }else if(empty($goodsInfo)){
            fail('该商品已经下架');
        }
        if(empty($buy_num)){
            fail('请选择商品的数量');
        }   
        //加入购物车
        if($this->checkLogin()){
            $this->addCartDb($goods_id,$buy_num);
        }else{
            $this->addCartCookie($goods_id,$buy_num);
        }
    }
    //获取购物车登陆的数据
        public function addCartDb($goods_id,$buy_num){
            $cart_model=model('cart');
            $where=[
                'goods_id'=>$goods_id,
                'user_id'=>$this->userInd(),
                'create_stater'=>1
            ];
            $cartInfo=$cart_model->where($where)->find();
           // dump($cartInfo);die;
            if(!empty($cartInfo)){
                $this->checkCartNum($goods_id,$cartInfo['buy_num'],$buy_num);
                $updateinfo=[
                    'buy_num'=>$cartInfo['buy_num']+$buy_num
                ];
                $res=$cart_model->save($updateinfo,$where);
                if($res){
                    successly('添加成功');
                }else{
                    fail('添加失败');
                }
                
            }else{
                //echo "a";
                $cartWhere=[
                    'goods_id'=>$goods_id,
                    'buy_num'=>$buy_num,
                    'user_id'=>$this->userInd()
                ];
                $Info=$cart_model->save($cartWhere);
                if($Info){
                    successly('添加成功');
                }else{
                    fail('添加失败');
                }
            }
           
          
        }
    //获取购物车没有登陆时的数据
        public function addCartCookie($goods_id,$buy_num){
            $cart=[];
            $cart_str=cookie('cartInfo');
            if(!empty($cart_str)){
                $cart=unserialize(base64_decode($cart_str));
                //print_r($cart);die;
                $flag=0;//表示加入过购物车
                //累加
                foreach($cart as $k=>$v){
                        if($v['goods_id']==$goods_id){
                          // echo $v['goods_id'];
                            $this->checkCartNum($goods_id,$v['buy_num'],$buy_num);
                            $cart[$k]['buy_num']=$v['buy_num']+$buy_num;
                            $cart[$k]['create_time']=time();
                            $cartInfo=base64_encode(serialize($cart));
                            // $cart=unserialize(base64_decode($cartInfo));
                            // print_r($cart);die;
                            cookie('cartInfo',$cartInfo);
                            $flag=1;
                            if($cartInfo){
                                successly('添加成功');
                            }else{
                                fail('添加失败');
                            }
                         }
                }
                if($flag==0){
                    $this->checkCartNum($goods_id,0,$buy_num);
                    $cart[]=[
                        'goods_id'=>$goods_id,
                        'buy_num'=>$buy_num,
                        'create_time'=>time()
                    ];
                    $cartInfo=base64_encode(serialize($cart));
                    cookie('cartInfo',$cartInfo);
                    if($cartInfo){
                        successly('添加成功');
                    }else{
                        fail('添加失败');
                    }
                }
            }else{
                $this->checkCartNum($goods_id,0,$buy_num);
                $cart[]=[
                    'goods_id'=>$goods_id,
                    'buy_num'=>$buy_num,
                    'create_time'=>time()
                ];
                $cartInfo=base64_encode(serialize($cart));
                cookie('cartInfo',$cartInfo);
                if($cartInfo){
                    successly('添加成功');
                }else{
                    fail('添加失败');
                }
            
            }
            
               
            
        }
    //测试
        // public function test(){
        //     $arr=cookie('cartInfo');
        //     $a=unserialize(base64_decode($arr));
        //     dump($a);
        // }
    //展示
    public function cartList(){
        //左侧导航
        $this->getLeftCateInfo();
        //取数据库里面的
        if($this->checkLogin()){
            $cartInfo=$this->cartDb();
           
        }else{
            $cartInfo=$this->cartCookie();
        }
        if(!empty($cartInfo)){
            $this->assign('cartInfo',$cartInfo);
        }else{
            $this->assign('cartInfo',$cartInfo);
        }
        return view();
    }
    //取出登陆时数据库的数据
    public function cartDb(){
        $cart_model=model('cart');
        $goods_model=model('goods');
        $where=[
            'user_id'=>$this->userInd(),
            'create_stater'=>1
        ];
        $cartInfo=$cart_model
        ->field('cart_id,goods_name,goods_num,market_price,buy_num,goods_price,goods_core,goods_img,c.goods_id')
        ->alias('c')
        ->join('goods g',"g.goods_id=c.goods_id")
        ->order('c.create_time','desc')
        ->where($where)
        ->select();
       // dump($cartInfo);die;
        if(!empty($cartInfo)){
            return $cartInfo;
        }

    }
    //取出没有登陆时的数据
   public function cartCookie(){
             $cartData=[];
            $goods_model=model('goods');
            $cookie=cookie('cartInfo');
            if(!empty($cookie)){
                $cartcookie=unserialize(base64_decode($cookie));
                foreach($cartcookie as $k=>$v){
                    $goodsWhere=[
                        'goods_id'=>$v['goods_id']
                    ];
                    $cartInfo=$goods_model->where($goodsWhere)->find()->toArray();
                    // dump($cartInfo);die;
                    $cartData[]=array_merge($v,$cartInfo);
                   //dump($cartData);die;
                }
                return $cartData;
            }else{
                return [];
            }
   }
    //点击加号修改价格
    
    public function changePrice(){
        $goods_id=input('post.goods_id');
        $buy_num=input('post.buy_num');
        if($this->checkLogin()){
            $this->cartpriceDb($goods_id,$buy_num);
        }else{
            $this->cartpriceCookie($goods_id,$buy_num);
        }
    }
    //点击加号修改价格(cookie)
    public function cartpriceCookie($goods_id,$buy_num){
        $cookie=cookie('cartInfo');
       // dump($cookie);die;
        if(!empty($cookie)){
            $cartInfo=unserialize(base64_decode($cookie));
            foreach($cartInfo as $k=>$v){
                if($v['goods_id']==$goods_id){
                    //检测库存
                    $this->checkCartNum($goods_id,0,$buy_num);
                    //修改库存
                    $cartInfo[$k]['buy_num']=$buy_num;
                 
                }
            }
          //  dump($cartInfo);die;
          $cartInfo=base64_encode(serialize($cartInfo));
          cookie('cartInfo',$cartInfo);

        }
    }
    //点击加号修改价格（(数据库中)）
    public function cartpriceDb($goods_id,$buy_num){
        $cart_model=model('cart');
        $cartWhere=[
            'user_id'=>$this->userInd(),
            'goods_id'=>$goods_id
        ];
        $cart=$cart_model->where($cartWhere)->find();
         //检测库存
         $this->checkCartNum($goods_id,$cart['buy_num'],$buy_num);
         $update=[
            'buy_num'=>$buy_num
         ];
         $cartInfo=$cart_model->save($update,$cartWhere);

    }
    //点击复选框在下面显示出总价格
    public function getCountPrice(){
        $goods_id=input('post.goods_id');
       // dump($goods_id);
        if($this->checkLogin()){
            $goods_id=explode(',',$goods_id);
            $cart_model=model('cart');
            $goods_model=model('goods');
            $where=[
                'user_id'=>$this->userInd(),
                'goods_id'=>['in',$goods_id]
            ];
          
        $cateInfo=$cart_model->field('buy_num,goods_id')->where($where)->select();
       // dump($cateInfo);die;
        $count=0;
        foreach($cateInfo as $k=>$v){
            if(in_array($v['goods_id'],$goods_id)){
                $goodswhere=[
                    'goods_id'=>$v['goods_id']
                ];
                $goods_price=$goods_model->where($goodswhere)->value('goods_price');
                $count+=$v['buy_num']*$goods_price;
                session('count',$count);
            }
         }
            return $count;  
        }else{
            //从cookie里面取数据
            $goods_id=explode(',',$goods_id);
            $cookie=cookie('cartInfo');
            $goods_model=model('goods');
            $count=0;
            if(!empty($cookie)){
                $cartInfo=unserialize(base64_decode($cookie));
                foreach($cartInfo as $k=>$v){
                    if(in_array($v['goods_id'],$goods_id)){
                        $where=[
                            'goods_id'=>$v['goods_id']
                        ];
                        $goods_price=$goods_model->where($where)->value('goods_price');
                        $count+=$v['buy_num']*$goods_price;
                    }
                }
                return $count;
            }
        }
    }
    //删除
    public function cartdelete(){
        $goods_id=input('post.goods_id',0,'intval');
        if($this->checkLogin()){
            $cart_model=model('cart');
            $cartWhere=[
                'goods_id'=>$goods_id,
                'user_id'=>$this->userInd()
            ];
           $res=$cart_model->where($cartWhere)->update(['create_stater'=>2]);
           // dump($res);die;
            if($res){
                successly('删除成功');
            }else{
                fail('删除失败');
            }   
        }else{
            $goods_id=input('post.goods_id',0,'intval');
            $cart_model=model('cart');
           $cookie=cookie('cartInfo');
          // dump($cookie);die;
           if(!empty($cookie)){
                $str=unserialize(base64_decode($cookie));
                 //dump($str);die;
                 foreach($str as $k=>$v){
                     if($v['goods_id']==$goods_id){
                        unset($str[$k]);
                     }
                 }
                 
             // unset($str[$goods_id]);
              // dump($str);die;
                $str=base64_encode(serialize($str));
                cookie('cartInfo',$str);
                successly('删除成功');
           }
         
        }
        
      

    }
    //删除购物车
    public function alldel(){
        if($this->checkLogin()){
            $cart_model=model('cart');
            $where=[
                'user_id'=>$this->userInd()
            ];
            $res=$cart_model->where($where)->update(['create_stater'=>2]);
            if($res){
                successly('成功');
            }else{
                fail('失败');
            }
        }else{
            cookie('cartInfo',null);
            successly('删除成功');
        }
    }
    //加入收藏
    public function praise(){
        $goods_id=input('post.goods_id');
        $praise_name=input('post.goods_name');
        $praise_price=input('post.goods_price');
        $praise_img=input('post.goods_img');
        //dump($goods_id);
        if($this->checkLogin()){
            $praiseWhere=[
                'goods_id'=>$goods_id,
                'user_id'=>$this->userInd(),
                'praise_name'=>$praise_name,
                'praise_price'=>$praise_price,
                'praise_img'=>$praise_img
            ];
           // dump($praiseWhere);die;
            $praise_model=model('praise');
            $praiseInfo=$praise_model->where($praiseWhere)->find();
            //$this->assign('praiseInfo',$praiseInfo);
           // dump($praiseInfo);die;
           if($praiseInfo){
                fail('改商品已经收藏');
           }else{
                $res=$praise_model->save($praiseWhere);
                if($res){
                    successly('添加成功');
                }else{
                    fail('添加失败');
                }
           }
        }else{
            fail('请登陆');
        }
      
    }
    

  
}
?>