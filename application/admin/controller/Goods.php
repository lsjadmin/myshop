<?php
namespace app\admin\controller;
use think\Controller;
    class Goods extends Common{
        //添加
        public function goodsAdd(){
            if(checkRequest()){
                $data=input('post.');
                //验证
                $validate=validate('Goods');
                $result = $validate->check($data);
                if(empty($result)){
                    // 验证失败 输出错误信息
                fail($validate->getError());
                }
                $goods_model=model('Goods');
                $res=$goods_model->allowField(true)->save($data);

                if($res){
                    successly('添加成功');
                }else{
                    fail('添加失败');
                }

            }else{
                $brand_model=model('Brand');
                $arr=$brand_model->select(); 
                $this->assign('arr',$arr);
                $this->getCateAndBrandInfo();
                return view();
            }
           
        }
          //富文本文件上传
          public function getGoodsUpload(){
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('file');
            // 移动到框架应用根目录/public/uploads/ 目录下
           $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $arr=[
                    'code'=>0,
                    'font'=>'上传成功',
                    'data'=>[
                        'src'=>'\public\uploads\\'.$info->getSaveName(),
                        'title'=>'商品详情图片'
                    ]
                ];
              echo json_encode($arr);
            }else{
                // 上传失败获取错误信息
                return json($file->getError());
            }
        }
        //图片文件上传
        public function upload(){
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('file');
            // 移动到框架应用根目录/public/uploads/ 目录下
           $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $arr=[
                    'code'=>1,
                    'font'=>'上传成功',
                    'src'=>$info->getSaveName()
                ];
              echo json_encode($arr);
            }else{
                // 上传失败获取错误信息
                return json($file->getError());
            }
        }
        //展示
        public function goodsList(){
            $brand_model=model('Brand');
            $arr=$brand_model->select(); 
            $this->assign('arr',$arr);
            $this->getCateAndBrandInfo();
            return view();
        }
        //展示执行
        public function find(){
            $goods_name=input('get.goods_name');
            //print_r($goods_name);exit;
            $brand_name=input('get.brand_name');
            $cate_id=input('get.cate_id');
           // print_r($cate_name);exit;
            $is_up=input('get.is_up');
            //处理条件
            $where=[];
            if(!empty($goods_name)){
                $where['goods_name']=['like',"%$goods_name%"];
            }
            if(!empty($brand_name)){
                $where['brand_name']=$brand_name;
            }
            if(!empty($is_up)){
                $where['is_up']=$is_up;
            }
            if(!empty($cate_id)){
                $cate_model=model('Cate');
                //判断此分类下是否有子类
                $cateWhere=[
                    'pid'=>$cate_id
                ];
                $count=$cate_model->where($cateWhere)->count();
                if($count>0){
                    $cateInfo=$cate_model->select();
                    $c_id=getSonCateInfo($cateInfo,$cate_id);
                    $where['g.cate_id']=['in',$c_id];
                }else{
                    $where['g.cate_id']=$cate_id;
                }
            }


            $goods_model=model('Goods');
            $p=input('get.page');
            $num=input('get.limit');
            $data=$goods_model
            ->field("g.*,c.cate_name,b.brand_name")
            ->alias('g')
            ->join('shop_cate c','c.cate_id=g.cate_id')
            ->join('shop_brand b','g.brand_id=b.brand_id')
            ->page($p,$num)
            ->where($where)
            ->select();
            // echo $goods_model->getLastSql();exit;
            $count=$goods_model
            ->alias('g')
            ->join('shop_cate c','c.cate_id=g.cate_id')
            ->join('shop_brand b','g.brand_id=b.brand_id')
            ->where($where)
            ->count();
            $arr=[
                'code'=>0,
                'data'=>$data,
                'count'=>$count
            ];  
            echo json_encode($arr);
        }
        //既点即改
        public function goodsedit(){
            $goods_id=input('post.goods_id');
            $value=input('post.value');
            $field=input('post.field');
            $where=[
                'goods_id'=>$goods_id
            ];
            $data=[
                $field=>$value
            ];
            //在修改前验证名称

            // if($field=='goods_name'){
            //     $scene='edit';
            // }
            //     $validate=validate('goods');
            //     $result = $validate->scene($scene)->check($data);
            //     if(empty($result)){
            //         // 验证失败 输出错误信息
            //        fail($validate->getError());
            //     }
                
            $brand_model=model('goods');
            $res=$brand_model->save($data,$where);
            if($res){
                successly('修改成功');
            }else{
                fail('修改失败');
            }
        }
        //删除
        public function goodsdel(){
            $goods_id=input('param.goods_id');
            $goods_model=model('goods');
            $where=[
                'goods_id'=>$goods_id
            ];
            $arr=$goods_model->where($where)->find();
            $data=Explode('/',$arr['goods_imgs']);
            $count=count($data);
            //dump($data);exit;
           
            
                                                                         

            $res=$goods_model->where($where)->delete();
            if($res){
                // for($i=0,$i>$count,){

                // }
                $goods_img=$arr['goods_img'];
                $url='./uploads/'.$goods_img;
                unlink($url);
                successly('删除成功');
            }else{
                fail('删除失败');
            }   
        }
       //修改
       public function goodsUpd(){
        $goods_id=input('get.goods_id');
        $where=[
            'goods_id'=>$goods_id
        ];
        $goods_model=model('goods');
        $data=$goods_model->where($where)->find();
        $brand_model=model('Brand');
        $arr=$brand_model->select(); 
        $this->assign('data',$data);
        $this->assign('arr',$arr);
        $this->getCateAndBrandInfo();
        return view();
       }
       //修改执行
       public function goodsUpdaDo(){
        $data=input('param.');
        //dump($data);exit;
         $where=[
             'goods_id'=>$data['goods_id']
         ];
         
        // dump($where);exit;
         //验证
          $validate=validate('Goods');
             $result = $validate->scene('edit')->check($data);
             if(empty($result)){
                 // 验证失败 输出错误信息
                fail($validate->getError());
             }

         $goods_model=model('goods');
         $res=$goods_model->allowField(true)->save($data,$where);
         $goods_img=$goods_model->where($where)->value("goods_img");  
         if($res===false){
            //  if(!empty($goods_img)){
            //      $url='./uploads/'.$goods_img;
            //      unlink($url);
            //  }
             fail('修改失败');
         }else{
              successly('修改成功');
         }
     }
       
    }
?>
