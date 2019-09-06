<?php
    namespace app\admin\validate;
    use think\Validate;
    class Brand extends Validate{
        protected $rule =   [
            'brand_name'  => 'require|checkName|unique:brand'
               
       ];
       protected $message  =   [
              'brand_name.require' => '品牌必填',
               'brand_name.unique'     => '品牌不能重复',
               'brand_name'=>'品牌必须是汉字三到五个'
              
            ];
            protected $scene = [
                        'edit'  =>  ['brand_name'],
                    ];
        //自定义规则
        //姓名验证
        protected function checkName($value,$rule,$data){
            $reg='/^[\x{4e00}-\x{9fa5}]{3,5}$/u';
              if(!preg_match($reg,$value)){
             return '品牌必须是汉字三到五个';
            }else{
              return true;
             }
          }
        



    }
       
   
?>