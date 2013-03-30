<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8" />
<title><?php echo ($page_seo["title"]); ?></title>
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

<div class="main_wrap blog_white">
    <div class="blog_wrap clearfix">
        <div class="clearfix masonry" id="J_waterfall" style="position: relative; height: 161px;">
            <div class="J_item wall_tag masonry-brick" style="position: absolute; top: 0px; left: 0px; opacity: 1;">
                <h3>日志分类：</h3>

                <div class="tags clearfix">
                    <a class="current" href="/index.php?m=article&amp;a=index">全部</a>
                    <a title="" href="/index.php?m=article&amp;a=index&amp;id=8">爱情</a><a title=""
                                                                                          href="/index.php?m=article&amp;a=index&amp;id=9">生日</a><a
                        title="" href="/index.php?m=article&amp;a=index&amp;id=10">节日</a><a title=""
                                                                                            href="/index.php?m=article&amp;a=index&amp;id=11">职业</a>
                </div>
            </div>
        </div>
        <div class="blog_wrap clearfix" id="J_waterfall">
            <div class="J_item wall_tag" style="opacity: 1;">
                <h3>最新日志：</h3>

                <div class="clearfix">
                    <li><a title="梦一样的初恋" href="/index.php?m=article&amp;a=view&amp;id=8">梦一样的初恋</a></li>
                    <li><a title="爱情，就像去远镇" href="/index.php?m=article&amp;a=view&amp;id=7">爱情，就像去远镇</a></li>
                    <li><a title="爱的礼物" href="/index.php?m=article&amp;a=view&amp;id=6">爱的礼物</a></li>
                </div>
            </div>
        </div>

        <div class="blog_wrap clearfix" id="J_waterfall">
            <div class="J_item wall_tag" style="opacity: 1;">
                <h3>最热日志：</h3>

                <div class="clearfix">
                    <li><a title="梦一样的初恋" href="/index.php?m=article&amp;a=view&amp;id=8">梦一样的初恋</a></li>
                    <li><a title="爱情，就像去远镇" href="/index.php?m=article&amp;a=view&amp;id=7">爱情，就像去远镇</a></li>
                    <li><a title="爱的礼物" href="/index.php?m=article&amp;a=view&amp;id=6">爱的礼物</a></li>
                </div>
            </div>
        </div>
    </div>
    <div class="blog_piece">
        <div class="blog_title blog_view_title"><?php echo ($article["title"]); ?></div>
        <div class="blog_view_info">发布： <?php echo ($article["add_time"]); ?> 标签:初恋 一样</div>
        <div class="blog_view_content">
            <?php echo ($article["info"]); ?>
        </div>
        <div class="blog_view_link">本文固定链接：<a href="<?php echo U('article/view',array('id'=>$article['id']));?>"><?php echo U('article/view',array('id'=>$article['id']), true, false, true);?></a></div>
        <div class="blog_view_pn">上一篇：<a href="/index.php?m=article&amp;a=view&amp;id=7">爱情，就像去远镇</a></div>
        <div>下一篇：<a href="/index.php?m=article&amp;a=view&amp;"></a></div>
        <div class="blog_view_link">
            <!-- JiaThis Button BEGIN -->
            <div class="jiathis_style_24x24" onmouseover="javascript:setShare('梦一样的初恋 #初恋 一样#', 'http://www.521715.com/index.php?m=article&a=view&id=8' ,'      初恋，其实就像一个美丽的气球一样，只能握在手里欣赏和回忆，如果你想知道里面的内容，打开了，就破坏了，就只是剩下几块碎屑，空留惆怅。那些过去的时光，永远也不会再回来了，即使回来了，也不再是原来的味道。','http://www.521715.com/data/upload/article/1302/21/5125bc4d668b1_thumb.jpg');">
                <a class="jiathis_button_qzone"></a>
                <a class="jiathis_button_tsina"></a>
                <a class="jiathis_button_tqq"></a>
                <a class="jiathis_button_renren"></a>
                <a class="jiathis_button_kaixin001"></a>
                <a class="jiathis_button_douban"></a>
                <a class="jiathis_button_tieba"></a>
                <a class="jiathis_button_tianya"></a>
                <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
                <a class="jiathis_counter_style"></a>
            </div>

            <!-- JiaThis Button END -->
        </div>
    </div>
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

<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1334589976235249" charset="utf-8"></script>
<script type="text/javascript">
    function setShare(title, url, summary, pic) {
        jiathis_config.title = title;
        jiathis_config.url = url;
        jiathis_config.summary = summary;
        jiathis_config.pic = pic;
    }
    var jiathis_config = {}
    setShare('梦一样的初恋 #初恋 一样#', 'http://www.521715.com/index.php?m=article&a=view&id=8' ,'      初恋，其实就像一个美丽的气球一样，只能握在手里欣赏和回忆，如果你想知道里面的内容，打开了，就破坏了，就只是剩下几块碎屑，空留惆怅。那些过去的时光，永远也不会再回来了，即使回来了，也不再是原来的味道。','http://www.521715.com/data/upload/article/1302/21/5125bc4d668b1_thumb.jpg');
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?btn=r1.gif&move=0" charset="utf-8"></script>
</body>
</html>