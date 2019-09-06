<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\WWW\myshopa\public/../application/index\view\index\div.html";i:1550815664;}*/ ?>
<div cate_id="<?php echo $floorInfo['topcate']['cate_id']; ?>" floor="<?php echo $floor_num; ?>">  
    <div class="i_t mar_10">
            <span class="floor_num"><?php echo $floor_num; ?>F</span>
            <span class="fl"><?php echo $floorInfo['topcate']['cate_name']; ?></span>  
            <span class="i_mores fr">
               
                    <?php if(is_array($floorInfo['sonCate']) || $floorInfo['sonCate'] instanceof \think\Collection || $floorInfo['sonCate'] instanceof \think\Paginator): $i = 0; $__LIST__ = $floorInfo['sonCate'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <a href="#"><?php echo $v['cate_name']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
             
            </span>
    </div>
    <div class="content">
    
            <div class="fresh_mid">
                <ul>
                        <?php if(is_array($floorInfo['goodsInfo']) || $floorInfo['goodsInfo'] instanceof \think\Collection || $floorInfo['goodsInfo'] instanceof \think\Paginator): $i = 0; $__LIST__ = $floorInfo['goodsInfo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li>
                        <div class="name"><a href="<?php echo url('Goods/goodsdetail'); ?>?goods_id=<?php echo $v['goods_id']; ?>&&goods_name=<?php echo $v['goods_name']; ?>""><?php echo $v['goods_name']; ?></a></div>
                        <div class="price">
                            <font><span><?php echo $v['goods_price']; ?></span></font> &nbsp; 26R
                        </div>
                        <div class="img"><a href="<?php echo url('Goods/goodsdetail'); ?>?goods_id=<?php echo $v['goods_id']; ?>&&goods_name=<?php echo $v['goods_name']; ?>""><img src="__ROOT__\uploads\<?php echo $v['goods_img']; ?>" width="185" height="155" /></a></div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>      
                </ul>
            </div>
    
    </div>  
    </div>  