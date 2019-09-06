<?php
    namespace app\admin\validate;
    use think\Validate;
    class Cate extends Validate{
        protected $rule =   [
            'cate_name'  => 'require|checkName|unique:cate'
           
               
       ];
       protected $message  =   [
              'cate_name.require' => '名称必填',
               'cate_name.unique'     => '名称不能重复',
               'cate_name'=>'分类必须是汉字三到五个'
               
            ];
        
            protected $scene = [
                        'edit'  =>  ['cate_name',],
                        
                    ];
        //自定义规则
        //姓名验证
        protected function checkName($value,$rule,$data){
            $reg='/^[\x{4e00}-\x{9fa5}]{2,5}$/u';
              if(!preg_match($reg,$value)){
             return '分类必须是汉字三到五个';
            }else{
              return true;
             }
          }
        



    }
       
   
?>