<?php
namespace app\admin\controller;
use think\Controller;
    class Cate extends Common{
        //添加
        public function cateAdd(){
            if(checkRequest()){
            $data=input('param.');   
            //验证
            $validate=validate('Cate');
                $result = $validate->check($data);
                if(empty($result)){
                    // 验证失败 输出错误信息
                fail($validate->getError());
                }
              $cate_model=model('cate');
              $res=$cate_model->save($data); 
              if($res){
                successly('添加成功');
              }else{
                fail('添加失败');
              }
            }else{
                $this->getCateAndBrandInfo();
                return view();
               
            }
          
        }
        //展示
        public function cateList(){
            $cate_model=model('cate');
            // $data=$cate_model->query("select *,concat(path,'-',cate_id) as new_path from shop_cate order by new_path asc");
            //dump($data);exit;
            //
            $data=$cate_model->select();
            $data=getCateInfo($data);
            $this->assign('data',$data);
            return view();
            }
        //删除
    public function cateDel(){
        $cate_id=input('get.cate_id');
        $cate=model('cate');
        $Where=[
            'pid'=>$cate_id
        ];
        $count=$cate->where($Where)->count();
        if($count>0){
            fail('此分类下有信息，不能删除');
        }
        $res =$cate->where(['cate_id'=>$cate_id])->delete();
            if($res){
                return 1;
            }else{
                return 0;
            }
     }
        //修改视图
        public function cateUpd(){
            $cate_id=input('get.cate_id');
            $cate_model=model('Cate');
            $where=[
                'cate_id'=>$cate_id
            ];
            $arr=$cate_model->where($where)->find();
            $this->assign('arr',$arr);
           // dump($cate_id);exit;
           $this->getCateAndBrandInfo();
            return view();

        }
        //修改执行
        public function cateUpdo(){
            $data=input('param.');
            $where=[
                'cate_id'=>$data['cate_id']
            ];
            $cate_model=model('Cate');
            $res=$cate_model->save($data,$where);
            if($res){
                successly('修改成功');
            }else{
                fail('修改失败');
            }
        }
       //既点即改
       public function cateChange(){
           $field=input('post.field');
           $value=input('post.value');
           $cate_id=input('post.cate_id');
           $where=[
            'cate_id'=>$cate_id
           ];
           $data=[
            $field=>$value
           ];
           $cate_model=model('cate');
           $res=$cate_model->save($data,$where);
           if($res){
            successly('操作成功');
           }else{
            fail('操作失败');
           }
       }
    }
?>
