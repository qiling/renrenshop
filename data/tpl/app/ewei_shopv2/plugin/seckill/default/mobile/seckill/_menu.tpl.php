<?php defined('IN_IA') or exit('Access Denied');?><div class="fui-navbar">

    <a href="<?php  echo mobileUrl('seckill')?>" class="external nav-item <?php  if($_W['routes'] == 'seckill') { ?>active<?php  } ?>">
        <span class="icon icon-home"></span>
        <span class="label">秒杀首页</span>
    </a>
    <a href="<?php  echo mobileUrl('member/cart')?>" class="external nav-item" id="menucart">
        <span class="icon icon-cart"></span>
        <span class="label">购物车</span>
        <?php  if($cartcount>0) { ?><span class="badge"><?php  echo $cartcount;?></span><?php  } ?>
    </a>
    <a href="<?php  echo mobileUrl('order')?>" class="external nav-item">
        <span class="icon icon-order1"></span>
        <span class="label">我的订单</span>
    </a>
    <a href="<?php  echo mobileUrl()?>" class="external nav-item">
        <span class="icon icon-back"></span>
        <span class="label">返回商城</span>
    </a>
</div>

<!--4000097827-->