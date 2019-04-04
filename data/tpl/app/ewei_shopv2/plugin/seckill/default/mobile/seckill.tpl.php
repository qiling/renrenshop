<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "<?php  echo $page_title;?>";</script>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/static/js/dist/swiper/swiper.min.css">
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/seckill/template/mobile/default/static/css/common.css">
<div class="fui-page seckill-page">
    <?php  if(is_h5app()) { ?>
        <div class="fui-header">
            <div class="fui-header-left">
                <a class="back"></a>
            </div>
            <div class="title"><?php  echo $page_title;?></div>
            <div class="fui-header-right"></div>
        </div>
    <?php  } ?>
    <div class="fui-content navbar">
        <input type="hidden" id="currenttime" value="<?php  echo $currenttime;?>" />



        <div class="swiper-container time-container">
            <div class="swiper-wrapper">
                <?php  if(is_array($times)) { foreach($times as $key => $time) { ?>
                <div class="swiper-slide time-slide <?php  if($time['status']==0 || $timeindex==$key) { ?>current<?php  } ?> time-slide-<?php  echo $time['id'];?>" data-index="<?php  echo $key;?>">
                    <span class="time"><?php  echo $time['time'];?>:00</span>
                    <span class="text">

                        <?php  if($time['status']==0) { ?>
                        抢购中
                        <?php  } else if($time['status']==1) { ?>
                        即将开始
                        <?php  } else { ?>
                        已结束<?php  } ?></span>
                </div>
                <?php  } } ?>

            </div>
         </div>


        <div class="swiper-container adv-container" style="margin-top:.5rem;">
            <div class="swiper-wrapper" style="width: 100%">
                <?php  if(is_array($advs)) { foreach($advs as $adv) { ?>
                <div class="swiper-slide adv-slide no-swiper">
                    <a href="<?php echo empty($adv['link'])?'#':$adv['link']?>">
                        <img src="<?php  echo $adv['thumb'];?>"/>
                    </a>
                </div>
                <?php  } } ?>
            </div>
        </div>

<?php  if(count($rooms)>1) { ?>
        <div class="swiper-container room-container">
            <div class="swiper-wrapper">
                <?php  if(is_array($rooms)) { foreach($rooms as $room) { ?>
                <a class="external swiper-slide room-slide <?php  if($roomid==$room['id']) { ?>selected<?php  } ?>" href="<?php  echo mobileUrl('seckill',array('roomid'=>$room['id']))?>">
                    <?php  echo $room['title'];?>
                </a>
                <?php  } } ?>
            </div>
        </div>
<?php  } ?>

        <div class="swiper-container goods-container">
            <div class="swiper-wrapper">
                <?php  if(is_array($times)) { foreach($times as $time) { ?>
                <div class="swiper-slide goods-slide" data-timeid="<?php  echo $time['id'];?>"
                     data-starttime="<?php  echo $time['starttime'];?>"
                     data-endtime="<?php  echo $time['endtime'];?>"
                     data-status="<?php  echo $time['status'];?>">
                    <div class='infinite-loading' ><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
                </div>
                <?php  } } ?>
            </div>
        </div>
    </div>
    <?php  $this->footerMenus()?>

    <script language="javascript">
        require(['../addons/ewei_shopv2/plugin/seckill/static/js/mobile.js'], function(model){
            model.init({taskid:<?php  echo $taskid;?>,roomid:<?php  echo $roomid;?>,timeid: <?php  echo $timeid;?>, roomindex:<?php  echo $roomindex;?>, roomcount: <?php  echo count($rooms)?> , timeindex:<?php  echo $timeindex;?>,  timecount: <?php  echo count($times)?> , advcount:<?php  echo count($advs)?>  });
        });
    </script>


</div>
<script type="text/html" id="tpl_seckill">

    <div class="fui-list-group time-group-<%time.id%>" style="margin-top:0px">
        <div class="fui-list-group-title">
            <%if time.status>=0%>
             <span class="timer">
                  <%if time.status==1%>距开始<%else%>距结束<%/if%> <span class="time-hour">-</span>:<span class="time-min">-</span>:<span class="time-sec">-</span>
             </span>
            <%/if%>
            <%if time.status==-1%>还可以继续抢购哦~<%/if%>
            <%if time.status==0%>抢购中 先下单先得哦<%/if%>
            <%if time.status==1%>即将开始 先下单先得哦<%/if%>

        </div>

        <%each goods as g%>
        <div class='fui-list align-start'>
            <div class='fui-list-media'>
                <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>"><img src="<%g.thumb%>" /></a>
            </div>
            <div class='fui-list-inner'>
                <a class='text' href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>"><%g.title%></a>
                <div class="info">
                     <span class="button">
                         <%if time.status==1%>
                         <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>" class="btn btn-success btn-sm">等待抢购</a>

                         <%else%>
                                <%if g.percent>=100%>
                                <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>" class="btn btn-default btn-sm">已抢空</a>
                             <%else%>
                         <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>" class="btn btn-danger btn-sm">去抢购</a>

                             <%/if%>
                          <%/if%>
                     </span>
                    <div class="price">&yen;<%g.price%></div>
                </div>
                <div class="info info1">
                    <%if time.status!=1%>
                        <span class="process">
                                <div class="inner" style="width:<%g.percent%>%"></div>
                        </span>
                    <span class="process-text">已售 <%g.percent%>%</span>
                    <%/if%>
                    <div class="price1" style="<%if g.productprice==0%>color:#FFFFFF<%/if%>">&yen;<%g.productprice%></div>
                </div>
            </div>
        </div>
        <%/each%>
 </div>

</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>