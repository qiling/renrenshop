<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/_header', TEMPLATE_INCLUDEPATH)) : (include template('common/_header', TEMPLATE_INCLUDEPATH));?>
<div class="lynn-banner" style="background: <?php  echo $casebanner['background'];?>">
    <div class="lynn-banner-info">
        <img src="<?php  echo pctomedia($casebanner['casebanner'])?>" alt="">
    </div>
</div>
<div class="list-container" style="padding: 0 0 56px;">
    <div class="lynn-case-menu">
        <ul class="lynn-case-menu-ul">
            <li><a href="<?php  echo webUrl(array('case/index'))?>" class="<?php  if(empty($_GPC['cate'])) { ?>active<?php  } ?>">全部</a></li>
            <?php  if(is_array($category)) { foreach($category as $index => $item) { ?>
            <li><a href="<?php  echo webUrl(array('case/index','cate'=>$item['id']))?>" class="<?php  if($_GPC['cate'] == $item['id']) { ?>active<?php  } ?>"><?php  echo $item['name'];?></a></li>
            <?php  } } ?>
        </ul>
    </div>
    <div class="lynn-case-list">
        <ul class="lynn-case-list-ul">
            <?php  if(is_array($articles)) { foreach($articles as $index => $item) { ?>
            <li>
                <a href="javascript:void(0);">
                    <img src="<?php  echo pctomedia($item['thumb'])?>" class="case-img" alt="<?php  echo $item['title'];?>">
                    <p><?php  echo $item['title'];?></p>
                    <div class="lynn-case-slider">
                        <?php  echo $item['description'];?>
                    </div>
                    <span class="rcode">
                        <img src="<?php  echo pctomedia($item['qr'])?>" width="142" height="142" alt="<?php  echo $item['title'];?>">
                        <p>扫面二维码关注店铺</p>
                    </span>
                </a>
            </li>
            <?php  } } ?>
        </ul>
        <?php  if(!$articles) { ?>暂无内容！<?php  } ?>
        <?php  echo $pager;?>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/_footer', TEMPLATE_INCLUDEPATH)) : (include template('common/_footer', TEMPLATE_INCLUDEPATH));?>
<script type="text/javascript">
    $(function(){
        $(".lynn-case-list-ul li a").on("mouseenter",function(){
            $(this).find(".rcode").show()
        }).on("mouseleave",function(){
            $(this).find(".rcode").hide()
        })
    })
</script>
</body>
</html>