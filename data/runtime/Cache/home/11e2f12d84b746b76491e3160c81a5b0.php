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
<link rel="stylesheet" type="text/css" href="__STATIC__/css/default/index.css" />
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
    <div class="focusbox clearfix">
        <div class="user_act fr">
            <?php if(!empty($visitor)): ?><div class="user_info">
                <a class="avatar" href="<?php echo U('space/index');?>" target="_blank"><img class="r3" src="<?php echo avatar($visitor['id'], 48);?>" alt="<?php echo ($visitor["username"]); ?>"></a>
                <div class="user_name">
                    <a href="<?php echo U('space/index');?>" target="_blank"><?php echo ($visitor["username"]); ?></a>
                </div>
                <p class="feed_link">
                    <?php echo L('wellcome_back'); echo C('pin_site_name');?>，<?php echo L('go');?><a href="<?php echo U('space/me');?>" target="_blank"><?php echo L('see_friends_feed');?></a>吧。
                </p>
            </div>
            <?php else: ?>    
            <div class="user_login"> 
                <a href="<?php echo U('user/register');?>" class="register_btn"><?php echo L('register_now');?></a>
                <?php if(is_array($oauth_list)): $i = 0; $__LIST__ = $oauth_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('oauth/index', array('mod'=>$val['code']));?>" class="oauth_btn"><img src="__STATIC__/images/oauth/<?php echo ($val["code"]); ?>/icon.png"></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div><?php endif; ?>
            <?php echo R('advert/index', array(2), 'Widget');?>
            <div class="applink" > 
                <div class="fl" ><?php echo R('advert/index', array(4), 'Widget');?></div> 
                <div class="fr" ><?php echo R('advert/index', array(5), 'Widget');?></div> 
            </div>      
        </div>
        
    </div>
    <!--专辑-->
    <div class="index_piece">
    
        <div class="piece_head clearfix">
            <h3 class="album_title"><a href="<?php echo U('album/index');?>"><?php echo L('wonderful_album');?></a></h3>
            <ul class="fl">
                <li><a href="<?php echo U('album/index', array('sort'=>'hot'));?>"><?php echo L('sort_hot');?></a></li>
                <li><a href="<?php echo U('album/index', array('sort'=>'new'));?>"><?php echo L('sort_new');?></a></li>
                <li>|</li>
                <?php $tag_album_class = new albumTag;$data = $tag_album_class->cate(array('type'=>'cate','num'=>'10','cache'=>'0','return'=>'data',)); if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('album/index', array('cid'=>$val['id']));?>" target="_blank"><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="view_all fr"><a href="<?php echo U('album/index');?>"><?php echo L('show_all');?>...</a></div>
        </div>
        
        <div class="piece_body">
            <ul class="index_album_list clearfix">
                <?php $data = S('02ddb2a814c286313b3482f5e63c0101');if (false === $data) { $tag_album_class = new albumTag;$data = $tag_album_class->lists(array('cache'=>'3600','num'=>'3','return'=>'data','type'=>'lists','where'=>'is_index=1',));S('02ddb2a814c286313b3482f5e63c0101', $data, 3600); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$album): $mod = ($i % 2 );++$i;?><li class="J_album_item index_album">
                    <ul>
                        <?php $__FOR_START_1888609666__=0;$__FOR_END_1888609666__=C('pin_album_cover_items');for($i=$__FOR_START_1888609666__;$i < $__FOR_END_1888609666__;$i+=1){ ?><li class="<?php if($i == 0): ?>big<?php else: ?>small<?php endif; ?>">
                            <?php if(isset($album['cover'][$i])): if($i == 0): ?><img src="<?php echo attach(get_thumb($album['cover'][$i]['img'], '_m'), 'item');?>" />
                            <?php else: ?>
                            <img src="<?php echo attach(get_thumb($album['cover'][$i]['img'], '_s'), 'item');?>" /><?php endif; endif; ?>
                        </li><?php } ?>
                    </ul>
                    <div class="album_author clearfix">
                        <a href="<?php echo U('space/index', array('uid'=>$album['uid']));?>" target="_blank"><img src="<?php echo avatar($album['uid'], '24');?>" class="J_card fl" alt="<?php echo ($album["uname"]); ?>" data-uid="<?php echo ($album["uid"]); ?>" /></a>
                        <a class="J_card author_name fl" href="<?php echo U('space/index', array('uid'=>$album['uid']));?>" target="_blank" data-uid="<?php echo ($album["uid"]); ?>"><?php echo ($album["uname"]); ?></a>
                        <p class="num">
                            <a title="<?php echo ($album["items"]); ?>" href="<?php echo U('album/detail', array('id'=>$album['id']));?>" class="pic_num fr" target="_blank"><?php echo ($album["items"]); ?></a>
                            <a title="<?php echo ($album["likes"]); ?>" href="<?php echo U('album/detail', array('id'=>$album['id']));?>" class="fav_num fr" target="_blank"><?php echo ($album["likes"]); ?></a>
                        </p>
                    </div>
                    <h4><a title="<?php echo ($album["title"]); ?>" href="<?php echo U('album/detail', array('id'=>$album['id']));?>" target="_blank"><?php echo ($album["title"]); ?></a></h4>
                    <p class="album_desc"><?php echo ($album["intro"]); ?></p>
                    <b class="J_mask mask"></b>
                    <a class="album_link" href="<?php echo U('album/detail', array('id'=>$album['id']));?>" target="_blank"></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!--首页分类-->
    <?php if(is_array($index_cate_list)): $i = 0; $__LIST__ = $index_cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><div class="index_piece">
        <div class="piece_head clearfix">
            <h3 class="cate_title"><a href="<?php echo U('book/cate', array('cid'=>$cate['id']));?>" title="<?php echo ($cate["name"]); ?>"><?php echo ($cate["name"]); ?></a></h3>
            <ul class="fl">
                <li><a href="<?php echo U('book/cate', array('cid'=>$cate['id'], 'sort'=>'hot'));?>"><?php echo L('sort_hot');?></a></li>
                <li><a href="<?php echo U('book/cate', array('cid'=>$cate['id'], 'sort'=>'new'));?>"><?php echo L('sort_new');?></a></li>
                <li>|</li>
                <?php if(is_array($cate['sub'])): $i = 0; $__LIST__ = $cate['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subcate): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('book/cate', array('cid'=>$subcate['id']));?>"><?php echo ($subcate["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="view_all fr"><a href="<?php echo U('book/cate', array('cid'=>$cate['id']));?>"><?php echo L('show_all');?>...</a></div>
        </div>
        <div class="piece_body">
            <div class="index_cate">
                <ul class="clearfix">
                    <?php if(is_array($cate['index_sub'])): $i = 0; $__LIST__ = $cate['index_sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index_subcate): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('book/cate', array('cid'=>$index_subcate['id']));?>" title="<?php echo ($index_subcate["name"]); ?>"><img src="<?php echo attach($index_subcate['img'], 'item_cate');?>" alt="<?php echo ($index_subcate["name"]); ?>"><span><?php echo ($index_subcate["name"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if(C('pin_index_wall')): ?><!--发现-->
    <div class="wel_find_more">
        <h2><a href="<?php echo U('book/index');?>"><?php echo L('find');?></a></h2>
        <?php if(is_array($hot_tags)): $i = 0; $__LIST__ = $hot_tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="<?php echo U('book/index',array('tag'=>$tag));?>" target="_blank"><?php echo ($tag); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        <a href="<?php echo U('book/index');?>"><?php echo L('more');?>...</a>
    </div>
    <div class="wall_wrap clearfix">
        <div id="J_waterfall" class="wall_container clearfix" data-uri="__ROOT__/?m=book&a=index_ajax&sort=hot">
            <?php if(is_array($item_list)): $i = 0; $__LIST__ = $item_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="J_item wall_item">

        <?php if(isset($like_manage)): ?><a href="javascript:;" class="J_unlike del_item" title="<?php echo L('delete');?>" data-id="<?php echo ($item["id"]); ?>"></a><?php endif; ?>

        <?php if(isset($album_manage)): if($album['uid'] == $visitor['id']): ?><a href="javascript:;" class="J_delitem del_item" title="<?php echo L('delete');?>" data-id="<?php echo ($item["id"]); ?>" data-aid="<?php echo ($album["id"]); ?>"></a><?php endif; ?>
        <?php else: ?>
        <?php if($item['uid'] == $visitor['id']): ?><a href="javascript:;" class="J_delitem del_item" title="<?php echo L('delete');?>" data-id="<?php echo ($item["id"]); ?>"></a><?php endif; endif; ?>

        <!--图片-->
        <ul class="pic">
            <li>
                <a href="<?php echo U('item/index', array('id'=>$item['id']));?>" title="<?php echo ($item["title"]); ?>" target="_blank"><img alt="<?php echo ($item["title"]); ?>" class="J_img J_decode_img" data-uri="<?php echo base64_encode(attach(get_thumb($item['img'], '_m'), 'item'));?>"></a>
                <span class="p">¥<?php echo ($item["price"]); ?></span>
                <a href="javascript:;" class="J_joinalbum addalbum_btn" data-id="<?php echo ($item["id"]); ?>"></a>
            </li>
        </ul>
        <!--操作-->
        <div class="favorite"> 
            <a href="javascript:;" class="J_likeitem like" data-id="<?php echo ($item["id"]); ?>" <?php if(isset($album)): ?>data-aid="<?php echo ($album["id"]); ?>"<?php endif; ?>><?php echo L('like');?></a>
            <div class="J_like_n like_n <?php if($item['likes'] == 0): ?>hide<?php endif; ?>"><a href="<?php echo U('item/index', array('id'=>$item['id']));?>" target="_blank"><?php echo ($item["likes"]); ?></a><i></i></div>
            
            <?php if($item['comments'] > 0): ?><span class="creply_n">(<a href="<?php echo U('item/index', array('id'=>$item['id']));?>" target="_blank"><?php echo ($item["comments"]); ?></a>)</span><?php endif; ?>
            <a class="creply" href="<?php echo U('item/index', array('id'=>$item['id']));?>" target="_blank"><?php echo L('comment');?></a> 
        </div>
        <!--作者-->
        <?php if(!empty($item['uname'])): ?><div class="author clearfix">
            <a href="<?php echo U('space/index', array('uid'=>$item['uid']));?>" target="_blank">
                <img class="J_card avt fl r3" src="<?php echo avatar($item['uid'], '32');?>" data-uid="<?php echo ($item["uid"]); ?>" />
            </a>
            <div>
                <a href="<?php echo U('space/index', array('uid'=>$item['uid']));?>" class="J_card clr6 bold" target="_blank" data-uid="<?php echo ($item["uid"]); ?>"><?php echo ($item["uname"]); ?></a><br>
            </div>
        </div><?php endif; ?>
        <!--说明-->
        <p class="intro clr6"><?php echo ($item["intro"]); ?></p>
        <!--评论-->
        <?php if(!empty($item['comment_list'])): ?><ul class="rep_list">
            <?php $__FOR_START_231665364__=0;$__FOR_END_231665364__=C('pin_item_cover_comments');for($i=$__FOR_START_231665364__;$i < $__FOR_END_231665364__;$i+=1){ if(!empty($item['comment_list'][$i])): ?><li class="rep_f">
                <a href="<?php echo U('space/index', array('uid'=>$item['comment_list'][$i]['uid']));?>" target="_blank">
                    <img src="<?php echo avatar($item['comment_list'][$i]['uid'], 24);?>" class="J_card avt fl r3" alt="<?php echo ($item['comment_list'][$i]['uname']); ?>" data-uid="<?php echo ($item['comment_list'][$i]['uid']); ?>">
                </a>
                <p class="rep_content"><a href="<?php echo U('space/index', array('uid'=>$item['comment_list'][$i]['uid']));?>" class="J_card n" target="_blank" data-uid="<?php echo ($item['comment_list'][$i]['uid']); ?>"><?php echo ($item['comment_list'][$i]['uname']); ?></a>  <?php echo ($item['comment_list'][$i]['info']); ?></p>
            </li><?php endif; } ?>
        </ul><?php endif; ?>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <?php if(isset($show_load)): ?><div id="J_wall_loading" class="wall_loading tc gray"><span><?php echo L('loading');?></span></div><?php endif; ?>
        
        <?php if(isset($page_bar)): ?><div id="J_wall_page" class="wall_page">
            <div class="page_bar"><?php echo ($page_bar); ?></div>
        </div><?php endif; ?>
    </div><?php endif; ?>
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

<script>
$(function(){
    $('#J_focus').tabs('#J_focus_img > li', {rotate: true}).slideshow({autoplay:true});
});
</script>
</body>
</html>