<?php
namespace app\admin\controller;
use think\Controller;
    class Brand extends Common{
        //文件上传
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
        //添加
        public function brandAdd(){
            if(checkRequest()){
                $data=input('param.');
                //验证
                $validate=validate('Brand');
                $result = $validate->check($data);
                if(empty($result)){
                    // 验证失败 输出错误信息
                fail($validate->getError());
                }
                $brand_model=model('brand');
                $res=$brand_model->allowField(true)->save($data);
                if($res){
                    successly('添加成功');
                }else{
                    fail('添加失败');
                }
            }else{
                return view();
            }
          
        }
        //验证唯一
        public function checkName(){
         
            $brand_name=input('param.brand_name');
            $brand_model=model('brand');
            $where=[
                'brand_name'=>$brand_name
            ];
            $res=$brand_model->where($where)->find();
            if(!empty($res)){
                echo 'no';
            }else{
                echo 'ok';
            }
        }
        //展示
        public function brandList(){
            return view();
        }
       //展示执行
       public function find(){
           
           $brand_model=model('Brand');
           $p=input('get.page');
           $limit=input('get.limit');
           
           $brand_name=input('param.brand_name');
           $where=[
            'brand_name'=>['like',"%$brand_name%"]
           ];
           $brandInfo=$brand_model->where($where)->page($p,$limit)->select();
                   foreach($brandInfo as $k=>$v){
                    if($v['brand_show']=='1'){
                        $brandInfo[$k]['brand_show']='是';
                    }else{
                        $brandInfo[$k]['brand_show']='否';
                    }
               }
           $count=$brand_model->where($where)->count();
           $arr=[
            'code'=>0,
            'data'=>$brandInfo,
            'count'=>$count
           ];
           echo json_encode($arr);
     }
         //既点即改
         public function brandedit(){
            $brand_id=input('post.brand_id');
            $value=input('post.value');
            $field=input('post.field');
            $where=[
                'brand_id'=>$brand_id
            ];
            $data=[
                $field=>$value
            ];
            //在修改前验证名称

            if($field=='brand_name'){
                $scene='edit';
            }
                $validate=validate('Brand');
                $result = $validate->scene($scene)->check($data);
                if(empty($result)){
                    // 验证失败 输出错误信息
                   fail($validate->getError());
                }
                
            $brand_model=model('brand');
            $res=$brand_model->save($data,$where);
            if($res){
                successly('修改成功');
            }else{
                fail('修改失败');
            }
        }
        //删除
        public function branddel(){
            $brand_id=input('param.brand_id');
            $brand_model=model('Brand');
            $where=[
                'brand_id'=>$brand_id
            ];
            $brand_logo=$brand_model->where($where)->value("brand_logo");
           
            $res=$brand_model->where($where)->delete();
            if($res){
                $url='./uploads/'.$brand_logo;
                unlink($url);
                successly('删除成功');
            }else{
                fail('删除失败');
            }   
        }
        //修改视图
        public function brandUpd(){
            $brand_id=input('get.brand_id','','intval');
            if(empty($brand_id)){
                $this->error('请正常操作',url('Brand/brandList'));exit;
            }
            $where=[
                'brand_id'=>$brand_id
            ];
            $brandInfo=model('brand')->where($where)->find();
            if(empty($brandInfo)){
                $this->error('请正常操作',url('Brand/brandList'));exit;
            }
            $this->assign('brandInfo',$brandInfo);
            return view();
        }
        //修改执行
        public function brandUpdata(){
            $data=input('param.');
           //dump($data);exit;
            $where=[
                'brand_id'=>$data['brand_id']
            ];
            
           // dump($where);exit;
            //验证
             $validate=validate('Brand');
                $result = $validate->scene('edit')->check($data);
                if(empty($result)){
                    // 验证失败 输出错误信息
                   fail($validate->getError());
                }

            $brand_model=model('brand');
            $res=$brand_model->allowField(true)->save($data,$where);
            $brand_logo=$brand_model->where($where)->value("brand_logo");  
            if($res===false){
                if(!empty($brand_logo)){
                    $url='./uploads/'.$brand_logo;
                    unlink($url);
                }
                fail('修改失败');
            }else{
                 successly('修改成功');
            }
        }
    }
?>
