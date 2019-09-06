<?php
namespace app\admin\controller;
use think\Controller;
class Essay extends Controller{
    //添加
    public function essayAdd(){
        if(checkRequest()){
            //echo "a";die;
            $data=input('post.');
           
            //dump($data);exit;
            if($data['time']==1){
                $data['create_time']=time();
                $essay_model=model('Essay');
                $res=$essay_model->allowField(true)->save($data);
                if($res){
                    successly('添加成功');
                }else{
                    fail('添加失败');
                }
            }else{
                $data['create_time']=strtotime($data['create_time']);
                //echo ($data['create_time']);exit;
                if($data['create_time']<time()){
                    fail('定时发布时间大于');
                }
                $essay_model=model('Essay');
                    $res=$essay_model->allowField(true)->save($data);
                    if($res){
                        successly('添加成功');
                    }else{
                        fail('添加失败');
                    }
            }
            
        }else{
            $catagory_model=model('Catagory');
            $arr=$catagory_model->select();
            $this->assign('arr',$arr);
            return view();
        }
    }
    //展示
    public function essayList(){
     
        return view();
    }
    //展示执行
    public function find(){
        $essay_model=model('Essay');

        $essayInfo=$essay_model->select();
       $this->assign('essayInfo',$essayInfo);
        
   
}
}
// $time = date('Y-m-d H:i:s',time());
// $where = [
//     'create_time'=>['elt',time()]
//   ];
//   $res=model('essay')
//   ->alias('e')
//   ->join("catagory c","e.c_id=c.c_id")
//   ->where($where)
//   ->select();
//   $this->assign('res',$res);
//   return $this->fetch();

//   return view();
?>
