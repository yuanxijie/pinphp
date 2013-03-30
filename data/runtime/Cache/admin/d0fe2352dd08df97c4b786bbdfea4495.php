<?php if (!defined('THINK_PATH')) exit();?><!--移动栏目-->
<div class="dialog_content pad_10">
	<form id="info_form" action="<?php echo U('collect_alimama/batch_publish');?>" method="post">
	<table width="100%" class="table_form">
		<tr> 
			<th width="80"><?php echo L('publish_item_cate');?> :</th>
			<td><select class="J_cate_select mr10" data-pid="0" data-uri="<?php echo U('item_cate/ajax_getchilds', array('type'=>0));?>"></select></td>
		</tr>
		<tr>
			<th><?php echo L('auto_user');?> :</th>
			<td>
				<select name="auid" id="J_auid">
					<option value="0">--<?php echo L('please_select');?>--</option>
					<?php if(is_array($auto_user)): $i = 0; $__LIST__ = $auto_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th><?php echo L('import_page_num');?> :</th>
			<td><input type="text" name="page_num" size="4" class="input-text" value="10" /></td>
		</tr>
        <tr>
            <th><?php echo L('brand_name');?>：</th>
            <td>
                <select name="brand_id">
                    <option value="0">--<?php echo L('please_select');?>--</option>
                    <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
	</table>
	<input type="hidden" name="cate_id" id="J_cate_id" value="0" />
	<input type="hidden" id="J_form_data" name="form_data" value="" />
	</form>
</div>
<script>
$(function(){
	var batch_publish_do_url = "<?php echo U('collect_alimama/batch_publish_do');?>";
	$('#J_form_data').val($('#J_alimama_form').serialize());
	$('#info_form').ajaxForm({beforeSubmit:showloading, success:complate, dataType:'json'});
	function showloading(){
		if($('#J_cate_id').val()=='0'){
			$.pinphp.tip({content:lang.please_select+lang.publish_item_cate, icon:'alert'});
			return false;
		}
		if($('#J_auid').val()=='0'){
			$.pinphp.tip({content:lang.please_select+lang.auto_user, icon:'alert'});
			return false;
		}
	}
	function complate(result){
		if(result.status == 1){
			//开始采集
			publish_page();
		} else {
			$.pinphp.tip({content:result.msg, icon:'alert'});
		}
	}
	var p = 1;
	function publish_page(){
		$('.dialog_content').html('<span class="blue">'+lang.publish_page_left+'<em class="red"> [ '+p+' ] </em>'+lang.publish_page_right+'</span>');
		$.getJSON(batch_publish_do_url, {p:p}, function(result){
			if(result.status == 1){
				p++;
				publish_page(p);
			}else{
				$.dialog.get('batch_publish').close();
				$.pinphp.tip({content:result.msg});
			}
		});
	}
	$('.J_cate_select').cate_select({field:'J_cate_id'});
});
</script>