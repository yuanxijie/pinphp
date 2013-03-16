<?php if (!defined('THINK_PATH')) exit();?><!--添加友情链接分类-->
<div class="dialog_content">
	<form id="info_form" name="info_form" action="<?php echo u('flink_cate/add');?>" method="post">
	<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
		<tr>
			<th width="80"><?php echo L('flink_cate_name');?> :</th>
			<td><input type="text" name="name" id="name" class="input-text"></td>
		</tr>
		<tr>
			<th><?php echo L('enabled');?> :</th>
			<td>
				<label><input type="radio" name="status" class="radio_style" value="1" checked="checked">&nbsp;<?php echo L('yes');?>&nbsp;&nbsp; </label>
				<label><input type="radio" name="status" class="radio_style" value="0">&nbsp;<?php echo L('no');?>&nbsp;&nbsp; </label>
			</td>
		</tr>
	</table>
	</form>
</div>
<script>
var check_name_url = "<?php echo U('flink_cate/ajax_check_name');?>";
$(function(){
	$.formValidator.initConfig({formid:"info_form",autotip:true});
	$("#name").formValidator({onshow:lang.please_input+lang.flink_cate_name,onfocus:lang.please_input+lang.flink_cate_name}).inputValidator({min:1,onerror:lang.please_input+lang.flink_cate_name}).ajaxValidator({
	    type : "get",
		url : check_name_url,
		datatype : "json",
		async:'false',
		success : function(result){	
            if(result.status == 0){
                return false;
			}else{
                return true;
			}
		},
		onerror : lang.flink_cate_already_exists,
		onwait : lang.connecting_please_wait
	});
	
	$('#info_form').ajaxForm({success:complate,dataType:'json'});
	function complate(result){
		if(result.status == 1){
			$.dialog.get(result.dialog).close();
			$.pinphp.tip({content:result.msg});
			window.location.reload();
		} else {
			$.pinphp.tip({content:result.msg, icon:'alert'});
		}
	}
});
</script>