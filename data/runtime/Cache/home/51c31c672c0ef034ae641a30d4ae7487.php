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
<link rel="stylesheet" type="text/css" href="__STATIC__/css/default/item.css" />
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
<!--商品详细-->
<div class="main_wrap pt10" style="_padding-left:0;">
    <div class="itembox clearfix">
        <div class="itembox_l fl">
            <div class="note_box clearfix">
                <div id="J_item_gallery" class="show_body">
                    <div class="J_item img_show">
                        <a target="_blank" href="__ROOT__/?m=item&a=tgo&to=<?php echo base64_encode($item['url']);?>">
                            <div id="J_img_zoom" class="img_zoom"><img alt="<?php echo ($item["title"]); ?>" class="J_decode_img" data-uri="<?php echo base64_encode(attach(get_thumb($img_list[0]['url'], '_b'), 'item'));?>" jqimg="<?php echo attach($img_list[0]['url'], 'item');?>"></div>
                        </a>
                        <a href="javascript:;" class="J_joinalbum addalbum_btn" data-id="<?php echo ($item["id"]); ?>"></a>
                    </div>
                    <div class="img_list clearfix">
                        <ul id="J_img_list" class="fl">
                            <?php if(is_array($img_list)): $i = 0; $__LIST__ = $img_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><li data-url="<?php echo attach(get_thumb($img['url'], '_b'), 'item');?>" <?php if($i == 1): ?>class="active"<?php endif; ?>><img alt="<?php echo ($item["title"]); ?>" class="J_decode_img" data-uri="<?php echo base64_encode(attach(get_thumb($img['url'], '_s'), 'item'));?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <?php if(!empty($maylike_list)): ?><h3 class="may_fav_title"><?php echo L('guess_you_like_title');?></h3>
                <?php if(is_array($maylike_list)): $i = 0; $__LIST__ = $maylike_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mval): $mod = ($i % 2 );++$i;?><div class="slide_show">
                    <h3><a href="<?php echo U('book/index', array('tag'=>$mval['name']));?>" class="more" target="_blank"><?php echo L('show_more');?>...</a><?php echo ($mval["name"]); ?></h3>
                    <ul class="clearfix">
                        <?php if(is_array($mval['list'])): $i = 0; $__LIST__ = $mval['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mitem): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('item/index', array('id'=>$mitem['id']));?>" class="show_img" target="_blank">
                            <img class="J_decode_img" data-uri="<?php echo base64_encode(attach(get_thumb($mitem['img'], '_m'), 'item'));?>" alt="<?php echo ($mitem["title"]); ?>">
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
        </div>
	
        <div class="itembox_r fr">
            <div class="item_link mb20">
                <img src="<?php echo attach($orig['img'], 'item_orig');?>">
                <a href="__ROOT__/?m=item&a=tgo&to=<?php echo base64_encode($item['url']);?>" class="shop_link" rel="nofollow" title="<?php echo ($item["title"]); ?>" target="_blank"><?php echo ($item["title"]); ?></a>
                <a href="__ROOT__/?m=item&a=tgo&to=<?php echo base64_encode($item['url']);?>" class="buy_link" rel="nofollow" target="_blank"><b>¥<?php echo ($item["price"]); ?> <?php echo sprintf(L('go_to_buy'), $orig['name']);?></b><i></i></a>
            </div>
            <?php if(!empty($item['tag_list'])): ?><div class="item_tags pt10 clearfix">
                <p>
                    <?php echo L('tag');?>：
                    <?php if(is_array($item['tag_list'])): $i = 0; $__LIST__ = $item['tag_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="<?php echo U('book/index', array('tag'=>urlencode($tag)));?>" target="_blank"><?php echo ($tag); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </p>
            </div><?php endif; ?>
            <div class="shareinfo mb20">
                <div class="shareinfo_u clearfix">
                    <a href="<?php echo U('space/index', array('uid'=>$item['uid']));?>" target="_blank"><img alt="<?php echo ($item["uname"]); ?>" class="J_card fl r3" src="<?php echo avatar($item['uid'], 48);?>" data-uid="<?php echo ($item["uid"]); ?>" /></a>
                    <div class="user_info">
                        <a href="<?php echo U('space/index', array('uid'=>$item['uid']));?>" class="J_card n" data-uid="<?php echo ($item["uid"]); ?>" target="_blank"><?php echo ($item["uname"]); ?></a><br>
                        <p class="saytime"><?php echo (fdate($item["add_time"])); ?></p>
                    </div>
                </div>
                <?php if(!empty($item['intro'])): ?><p class="shareinfo_t"><?php echo ($item["intro"]); ?></p><?php endif; ?>
                <div class="share_box">
                    <div class="favorite fl">
                        <a href="javascript:;" class="J_likeitem like_btn" data-id="<?php echo ($item["id"]); ?>"><?php echo L('like');?></a>
                        <div class="J_like_n like_count fl"><a target="_blank"><?php echo ($item["likes"]); ?></a><i></i></div>
                    </div>
                    <div class="fr mt15">
                        <!-- Baidu Button BEGIN -->
                        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                        <span class="bds_more"></span>
                        <a class="bds_tsina"></a>
                        <a class="bds_qzone"></a>
                        <a class="bds_tqq"></a>
                        <a class="bds_renren"></a>
                        </div>
                        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;mini=1&amp;uid=0" ></script>
                        <script type="text/javascript" id="bdshell_js"></script>
                        <script type="text/javascript">
                        document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
                        </script>
                        <!-- Baidu Button END -->
                    </div>
                </div>
            </div>
            <div id="J_comment_area" class="comment_area"  data-id="<?php echo ($item["id"]); ?>">
                <h3><?php echo L('comment_area');?></h3>
                <div class="comment_publish">
                    <div class="pub_box"><textarea id="J_cmt_content" name="content" class="pub_content" def-val="<?php echo L('item_cmt_def');?>"><?php echo L('item_cmt_def');?></textarea></div>
                    <div class="pub_act"><a href="javascript:;" id="J_cmt_submit" class="submit r3 fr"><?php echo L('ok');?></a></div>
                </div>
                <div class="comment_list">
                    <ul id="J_cmt_list">
                        <?php if(is_array($cmt_list)): $i = 0; $__LIST__ = $cmt_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li> 
                            <a href="<?php echo U('space/index', array('uid'=>$val['uid']));?>" target="_blank"><img src="<?php echo avatar($val['uid'], 48);?>" class="J_card avt" data-uid="<?php echo ($val["uid"]); ?>" /></a>
                            <p><a href="<?php echo U('space/index', array('uid'=>$val['uid']));?>" class="J_card n" data-uid="<?php echo ($val["uid"]); ?>" target="_blank"><?php echo ($val["uname"]); ?></a></p>
                            <p><?php echo ($val["info"]); ?><span>&nbsp;&nbsp;&nbsp;<?php echo (fdate($val["add_time"])); ?></span></p>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div id="J_cmt_page" class="page_bar"><?php echo ($page_bar); ?></div>
                </div>
            </div>
            <?php echo R('advert/index', array(13), 'Widget');?>
        </div>
    </div>
</div>
<script src="__STATIC__/js/jquery/plugins/jquery.jqzoom.js"></script>
<script src="__STATIC__/js/jquery/plugins/jquery.jcarousel.js"></script>
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

<script src="__STATIC__/js/comment.js"></script>
</body>
</html>