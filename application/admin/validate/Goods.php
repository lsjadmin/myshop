<?php
    namespace app\admin\validate;
    use think\Validate;
    class Goods extends Validate{
        protected $rule =   [
            'goods_name'  => 'require|checkName|unique:goods',
            'goods_price'   => 'require|number',
            'market_price'=>'require|number'
            
            
               
       ];
       protected $message  =   [
              'goods_name.require' => '商品名称必填',
               'goods_name.unique'     => '商品名称不能重复',
               'goods_name'=>'商品必须是汉字二到五位',
               'goods_price.require'=>'商品价格必填',
               'goods_price'=>'商品价格只能是数字',
               'market_price.require'=>'市场价格必填',
                'market_price'=>'市场价格只能是数字',
               'admin_email.require'=>'邮箱必填'
             
            ];
        
            protected $scene = [
                        'edit'  =>  ['goods_name','goods_price','market_price',],
                        
                    ];
        //自定义规则
        //姓名验证
        protected function checkName($value,$rule,$data){
            $reg='/^[\x{4e00}-\x{9fa5}]{2,5}$/u';
              if(!preg_match($reg,$value)){
             return '商品必须是汉字三到五个';
            }else{
              return true;
             }
          }
         //手机号验证
        //  protected function checkTel($value,$rule,$data){
        //     $reg='/^1[358]\d{9}$/';
        //       if(!preg_match($reg,$value)){
        //      return '手机号13 15 18开头11位数字';
        //     }else{
        //       return true;
        //      }
        //   }



    }
       
   
?>