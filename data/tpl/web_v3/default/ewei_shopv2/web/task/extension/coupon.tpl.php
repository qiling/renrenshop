<?php defined('IN_IA') or exit('Access Denied');?><div class="modal-dialog" style="width: 800px">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
                选择优惠券
            </h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="col-sm-1 control-label"></label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <a class="input-group-addon">搜索</a>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-striped" style="width: 100%">
                <br>
                <thead>
                <tr>
                    <th style="width: 30rem;overflow: hidden">优惠券名称</th>
                    <th style="width: 10rem;text-align: center">数量</th>
                    <th style="text-align: center">选择</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $ck => $cv) { ?>
                <tr>
                    <td><?php  echo $cv['couponname'];?></td>
                    <td class="text-center"><input type="text" class="form-control" value="1"></td>
                    <td class="text-center"><a onclick="clickcoupon(this);" data-id="<?php  echo $cv['id'];?>" data-name="<?php  echo $cv['couponname'];?>">选择</a></td>
                </tr>
                <?php  } } ?>
                <tr>
                    <td colspan="3" class="text-center">
                        <div>
                            <ul class="pagination pagination-centered">
                                <?php  if($page >1) { ?><li><a href="javascript:;" page="0" class="pager-nav">首页</a></li>
                                <li><a href="javascript:;" page="<?php  echo $pageprev;?>" class="pager-nav">«上一页</a></li><?php  } ?>
                                <?php  if($page <$pagelast) { ?><li><a href="javascript:;" page="<?php  echo $pagenext;?>" class="pager-nav">下一页»</a></li>
                                <li><a href="javascript:;" page="<?php  echo $pagelast;?>" class="pager-nav">尾页</a></li><?php  } ?>
                            </ul>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function () {
        $(".pager-nav").click(function () {
            getpagecontent($(this).attr('page'),'<?php  echo $type;?>');
        })
    })
</script>