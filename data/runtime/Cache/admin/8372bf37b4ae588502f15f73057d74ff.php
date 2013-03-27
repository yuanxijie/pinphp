<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="__STATIC__/css/admin/style.css" rel="stylesheet"/>
	<title><?php echo L('website_manage');?></title>
	<script>
	var URL = '__URL__';
	var SELF = '__SELF__';
	var ROOT_PATH = '__ROOT__';
	var APP	 =	 '__APP__';
	//语言项目
	var lang = new Object();
	<?php $_result=L('js_lang');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>lang.<?php echo ($key); ?> = "<?php echo ($val); ?>";<?php endforeach; endif; else: echo "" ;endif; ?>
	</script>
</head>

<body>
<div id="J_ajax_loading" class="ajax_loading"><?php echo L('ajax_loading');?></div>
<?php if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav">
    <div class="content_menu ib_a blue line_x">
    	<?php if(!empty($big_menu)): ?><a class="add fb J_showdialog" href="javascript:void(0);" data-uri="<?php echo ($big_menu["iframe"]); ?>" data-title="<?php echo ($big_menu["title"]); ?>" data-id="<?php echo ($big_menu["id"]); ?>" data-width="<?php echo ($big_menu["width"]); ?>" data-height="<?php echo ($big_menu["height"]); ?>"><em><?php echo ($big_menu["title"]); ?></em></a>　<?php endif; ?>
        <?php if(!empty($sub_menu)): if(is_array($sub_menu)): $key = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key; if($key != 1): ?><span>|</span><?php endif; ?>
        <a href="<?php echo U($val['module_name'].'/'.$val['action_name'],array('menuid'=>$menuid)); echo ($val["data"]); ?>" class="<?php echo ($val["class"]); ?>"><em><?php echo L($val['name']);?></em></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
</div><?php endif; ?>
<div class="subnav">
    <div class="content_menu ib_a blue line_x">
        <a href="<?php echo U('collect_alimama/index',array('menuid'=>$menuid));?>"><em><< 重新搜索</em></a>
        <span>|</span>
        <em class="red">淘宝只提供搜索数据前10页，访问大于10页内容系统会自动跳转到第1页</em>
    </div>
</div>
<!--阿里妈妈筛选采集-->
<div class="pad_lr_10" >
    <div class="J_tablelist table_list">
        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <th width="40"><input type="checkbox" name="checkall" class="J_checkall"></th>
                <th align="left"><?php echo L('tbk_item_info');?></th>
                <th align="right"><?php echo L('tbk_item_price');?></th>
                <th align="right"><?php echo L('tbk_item_commission');?></th>
                <th align="right"><?php echo L('tbk_item_commission_rate');?></th>
                <th align="right"><?php echo L('tbk_item_commission_num');?></th>
                <th align="right"><?php echo L('tbk_item_commission_volume');?></th>
                <th align="right"><?php echo L('tbk_item_volume');?></th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td align="center"><input type="checkbox" class="J_checkitem" value="<?php echo ($val["num_iid"]); ?>"></td>
                <td>
                    <div class="fl img_border mr10"><img src="<?php echo ($val["pic_url"]); ?>_100x100.jpg" width="60" height="60" /></div>
                    <div>
                        <a href="<?php echo ($val["click_url"]); ?>" target="_blank"><?php echo ($val["title"]); ?></a><br/>
                        <?php echo L('taobao_shop');?>：<a href="<?php echo ($val["shop_click_url"]); ?>" target="_blank"><?php echo ($val["nick"]); ?></a>
                    </div>
                </td>
                <td align="right"><?php echo ($val["price"]); echo L('price_unit');?></td>
                <td align="right"><?php echo ($val["commission"]); echo L('price_unit');?></td>
                <td align="right"><?php echo ($val['commission_rate']/100); ?>%</td>
                <td align="right"><?php echo ($val["commission_num"]); echo L('item_unit');?></td>
                <td align="right"><?php echo ($val["commission_volume"]); echo L('price_unit');?></td>
                <td align="right"><?php echo ($val["volume"]); echo L('item_unit');?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <div class="btn_wrap_fixed">
        <label class="select_all pad_lr_10"><input type="checkbox" name="checkall" class="J_checkall"><?php echo L('select_all');?>/<?php echo L('cancel');?></label>
        <input type="button" class="btn btn_submit" data-tdtype="batch_action" data-acttype="ajax_form" data-uri="<?php echo U('collect_alimama/publish');?>" data-name="id" data-id="publish" data-title="<?php echo L('publish');?>" data-width="450" value="<?php echo L('publish');?>" />
        <div id="pages"><?php echo ($page); ?></div>
    </div>
</div>
<script src="__STATIC__/js/jquery/jquery.js"></script>
<script src="__STATIC__/js/jquery/plugins/jquery.tools.min.js"></script>
<script src="__STATIC__/js/jquery/plugins/formvalidator.js"></script>
<script src="__STATIC__/js/pinphp.js"></script>
<script src="__STATIC__/js/admin.js"></script>

<script>
//初始化弹窗
(function (d) {
    d['okValue'] = lang.dialog_ok;
    d['cancelValue'] = lang.dialog_cancel;
    d['title'] = lang.dialog_title;
})($.dialog.defaults);
</script>

<?php if(isset($list_table)): ?><script src="__STATIC__/js/jquery/plugins/listTable.js"></script>
<script>
$(function(){
	$('.J_tablelist').listTable();
});
</script><?php endif; ?>
</body>
</html>