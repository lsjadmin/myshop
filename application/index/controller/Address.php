<?php
namespace app\index\controller;
use think\Controller;
class Address extends Common{
    public function index(){
        //查询所有省的收获地址
        $areaInfo=$this->getAreaInfo(0);
        $this->assign('areaInfo',$areaInfo);
        //展示
        $addressInfoa=$this->getAddressInfo();
        $this->assign('addressInfoa',$addressInfoa);
        return view();
    }
    //查询地址
    public function getAreaInfo($pid){
        $area_model=model('area');
        $where=[
            'pid'=>$pid
        ];
        $areaInfo=$area_model->where($where)->select();
       return $areaInfo;
    }
    //
    public function getArea(){
        
        $id=input('post.id',0,'intval');
        if(empty($id)){
            fail('请至少选择一项');
        }
        $areaInfo=$this->getAreaInfo($id);
        //print_r($areaInfo);die;
        echo json_encode(['areaInfo'=>$areaInfo,'code'=>1]);
    }
    //添加
    public function addressDb(){
        $data=input('param.');
        $address_model=model('address');
        if($data['is_default']==1){
            $where=[
                'user_id'=>$this->userInd()
            ];
              $address_model->startTrans();//事物操作  数据库
            $address=$address_model->save(['is_default'=>2],$where);
            $res=$address_model->isUpdate(false)->save($data);
            if($address&&$res){
                $address_model->commit();
                successly('添加成功');
            }else{
                $address_model->rollback();
                fail('添加失败');
            }
        }else{
            $res=$address_model->save($data);
            if($res){
                successly('添加成功');
            }else{
                fail('添加失败');
            }
        }
        
    }
    //删除
    public function addressdel(){
        $id=input('post.id');
       // echo $id;die;
       $address_model=model('address');
       $where=[
        'address_id'=>$id
       ];
       $res=$address_model->where($where)->delete();
       //dump($res);die;
       if($res){
        successly('删除成功');
       }else{
        fail('删除失败');
       }
    }
    //默认
        public function addressdefault(){
            $address_id=input('post.id');
            $address_model=model('address');
    
            $where=[
                'user_id'=>$this->userInd(),
                'is_default'=>1
            ];
            $addressInfo=$address_model->where($where)->count();
           // dump($addressInfo);die;
            if($addressInfo>=1){
                $wherea=[
                    'user_id'=>$this->userInd()
                ];
                $address=$address_model->save(['is_default'=>2],$wherea);
                $addressWhere=[
                    'address_id'=>$address_id
                ];
                $res=$address_model->save(['is_default'=>1],$addressWhere);
                if($res){
                    successly('设置默认成功');
                }else{
                    fail('设置默认失败');
                }
            }else{
                $addressWhere=[
                    'address_id'=>$address_id
                ];
                $res=$address_model->save(['is_default'=>1],$addressWhere);
                if($res){
                    successly('设置默认成功');
                }else{
                    fail('设置默认失败');
                }
            }
        }
    //编辑
        public function addressUpdate(){
            $address_model=model('address');
            if(checkRequest()){
               
                 $data=input('param.');
                 if($data['is_default']==1){
                    $where=[
                        'user_id'=>$this->userInd()
                    ];
                      $address_model->startTrans();//事物操作  数据库
                        $res1=$address_model->save(['is_default'=>2],$where);
                        $whereId=[
                            'address_id'=>$data['address_id']
                        ];
                        $res2=$address_model->save($data,$whereId);
                    if($res1!==false&&$res2!==false){
                        $address_model->commit();
                        successly('修改成功');
                    }else{
                        $address_model->rollback();
                        fail('修改失败');
                    }
                }else{
                    $data=input('param.');
                    $whereId=[
                        'address_id'=>$data['address_id']
                    ];
                    $res=$address_model->save($data,$whereId);
                    if($res){
                        successly('修改成功');
                    }else{
                        fail('修改失败');
                    }
                }
            }else{
                $address_id=input('get.address_id');
                $whereId=[
                    'address_id'=>$address_id
                ];
                $addressInfo=$address_model->where($whereId)->find();
                //dump($addressInfo);die;
                 //查询所有省的收获地址
                 //省
                $proviceInfo=$this->getAreaInfo(0);
                //市
                $cityInfo=$this->getAreaInfo($addressInfo['province']);
              //  dump($cityInfo);die;
                //县
                $areaInfo=$this->getAreaInfo($addressInfo['city']);
                $this->assign('proviceInfo',$proviceInfo);
                $this->assign('cityInfo',$cityInfo);
                $this->assign('areaInfo',$areaInfo);
                $this->assign('addressInfo',$addressInfo);
                return view();
    
            }
           
        }       
}
?>