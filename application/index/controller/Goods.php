<?php
namespace app\index\controller;
use think\Controller;
class Goods extends Common{

    public function goodsList(){
          //左侧导航
            $this->getLeftCateInfo();
            //接受分类的id
            $cate_id=input('get.cate_id');
            //接受cate_name
            $cate_name=input('param.cate_name');
            //如果没有接受到id就走全部商品
            if(empty($cate_id)){
                 $catewhere=1;
                 session('cate_id',Null);
            }else{
                $cate_model=model('cate');
                $cateInfo=$cate_model->select();
                $cate_id=getSonCateInfo($cateInfo,$cate_id);
                //dump($cate_id);die;
             session('cate_id',$cate_id);
                $catewhere=[
                    'cate_id'=>['in',$cate_id]
                ];  
            }
            //查询商品下面的所有品牌id
            $goods_model=model('goods');
            $brand_id=collection($goods_model->where($catewhere)->column('brand_id'))->toArray();
            $brand_id=array_unique($brand_id);
            //dump($brand_id);die;
            $brand_model=model('brand');
            $brandWhere=[
                'brand_id'=>['in',$brand_id]
            ];
            $brandInfo=$brand_model->where($brandWhere)->select();

            //查询价格 max查询出最大的值 value查询出一个值
              $mxs_price=$goods_model->where($catewhere)->value("max(goods_price)");
              //echo $goods_model->getLastSql();die;
             //print_r($mxs_price);die;
            $goodspriceInfo=$this->getpricesection($mxs_price);
            //查询商品信息
            $p=1;
            $page_num=4;
            $goodsInfo=$goods_model->where($catewhere)->order("goods_num","desc")->page($p,$page_num)->select();
              //获取发现件数 也是求出总条数
              $count=$goods_model->where($catewhere)->count();
            //分页
            $page_class=new\page\AjaxPage();
            $str=$page_class::ajaxpager($p,$count,$page_num,url('Goods/goodsPage'));
            //浏览历史
                if($this->checkLogin()){
                   $getHistoryDb=$this->getHistoryDb();
                }else{
                    $getHistoryDb=$this->getHistorycookie();
                }
            $this->assign('getHistoryDb',$getHistoryDb);
            $this->assign('goodspriceInfo',$goodspriceInfo);
            $this->assign('brandInfo',$brandInfo);
            $this->assign('goodsInfo',$goodsInfo);
            $this->assign('cate_name',$cate_name);
            $this->assign('str',$str);
            $this->assign('count',$count);
            $this->getLeftCateInfo();
            return view();
          
     
    }

    public function goodsdetail(){
          //左侧导航
        $this->getLeftCateInfo();
        $goods_id=input('get.goods_id',0,'intval');
        if(empty($goods_id)){
            $this->error('请选择一个商品');
        }
        // dump($goods_id);die;
        $goods_model=model('goods');
        $where=[
            'goods_id'=>$goods_id
        ];
        $goodsInfo=$goods_model->where($where)->find();
        
        $goods_img=$goods_model->where($where)->value('goods_imgs');
        $goods_imgs=Explode('|',rtrim($goods_img,'|'));
        //dump($goods_img);die;
      //浏览历史
        
             if($this->checkLogin()){
              $this->saveHistory($goods_id);
             }else{
                $this->saveHistoryCookie($goods_id);
             }

        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('goods_imgs',$goods_imgs);
        return view();
    }
    //获取价格区间
    public function getpricesection($mxs_price){
        $price=[];
        $avgPrice=$mxs_price/7;
        for($i=0;$i<6;$i++){
            //number_format 千位分割符 四个参数 1数字 2显示多少位  3小数点 4分隔符
            $topPrice=number_format($i*$avgPrice,2,'.',',');
            $con=($i+1)*$avgPrice-0.1;
            $num=number_format($con,2,'.',',');
            $price[]=$topPrice.'-'.$num;
        }
            $price[]=$num.'以上';
           // dump($price);die;
         return $price;
         
    }
    //点击品牌价格发生变化
    public function goodsShow(){
        $goods_model=model('goods');
        $brand_id=input('get.brand_id');
        $cate_id=session('cate_id');
       // dump(session('cate_id'));die;
       // dump($brand_id);die;
       if(empty($cate_id)){
        $where=[
            'brand_id'=>$brand_id
        ];
       }else{
        $where=[
            'brand_id'=>$brand_id,
            'cate_id'=>['in',$cate_id]
        ];
       }
        $max_price=$goods_model->where($where)->value("max(goods_price)");
        $max_price=$this->getpricesection($max_price);
        //dump($max_price);
        echo json_encode($max_price);
        
    }
    // 获取商品
    public function getGoodsInfo(){
        $ord='';
        $p=input('post.p');
        $brand_id=input('post.brand_id');
        $price=input('post.price');
        $order=input('post.order');
        $field=input('post.field');
       // dump($field);die;
        $cate_id=session('cate_id');
           // dump($cate_id);die;
        //处理条件
        $where=[];
        if(!empty($brand_id)){
            $where['brand_id']=$brand_id;
        }
        //explode 截取  
        //1,758.86-3,517.61
        // 截取 <pre>array(2) {
        //     [0] =&gt; string(8) "1,758.86"
        //     [1] =&gt; string(8) "3,517.61"
        //   }
        //   </pre>
        //str_replace替换
        if(!empty($price)){
            $price=explode('-',$price);
            if(count($price)==1){
                $sin=str_replace(',','',$price[0]);
                $where['goods_price']=['egt',$sin];
            }else{
                $min=str_replace(',','',$price[0]);
                $sin=str_replace(',','',$price[1]);
                $where['goods_price']=['between',[$min,$sin]];
            }
           
            //dump($price);die;
        }
        if(!empty($field)&&!empty($order)){
            $ord=1;
        }
        if(!empty($field)&&empty($order)){
           $where[$field]=1;
        }
        if(!empty($cate_id)){

            $where['cate_id']=['in',$cate_id];
            
        }
      
        //查询商品数据
        $goods_model=model('goods');
        $page_num=4;
        if($ord==1){
            $goodsInfo=$goods_model->where($where)->order($field,$order)->page($p,$page_num)->select();
           // echo $goods_model->getLastSql();die;
           //dump($goodsInfo);die;
        }else{
            $goodsInfo=$goods_model->where($where)->page($p,$page_num)->select();
           // dump($goodsInfo);die;
        }
        //获取页码
        $count=$goods_model->where($where)->count();
         //分页
         $page_class=new\page\AjaxPage();
         $str=$page_class::ajaxpager($p,$count,$page_num,url('Goods/goodsPage'));

         $this->view->engine->layout(false);
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('str',$str);
       
        echo $this->fetch('div');
    }
    //浏览历史没有登陆存入cookie
    public function saveHistoryCookie($goods_id){
        $cookie_str=cookie('arr'); 
        $now=time();
         if(!empty($cookie_str)){
            $arr=unserialize(base64_decode($cookie_str));
        }
        $arr[]=[
            'create_time'=>$now,
            'goods_id'=>$goods_id,
        ];
       // dump($arr);

       //序列化 serialize 打印出string(53) "a:2:{s:3:"now";i:1550806580;s:8:"goods_id";s:2:"40";}"
       //unserialize 解开
       //base64_encode 相当于加密  打印出"YToyOntzOjM6Im5vdyI7aToxNTUwODA2NzAxO3M6ODoiZ29vZHNfaWQiO3M6MjoiNDAiO30="
       //base64_decode  解开
       $str=base64_encode(serialize($arr));
       cookie('arr',$str);
      // dump($str);

    }
    //浏览历史有登陆就存入数据库
   public function saveHistory($goods_id){
        $user_id=$this->userInd();
        
        $info=[
            'user_id'=>$user_id,
            'goods_id'=>$goods_id
        ];
        $history_model=model('history');
        $historyInfo=$history_model->save($info);
   }
   //浏览历史登陆获取数据数据
   public function getHistoryDb(){
       $user_id=$this->userInd();
       $history_model=model('history');
       $where=[
        'user_id'=>$user_id
       ];
       $goods_id=$history_model->where($where)->order('create_time','desc')->column('goods_id');
       //array_slice
       $goods_id=array_slice(array_unique($goods_id),0,4);
       $goods_model=model('goods');
       if(!empty($goods_id)){
            foreach($goods_id as $k=>$v){
                $goodswhere=[
                    'goods_id'=>$v
                ];
                $goodsInfo[]=$goods_model->where($goodswhere)->find();
            }
            return $goodsInfo;
        }else{
            return [];
        }   
            
     //   dump($goods_id);die;
   }
   //浏览历史没有数据获取cookie里面的值
   public function getHistorycookie(){
    $cookie_str=cookie('arr');
    //dump($cookie_str);die;
    $str=unserialize(base64_decode($cookie_str));
    // dump($str);
    // /array_reverse  返回一个单元顺序相反的数组 
    if(!empty($str)){
        $historyInfo=array_reverse($str);
        foreach($historyInfo as $k=>$v){
           $goods_id[]=$v['goods_id'];
        }
    }
    $goods_id=array_slice(array_unique($goods_id),0,4);
        //dump($goods_id);die;
     $goods_model=model('goods');
       foreach($goods_id as $k=>$v){
        $goodsWhere=[
            'goods_id'=>$v
        ];
        $goodsInfo[]=$goods_model->where($goodsWhere)->find();
       }
        return $goodsInfo;
   }
   
}