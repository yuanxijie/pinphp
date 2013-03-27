<?php if (!defined('THINK_PATH')) exit();?><div class="dialog_login clearfix">
    <form id="J_dlogin_form" action="<?php echo U('user/login');?>" method="post">
    <p id="J_login_fail" class="login_fail"><?php echo L('username_require');?></p>
    <div class="login_form">
        <dl>
            <dd><?php echo L('username');?>：</dd>
            <dt><input type="text" class="J_username text" name="username"></dt>
            <dd><?php echo L('password');?>：</dd>
            <dt><input type="password" class="J_password text" name="password"></dt>
            <dd>&nbsp;</dd>
            <dt><label><input type="checkbox" checked="" class="checkbox" name="remember"><?php echo L('rememberme');?></label></dt>
            <dd>&nbsp;</dd>
            <dt>
                <input type="submit" class="btn login_btn" value="<?php echo L('login');?>"> 
                <a href="<?php echo U('findpwd/index');?>"><?php echo L('forget_password');?></a>
            </dt>
        </dl>
    </div>
    </form>
    <div class="reg_or_oauth">
        <span><?php echo L('other_login_model');?>：</span>
        <ul class="oauth_list mb20">
            <?php if(is_array($oauth_list)): $i = 0; $__LIST__ = $oauth_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('oauth/index', array('mod'=>$val['code']));?>" class="o_icon"><img src="__STATIC__/images/oauth/<?php echo ($val["code"]); ?>/icon.png" /><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <a style="text-decoration:underline;" href="<?php echo U('user/register');?>" class="ft14 pink"><?php echo L('relaxed_register'); echo C('pin_site_name'); echo L('account');?></a>
    </div>
</div>