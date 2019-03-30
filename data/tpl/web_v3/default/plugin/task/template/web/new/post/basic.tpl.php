<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
        <label class="col-sm-2 control-label" style="padding-top: 0">任务类型</label>
        <div class="col-sm-9 col-xs-12">
            <span class="taskname"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span id="open" class="text-success <?php  if($id) { ?>hide<?php  } ?>" style="cursor: pointer">修改类型</span>
            <input type="hidden" name="type" value="<?php  echo $task['type'];?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label must">任务名称</label>
        <div class="col-sm-9 col-xs-12">
            <div class="input-group">
                <input type="text" class="form-control" name="title"  value="<?php  echo $task['title'];?>" autocomplete="off">
                <span class="input-group-addon" style="padding: 0px;">
                    <img src="<?php  echo $task['image'];?>" id="showimg" width="34px" height="34px">
                </span>
                <input type="hidden" id="imagehidden" name="image" value="<?php  echo $task['image'];?>">
                <span class="input-group-addon btn" data-toggle="selectImg" data-input="#imagehidden" data-img="#showimg" data-full="1">选择图片</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label must">开放时间</label>
        <div class="col-sm-9 col-xs-12">
            <?php  echo tpl_form_field_daterange('opentime',array('starttime'=>substr($task['starttime'],0,-3),'endtime'=>substr($task['endtime'],0,-3)),true)?>
            <span class="help-block">在这个时间段内可以接任务，完成任务的截止时间与此时间段无关</span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">任务需求</label>
        <div class="col-sm-9 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" <?php  if($task['type'] == 'poster') { ?><?php  } else { ?>id="verb"<?php  } ?>><?php  if(!empty($task['verb'])) { ?><?php  echo $task['verb'];?><?php  } else { ?><?php  echo $poster_text['verb'];?><?php  } ?></span>
                <input type="number"  value="<?php  echo $task['demand'];?>" name="requirenumber" class="form-control" autocomplete="off" id="number">
                <span class="input-group-addon" <?php  if($task['type'] == 'poster') { ?><?php  } else { ?>id="unit"<?php  } ?>><?php  if(!empty($task['unit'])) { ?><?php  echo $task['unit'];?><?php  } else { ?><?php  echo $poster_text['unit'];?><?php  } ?></span>
            </div>
        </div>
    </div>

<div class="form-group justposter">
    <label class="col-sm-2 control-label">文字自定义</label>
    <div class="col-sm-9 col-xs-12">
        <div class="input-group">
            <span class="input-group-addon">前缀：</span>
            <input type="text"  value="<?php  echo $task['verb'];?>" name="diy[verb]" class="form-control" autocomplete="off">
            <span class="input-group-addon">后缀：</span>
            <input type="text"  value="<?php  echo $task['unit'];?>" name="diy[unit]" class="form-control" autocomplete="off">
        </div>
        <span class="help-block text-danger">“转发”与“吸引”等描述词汇可能在微信中涉嫌诱导分享，微信可能会因敏感词汇封杀您的域名，您可以把前缀和后缀自定义为更委婉的词汇。</span>
    </div>
</div>
<div class="form-group justposter">
    <label class="col-sm-2 control-label">关键字触发</label>
    <div class="col-sm-9 col-xs-12">
        <input type="text" class="form-control" value="<?php  echo $task['keyword_pick'];?>" name="keyword_pick">
        <span class="help-block ">回复关键字将接取到本任务</span>
    </div>
</div>
<div class="form-group justposter">
    <label class="col-sm-2 control-label">指定会员等级</label>
    <div class="col-sm-9 col-xs-12">
        <select name="member_level" class="select2 form-control" placeholder="">
            <option value="">默认扫描后不加入任何会员等级</option>
            <?php  if(is_array($member_levels)) { foreach($member_levels as $member_level) { ?>
            <option value="<?php  echo $member_level['id'];?>" <?php  if($task['member_level'] == $member_level['id']) { ?>selected<?php  } ?>><?php  echo $member_level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <span class="help-block ">扫描关注公众号的人将加入指定会员等级</span>
    </div>
</div>
<div class="form-group justposter">
    <label class="col-sm-2 control-label">指定标签组</label>
    <div class="col-sm-9 col-xs-12">
        <select name="member_group[]" class="select2 form-control" multiple placeholder="默认扫描后不加入任何标签组">
            <?php  if(is_array($member_groups)) { foreach($member_groups as $member_group) { ?>
            <option value="<?php  echo $member_group['id'];?>" <?php  if(in_array($member_group['id'],explode(',',$task['member_group']))) { ?>selected<?php  } ?>><?php  echo $member_group['groupname'];?></option>
            <?php  } } ?>
        </select>
        <span class="help-block ">扫描关注公众号的人将进入指定标签组</span>
    </div>
</div>

<div class="form-group justposter">
    <label class="col-sm-2 control-label">自动接任务</label>
    <div class="col-sm-9 col-xs-12">
        <label class="radio-inline">
            <input type="radio" name="auto_pick" value="1" <?php  if($task['auto_pick'] == 1) { ?>checked<?php  } ?>>开启
        </label>
        <label class="radio-inline">
            <input type="radio" name="auto_pick" value="0" <?php  if($task['auto_pick'] == 0) { ?>checked<?php  } ?>>关闭
        </label>
        <span class="help-block text-danger">通过扫描本任务海报关注公众号的人将自动获得一个海报任务</span>
    </div>
</div>

    <!--购买指定商品-->
    <div class="form-group" style="display: none" id="requiregoods">
        <label class="col-sm-2 control-label must">指定商品</label>
        <div class="col-sm-9 col-xs-12">
            <?php  if($task['type'] == 'poster') { ?>
            <?php  echo tpl_goods_selector('requiregoods','');?>
            <?php  } else { ?>
            <?php  echo tpl_goods_selector('requiregoods',$task['design_data']);?>
            <?php  } ?>
        </div>
    </div>
    <div class="form-group hide">
        <label class="col-sm-2 control-label">接取方式</label>
        <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
                <input type="radio" name="picktype" value="0" <?php  if($task['picktype'] == 0) { ?>checked<?php  } ?>>
                手动接取 （必须先接任务再完成）</label><br>
            <label class="radio-inline">
                <input type="radio" name="picktype" value="1" id="globalpickup" <?php  if($task['picktype'] == 1) { ?>checked<?php  } ?>>
                无需接取 （完成即可领奖，无需先接任务）
            </label><br>
            <!--<label class="radio-inline">-->
                <!--<input type="radio" name="picktype" value="2" <?php  if($task['picktype'] == 2) { ?>checked<?php  } ?>>-->
                <!--关注公众号自动接取</label>-->
        </div>
    </div>

    <div id="stop">
        <div class="form-group">
            <label class="col-sm-2 control-label">截止时间</label>
            <div class="col-sm-9 col-xs-12">
                <label class="radio-inline">
                    <input type="radio" name="stoptype" value="0" <?php  if($task['stop_type'] == 0) { ?>checked<?php  } ?>>无限制
                </label>
                <label class="radio-inline">
                    <input type="radio" name="stoptype" value="1" <?php  if($task['stop_type'] == 1) { ?>checked<?php  } ?>>按限时
                </label>
                <label class="radio-inline">
                    <input type="radio" name="stoptype" value="2" <?php  if($task['stop_type'] == 2) { ?>checked<?php  } ?>>按日期
                </label>
                <label class="radio-inline">
                    <input type="radio" name="stoptype" value="3" <?php  if($task['stop_type'] == 3) { ?>checked<?php  } ?>>按周期
                </label>
                <span class="help-block">完成任务的截止时间与此时间段有关</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <div class="input-group" id="stoptype1" style="display: none">
                    <span class="input-group-addon">自接任务起必须在</span>
                    <input type="number" value="<?php  echo $task['stop_limit']/3600?>" name="stoplimit" class="form-control" autocomplete="off">
                    <span class="input-group-addon">小时内完成</span>
                </div>
                <div class="input-group" id="stoptype2" style="display: none">
                    <span class="input-group-addon">自接任务起必须在</span>
                    <?php  echo tpl_form_field_date('stoptime',$task['stop_time'],true)?>
                    <span class="input-group-addon">前完成</span>
                </div>
                <div class="input-group" id="stoptype3" style="display: none">
                    <span class="input-group-addon">自接任务起必须在</span>
                    <select name="stopcycle" class="form-control">
                        <option value="0" <?php  if($task['stop_cycle'] == 0) { ?>selected<?php  } ?>>本日</option>
                        <option value="1" <?php  if($task['stop_cycle'] == 1) { ?>selected<?php  } ?>>本周</option>
                        <option value="2" <?php  if($task['stop_cycle'] == 2) { ?>selected<?php  } ?>>本月</option>
                    </select>
                    <span class="input-group-addon">内完成</span>
                </div>

            </div>
        </div>
    </div>
    <div id="repeat">
        <div class="form-group">
            <label class="col-sm-2 control-label">重复领取</label>
            <div class="col-sm-9 col-xs-12">
                <label class="radio-inline">
                    <input type="radio" name="repeattype" value="0" <?php  if($task['repeat_type'] == 0) { ?>checked<?php  } ?>>无限制
                </label>
                <label class="radio-inline">
                    <input type="radio" name="repeattype" value="1" <?php  if($task['repeat_type'] == 1) { ?>checked<?php  } ?>>不可重复
                </label>
                <label class="radio-inline">
                    <input type="radio" name="repeattype" value="2" <?php  if($task['repeat_type'] == 2) { ?>checked<?php  } ?>>按间隔
                </label>
                <label class="radio-inline">
                    <input type="radio" name="repeattype" value="3" <?php  if($task['repeat_type'] == 3) { ?>checked<?php  } ?>>按周期
                </label>
                <span class="help-block">完成任务或任务失败后间隔多久可重复领取此任务</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <div class="input-group" id="repeattype2" style="display: none">
                    <span class="input-group-addon">自接完成任务或任务失败起，必须</span>
                    <input type="number" value="<?php  echo $task['repeat_interval']/3600?>" name="repeatinterval" class="form-control" autocomplete="off">
                    <span class="input-group-addon">小时 后才能再领取此任务</span>
                </div>
                <div class="input-group" id="repeattype3" style="display: none">
                    <span class="input-group-addon">自接完成任务或任务失败起，必须</span>
                    <select name="repeatcycle" class="form-control">
                        <option value="0" <?php  if($task['repeat_cycle'] == 0) { ?>selected<?php  } ?>>明日</option>
                        <option value="1" <?php  if($task['repeat_cycle'] == 1) { ?>selected<?php  } ?>>下个周</option>
                        <option value="2" <?php  if($task['repeat_cycle'] == 2) { ?>selected<?php  } ?>>下个月</option>
                    </select>
                    <span class="input-group-addon">才能再领取此任务</span>
                </div>
            </div>
        </div>
    </div>
