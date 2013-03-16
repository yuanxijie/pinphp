<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo ($page_seo["title"]); ?> - Powered by PinPHP</title>
<meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" />
<meta name="description" content="<?php echo ($page_seo["description"]); ?>" />

<link rel="stylesheet" type="text/css" href="__STATIC__/css/default/base.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/default/style.css" />
<?php if(is_array($csses)): $i = 0; $__LIST__ = $csses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i; if(substr($f, 0,4) == 'http'): ?><link href="<?php echo ($f); ?>" type="text/css" rel="stylesheet">
    <?php else: ?>
        <link rel="stylesheet" type="text/css" href="__STATIC__/css/default/<?php echo ($f); ?>" /><?php endif; endforeach; endif; else: echo "" ;endif; ?>
<script src="__STATIC__/js/jquery/jquery.js"></script>
<?php if(is_array($jses)): $i = 0; $__LIST__ = $jses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$j): $mod = ($i % 2 );++$i; if(substr($j, 0,4) == 'http'): ?><script src="<?php echo ($j); ?>" type="text/javascript"></script>
    <?php else: ?>
        <script src="__STATIC__/js/<?php echo ($j); ?>"></script><?php endif; endforeach; endif; else: echo "" ;endif; ?>
<link rel="stylesheet" type="text/css" href="__STATIC__/css/default/album.css" />
</head>
<body>
<!--头部开始-->
<div class="header_wrap pt10">
    <div id="J_m_head" class="m_head clearfix">
        <div class="head_logo fl"><a href="__ROOT__/" class="logo_b fl" title="<?php echo C('pin_site_name');?>"><?php echo C('pin_site_name');?></a></div>
        <div class="head_user fr">
            <?php if(!empty($visitor)): ?><ul class="head_user_op">
                <li class="mr10"> 
                    <a class="J_shareitem_btn share_btn" href="javascript:;" title="<?php echo L('share');?>"><?php echo L('share');?></a>
                </li>
                <li class="J_down_menu_box mb_info pos_r">
                    <a href="<?php echo U('space/index', array('uid'=>$visitor['id']));?>" class="mb_name">
                        <img class="mb_avt r3" src="<?php echo avatar($visitor['id'], 24);?>">
                        <?php echo ($visitor["username"]); ?>
                    </a>
                    <ul class="J_down_menu s_m pos_a">
                        <li><a href="<?php echo U('space/index');?>"><?php echo L('cover');?></a></li>
                        <li><a href="<?php echo U('user/index');?>"><?php echo L('personal_settings');?></a></li>
                        <li><a href="<?php echo U('user/bind');?>"><?php echo L('user_bind');?></a></li>
                        <li><a href="<?php echo U('user/logout');?>"><?php echo L('logout');?></a></li>
                    </ul>
                </li>
                <li><a class="libg feed" href="<?php echo U('space/me');?>"><?php echo L('feed');?></a></li>
                <li><a class="libg album" href="<?php echo U('space/album');?>"><?php echo L('album');?></a></li>
                <li><a class="libg like" href="<?php echo U('space/like');?>"><?php echo L('like');?></a></li>
                <li class="J_down_menu_box my_shotcuts pos_r">
                    <a class="libg msg" href="javascript:;"><?php echo L('message');?><span id="J_msgtip"></span></a>
                    <ul class="J_down_menu s_m n_m pos_a">
                        <li><a href="<?php echo U('space/atme');?>"><?php echo L('talk');?><span id="J_atme"></span></a></li>
                        <li><a href="<?php echo U('message/index');?>"><?php echo L('my_msg');?><span id="J_msg"></span></a></li>
                        <li><a href="<?php echo U('message/system');?>"><?php echo L('system_msg');?><span id="J_system"></span></a></li>
                        <li><a href="<?php echo U('space/fans');?>"><?php echo L('my_fans');?><span id="J_fans"></span></a></li>
                    </ul>
                </li>
            </ul>
            <?php else: ?>
            <ul class="login_mod">
                <li class="local fl">
                    <a href="<?php echo U('user/register');?>"><?php echo L('register');?></a>
                    <a href="<?php echo U('user/login');?>"><?php echo L('login');?></a>
                </li>
                <li class="other_login fl">
                    <?php if(is_array($oauth_list)): $i = 0; $__LIST__ = $oauth_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('oauth/index', array('mod'=>$val['code']));?>" class="login_bg weibo_login"><img src="__STATIC__/images/oauth/<?php echo ($val["code"]); ?>/icon.png" /><?php echo ($val["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
            </ul><?php endif; ?>
        </div>
    </div>
    <div id="J_m_nav" class="clearfix">
        <ul class="nav_list fl">
            <li <?php if($nav_curr == 'index'): ?>class="current"<?php endif; ?>><a href="__ROOT__/"><?php echo L('index_page');?></a></li>

            <?php $tag_nav_class = new navTag;$data = $tag_nav_class->lists(array('type'=>'lists','style'=>'main','cache'=>'0','return'=>'data',)); if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="split <?php if($nav_curr == $val['alias']): ?>current<?php endif; ?>"><a href="<?php echo ($val["link"]); ?>" <?php if($val["target"] == 1): ?>target="_blank"<?php endif; ?>><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <li class="top_search">
                <form action="__ROOT__/" method="get" target="_blank">
                <input type="hidden" name="m" value="search">
                <input type="text" autocomplete="off" def-val="<?php echo C('pin_default_keyword');?>" value="<?php echo C('pin_default_keyword');?>" class="ts_txt fl" name="q">
                <input type="submit" class="ts_btn" value="<?php echo L('search');?>">
                </form>
            </li>
        </ul>
    </div>
</div>

<div class="main_wrap">
    <div class="album_top">
        <div class="album_daren fl">
            <h3><?php echo L('album_daren');?></h3>
            <ul>
                <?php $data = S('10a3089cb02d3505c2f0beb21ed55a93');if (false === $data) { $tag_user_class = new userTag;$data = $tag_user_class->lists(array('cache'=>'3600','field'=>'id,username,albums,fans','num'=>'4','return'=>'data','type'=>'lists','where'=>'daren=1',));S('10a3089cb02d3505c2f0beb21ed55a93', $data, 3600); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li> 
                    <a href="<?php echo U('space/index', array('uid'=>$val['id']));?>" target="_blank"><img alt="<?php echo ($val["username"]); ?>" src="<?php echo avatar($val['id']);?>" class="J_card fl r3" data-uid="<?php echo ($val["id"]); ?>"></a>
                    <div class="album_daren_info">
                        <p class="user_name"><a href="<?php echo U('space/index', array('uid'=>$val['id']));?>" class="J_card uname" data-uid="<?php echo ($val["id"]); ?>" target="_balnk"><?php echo ($val["username"]); ?></a></p>
                        <p class="user_info">
                            <span><?php echo L('album_num');?>:</span>
                            <a href="<?php echo U('space/album', array('uid'=>$val['id']));?>" target="_blank"><?php echo ($val["albums"]); ?></a>&nbsp;
                            <span><?php echo L('fans_num');?>:</span>
                            <a href="<?php echo U('space/fans', array('uid'=>$val['id']));?>" target="_blank"><?php echo ($val["fans"]); ?></a>
                        </p>
                  </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="album_add fl">
            <a href="javascript:;" title="<?php echo L('create_album');?>" class="J_createalbum_btn reco_album_link r5"><?php echo L('create_album');?></a>
        </div>
    </div>

    <div class="cate_sort clearfix">
        <h3 class="fl"><?php echo (($cate_info["name"])?($cate_info["name"]):L('album')); ?></h3>
        <span class="fl">
            <em class="fl"><?php echo L('sort_order');?>：</em>
            <ul class="fl">
                <li><a <?php if($sort == 'hot'): ?>class="current"<?php endif; ?> href="<?php echo U('album/index', array('sort'=>'hot'));?>"><?php echo L('sort_hot');?></a></li>
                <li><i>|</i></li>
                <li><a <?php if($sort == 'new'): ?>class="current"<?php endif; ?> href="<?php echo U('album/index', array('sort'=>'new'));?>"><?php echo L('sort_new');?></a></li>
            </ul>
        </span> 
    </div>
    <div class="album_wrap clearfix">
        <ul class="album_list clearfix">
            <li class="album_tag fl">
                <h3><?php echo L('all_cate');?>：</h3>
                <div class="tags clearfix">
                    <a href="<?php echo U('album/index');?>" title="<?php echo L('all');?>" <?php if($cate_info["id"] == ''): ?>class="current"<?php endif; ?>><?php echo L('all');?></a>
                    <?php $tag_album_class = new albumTag;$cate_list = $tag_album_class->cate(array('type'=>'cate','return'=>'cate_list','cache'=>'0',)); if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><a href="<?php echo U('album/index',array('cid'=>$cate['id']));?>" title="<?php echo ($cate["name"]); ?>" <?php if($cate_info["id"] == $cate['id']): ?>class="current"<?php endif; ?>><?php echo ($cate["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </li>
            <?php if(is_array($album_list)): $i = 0; $__LIST__ = $album_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$album): $mod = ($i % 2 );++$i;?><li class="J_album_item album_item">
                <div class="album_author">
                    <a target="_blank" href="<?php echo U('space/index', array('uid'=>$album['uid']));?>">
                    <img src="<?php echo avatar($album['uid'], '32');?>" class="J_card avt fl " data-uid="<?php echo ($album["uid"]); ?>" alt="<?php echo ($album["uname"]); ?>">
                    </a>
                    <div class="album_info">
                        <p><a title="<?php echo ($album["title"]); ?>" href="<?php echo U('album/detail', array('id'=>$album['id']));?>" class="album_title" target="_blank"><?php echo ($album["title"]); ?></a></p>
                        <p class="u_link"><a href="<?php echo U('space/index', array('uid'=>$album['uid']));?>" class="J_card n" data-uid="<?php echo ($album["uid"]); ?>" target="_blank"><?php echo ($album["uname"]); ?></a></p>
                    </div>
                </div>
                <ul>
                    <?php $__FOR_START_1519664007__=0;$__FOR_END_1519664007__=C('pin_album_cover_items');for($i=$__FOR_START_1519664007__;$i < $__FOR_END_1519664007__;$i+=1){ ?><li class="<?php if($i == 0): ?>big<?php elseif($i == 1): ?>left small<?php else: ?>small<?php endif; ?>">
                        <?php if(isset($album['cover'][$i])): if($i == 0): ?><img class="J_decode_img" data-uri="<?php echo base64_encode(attach(get_thumb($album['cover'][$i]['img'], '_m'), 'item'));?>" />
                        <?php else: ?>
                        <img class="J_decode_img" data-uri="<?php echo base64_encode(attach(get_thumb($album['cover'][$i]['img'], '_s'), 'item'));?>" /><?php endif; endif; ?>
                    </li><?php } ?>
                </ul>
                <a href="<?php echo U('album/detail', array('id'=>$album['id']));?>" class="album_link" title="<?php echo ($album["uname"]); ?>" target="_blank"></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="page_bar"><?php echo ($page_bar); ?></div>
</div>
<div class="footer_wrap rt10">
    <a href="__APP__" class="foot_logo"></a>
    <div class="foot_links clearfix">
        <dl class="foot_nav fl">
            <dt><?php echo L('site_nav');?></dt>
            <?php $tag_nav_class = new navTag;$data = $tag_nav_class->lists(array('type'=>'lists','style'=>'bottom','cache'=>'0','return'=>'data',)); if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo ($val["link"]); ?>" <?php if($val["target"] == 1): ?>target="_blank"<?php endif; ?>><?php echo ($val["name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
        <dl class="aboutus fl">
            <dt><?php echo L('aboutus');?></dt>
            <?php $tag_article_class = new articleTag;$data = $tag_article_class->cate(array('type'=>'cate','cateid'=>'1','cache'=>'0','return'=>'data',)); if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('aboutus/index', array('id'=>$val['id']));?>" target="_blank"><?php echo ($val["name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
        <dl class="flinks fr">
            <dt><?php echo L('flink');?></dt>
            <?php $data = S('36cd2015820ec8da2a165ad5dfc0c797');if (false === $data) { $tag_flink_class = new flinkTag;$data = $tag_flink_class->lists(array('cache'=>'3600','num'=>'5','return'=>'data','type'=>'lists',));S('36cd2015820ec8da2a165ad5dfc0c797', $data, 3600); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo ($val["url"]); ?>"  rel="nofollow" target="_blank"><?php echo ($val["name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
            <dd><a href="<?php echo U('aboutus/flink');?>" class="more" target="_blank"><?php echo L('more');?>...</a></dd>
        </dl>
    </div>
    <p class="pt20"> &copy;Copyright 2013 <a href="__ROOT__/" class="tdu clr6" target="_blank"><?php echo C('pin_site_name');?></a> (<a href="http://www.miibeian.gov.cn" class="tdu clr6" target="_blank"><?php echo C('pin_site_icp');?></a>)<?php echo C('pin_statistics_code');?></p>
</div>
<div id="J_returntop" class="return_top"></div>

<script>
var PINER = {
    root: "__ROOT__",
    uid: "<?php echo $visitor['id'];?>", 
    async_sendmail: "<?php echo $async_sendmail;?>",
    config: {
        wall_distance: "<?php echo C('pin_wall_distance');?>",
        wall_spage_max: "<?php echo C('pin_wall_spage_max');?>"
    },
    //URL
    url: {}
};
//语言项目
var lang = {};
<?php $_result=L('js_lang');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>lang.<?php echo ($key); ?> = "<?php echo ($val); ?>";<?php endforeach; endif; else: echo "" ;endif; ?>
</script>
<?php $tag_load_class = new loadTag;$data = $tag_load_class->js(array('type'=>'js','href'=>'__STATIC__/js/jquery/plugins/jquery.tools.min.js,__STATIC__/js/jquery/plugins/jquery.masonry.js,__STATIC__/js/jquery/plugins/formvalidator.js,__STATIC__/js/fileuploader.js,__STATIC__/js/pinphp.js,__STATIC__/js/front.js,__STATIC__/js/dialog.js,__STATIC__/js/wall.js,__STATIC__/js/item.js,__STATIC__/js/user.js,__STATIC__/js/album.js','cache'=>'0','return'=>'data',));?>

</body>
</html>