<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/_header', TEMPLATE_INCLUDEPATH)) : (include template('common/_header', TEMPLATE_INCLUDEPATH));?>
<div class="list-container">
    <div class="list-menu">
        <div class="list-menu-left">
            <ul class="list-menu-left-ul">
                <li><a href="<?php  echo webUrl(array('article/index'))?>" class="<?php  if(empty($_GPC['cate'])) { ?>active<?php  } ?>">全部</a></li>
                <?php  if(is_array($category)) { foreach($category as $index => $item) { ?>
                <li><a href="<?php  echo webUrl(array('article/index','cate'=>$item['id']))?>" class="<?php  if($_GPC['cate'] == $item['id']) { ?>active<?php  } ?>"><?php  echo $item['name'];?></a></li>
                <?php  } } ?>
            </ul>
        </div>
        <div class="list-menu-right">
            <form action="" method="post">
                <input type="search" class="list-menu-search" name="keyword" placeholder="快速检索" value="">
            </form>
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="list-news">
        <?php  if($articles) { ?>
        <ul class="list-news-ul">
            <?php  if(is_array($articles)) { foreach($articles as $index => $item) { ?>
            <li onclick="javascript:window.open('<?php  echo webUrl(array('article/detail','id'=>$item['id']))?>','','')">
                <div class="col-lg-1 list-news-li-left"><strong><?php  echo date('d', $item['createtime'])?></strong><span><?php  echo date('Y-m', $item['createtime'])?></span></div>
                <div class="col-lg-11 list-news-li-right">
                    <h3><?php  echo $item['title'];?></h3>
                    <p><?php  echo mb_substr(strip_tags(htmlspecialchars_decode($item['content'])),0,140,'utf-8')?>...</p>
                </div>
                <div style="clear:both;"></div>
            </li>
            <?php  } } ?>
        </ul>
        <?php  } else { ?>
        暂无内容！
        <?php  } ?>
        <?php  echo $pager;?>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/_footer', TEMPLATE_INCLUDEPATH)) : (include template('common/_footer', TEMPLATE_INCLUDEPATH));?>
</body>
</html>