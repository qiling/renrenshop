<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/_header', TEMPLATE_INCLUDEPATH)) : (include template('common/_header', TEMPLATE_INCLUDEPATH));?>
<div class="list-container">
    <div class="list-menu">
        <div class="list-menu-left">
            <i><img src="./static/images/list-menu-left.png" alt=""></i>当前位置：
            <a href="<?php  echo webUrl()?>/">首页</a>>><a href="<?php  echo webUrl('article/index')?>">新闻中心</a>>><?php  echo mb_substr(strip_tags(htmlspecialchars_decode($article['title'])),0,30,'utf-8')?>
        </div>
        <div class="list-menu-right">
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="list-news">
        <div class="detail-news-left">
            <h2 class="detail-title"><?php  echo $article['title'];?></h2>
            <div class="detail_subtitle">
                <span>文章分类：<?php  echo $article['name'];?></span>|<span>网站编辑：<?php  echo $article['author'];?></span>|<span>发表时间：<?php  echo date('Y-m-d',$article['createtime'])?></span>|
            </div>
            <div class="detail_content">
                <?php  echo htmlspecialchars_decode($article['content'])?>
            </div>
        </div>
        <div class="detail-news-right">
            <form action="<?php  echo webUrl('article/index')?>" method="post">
                <input type="search" name="keyword" class="list-menu-search" placeholder="快速检索" value="">
            </form>
            <p class="detail_correlation_title">相关文章</p>
            <ul class="detail_correlation_ul">
                <?php  if(is_array($articles)) { foreach($articles as $index => $item) { ?>
                <li><a href="<?php  echo webUrl(array('news/detail','id'=>$item['id']))?>" target="_blank">+ <?php  echo $item['title'];?></a></li>
                <?php  } } ?>
            </ul>
            <dl class="detail-lovely-dl">
                <dt>
                    猜你喜欢
                    <a href="javascript:void(0);" target="_blank" style="display: none;"><i class="glyphicon glyphicon-repeat"></i>换一换</a>
                </dt>
                <dd onclick="javascript:window.open('<?php  echo webUrl(array('article/detail','id'=>$relevant_top['id']))?>','','')">
                    <img src="<?php  echo pctomedia($relevant_top['thumb'])?>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg'" alt="<?php  echo $relevant_top['title'];?>">
                    <p><?php  echo $relevant_top['title'];?></p>
                </dd>
            </dl>
            <ul class="detail-lovely-ul">
                <?php  if(is_array($relevant)) { foreach($relevant as $index => $item) { ?>
                <li><a href="<?php  echo webUrl(array('article/detail','id'=>$item['id']))?>" target="_blank"><i></i><?php  echo $item['title'];?></a></li>
                <?php  } } ?>
            </ul>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/_footer', TEMPLATE_INCLUDEPATH)) : (include template('common/_footer', TEMPLATE_INCLUDEPATH));?>
</body>
</html>