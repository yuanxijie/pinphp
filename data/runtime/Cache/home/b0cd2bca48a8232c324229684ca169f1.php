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
    <?php if(!empty($brand)): ?><div class="brand_item">
        <div class="brand_item_info">
            <div class="bic_brand j_BrandItemInfo">
                <p class="bic_logo">
                    <a href="#"><img width="90" height="45" alt="ONLY" src="<?php echo ($brand["logo"]); ?>"></a>
                    <strong><?php echo ($brand["name"]); ?></strong>
                </p>
                <dl class="bIi-style clearfix">
                    <dt>品牌描述：</dt>
                    <dd><?php echo ($brand["memo"]); ?></dd>
                </dl>
                <p>月总销量：<?php echo ($brand["month_sale"]); ?>件</p>
                <p class="bIi-intro j_BrandItemIntro"><?php echo ($brand["short_desc"]); ?></p>
            </div>
            <p class="bIi-addBtn">
                <a data-id="16" class="J_likeitem like" href="javascript:void(0);">喜欢</a>
            </p>
        </div>
        <div class="brand_item_cont">
            <div class="brand_item_cont_title">
                <p class="bIc-title-notice">
                    <a target="_blank" class="bIc-title-notice-shop" href="http://only.tmall.com"><?php echo ($brand["name"]); ?>官方旗舰店</a><em>品牌直销</em>
                    <a target="_blank" href="http://only.tmall.com">满就免邮费</a>
                </p>
                <a target="_self" class="bIc-title-more ui-more-nbg" href="<?php echo U('brand/view', array('brand_id'=>$brand['id']));?>">还有<strong><?php echo ($brand["item_count"]); ?></strong>件商品<i class="ui-more-nbg-arrow"></i></a>
            </div>
            <a class="bIc-slide bIc-slide-prev ks-switchable-disable-btn" href="javascript:void(0);" data-spm-anchor-id="3.1000474.0.51">&lt;</a>
            <div class="brand_item_cont_slide">
                <ul class="bIc-slideList" style="position: absolute; width: 2160px; left: 0px;">
                    <?php if(is_array($brand['brand_items'])): $i = 0; $__LIST__ = $brand['brand_items'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand_item): $mod = ($i % 2 );++$i;?><li class="j_BrandItemList" style="display: block; float: left;">
                            <p class="bIc-slideList-img"><a href="<?php echo U('item/index', array('id'=>$brand_item['id']));?>" target="_blank">
                                <img width="160" height="160" src="<?php echo ($brand_item["img"]); ?>_160x160.jpg"></a></p>
                            <p class="bIc-slideList-sell">
                                <span class="bIc-slideList-sell-price ui-price"><span class="ui-price-icon">¥</span><?php echo ($brand_item["price"]); ?></span>
                                <span class="bIc-slideList-sell-num">月销量：<em>550</em></span>
                            </p>
                            <p class="bIc-slideList-title"><a href="<?php echo U('item/index', array('id'=>$brand_item['id']));?>" target="_blank"><?php echo ($brand_item["title"]); ?></a></p>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <a class="bIc-slide bIc-slide-next" href="javascript:void(0);" data-spm-anchor-id="3.1000474.0.76">&gt;</a>
        </div>
    </div><?php endif; ?>
    <div class="blog_wrap clearfix">
        <div class="clearfix masonry" id="J_waterfall" style="position: relative; height: 161px;">
            <div class="J_item wall_tag masonry-brick" style="position: absolute; top: 0px; left: 0px; opacity: 1;">
                <h3>日志分类：</h3>

                <div class="tags clearfix">
                    <a <?php if(empty($brand_name)): ?>class="current"<?php endif; ?> href="<?php echo U('article/index');?>">全部</a>
                    <?php if(is_array($brands)): $brand_id = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($brand_id % 2 );++$brand_id;?><a <?php if($brand_name == $brand['name']): ?>class="current"<?php endif; ?> title="<?php echo ($brand["name"]); ?> <?php echo ($brand["memo"]); ?>" href="<?php echo U('article/index', array('brand_id'=>$brand_id));?>"><?php echo ($brand["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    <a title="" href="<?php echo U('article/index', array('brand_id'=>1000000));?>">爱情</a>
                </div>
            </div>
        </div>
        <div class="blog_wrap clearfix" id="J_waterfall">
            <div class="J_item wall_tag" style="opacity: 1;">
                <h3>最新日志：</h3>
                <div class="clearfix">
                    <?php if(is_array($new_articles)): $i = 0; $__LIST__ = $new_articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new_art): $mod = ($i % 2 );++$i;?><li><a title="<?php echo ($new_art["title"]); ?>" href="<?php echo U('article/view', array('id'=>$new_art['id']));?>"><?php echo ($new_art["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>

        <div class="blog_wrap clearfix" id="J_waterfall">
            <div class="J_item wall_tag" style="opacity: 1;">
                <h3>最热日志：</h3>

                <div class="clearfix">
                    <?php if(is_array($hot_articles)): $i = 0; $__LIST__ = $hot_articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot_art): $mod = ($i % 2 );++$i;?><li><a title="<?php echo ($hot_art["title"]); ?>" href="<?php echo U('article/view', array('id'=>$hot_art['id']));?>"><?php echo ($hot_art["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="blog_piece">
        <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><div class="blog_title"><a title="<?php echo ($article["title"]); ?>"
                                       href="<?php echo U('article/view', array('id'=>$article['id']));?>"><?php echo ($article["title"]); ?></a>
            </div>
            <div class="blog_intro">
                <div class="blog_pic">
                <?php if(substr($article['img'], 0, 4) == 'http'): ?><img src="<?php echo ($article["img"]); ?>">
                <?php else: ?>
                    <img src="/data/upload/article/<?php echo ($article["img"]); ?>"><?php endif; ?>
                </div>
                <div style="text-indent:6px; margin-left:4px;">
                    <?php echo ($article["intro"]); ?>
                </div>
            </div>
            <div class="blog_into"><a title="<?php echo ($article["title"]); ?>" href="<?php echo U('article/view', array('id'=>$article['id']));?>"><span
                    class="read_more">阅读全文</span></a></div>
            <div class="blog_tag">标签:<?php echo ($article["tags"]); ?>
                <!-- JiaThis Button BEGIN -->
                <div class="jiathis_style_24x24"
                     onmouseover="javascript:setShare('<?php echo ($article["title"]); ?> #<?php echo ($article["tags"]); ?>#', '<?php echo U('article/view', array('id'=>$article['id']), true, false, true);?>' ,' <?php echo ($article["intro"]); ?>','http://<?php echo ($server_name); ?>/data/upload/article/<?php echo ($article["img"]); ?>');">
                    <a class="jiathis_button_qzone"></a>
                    <a class="jiathis_button_tsina"></a>
                    <a class="jiathis_button_tqq"></a>
                    <a class="jiathis_button_renren"></a>
                    <a class="jiathis_button_kaixin001"></a>
                    <a class="jiathis_button_douban"></a>
                    <a class="jiathis_button_tieba"></a>
                    <a class="jiathis_button_tianya"></a>
                    <a href="http://www.jiathis.com/share"
                       class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
                    <a class="jiathis_counter_style"></a>
                    发布于 <?php echo ($article["add_time"]); ?>
                </div>
                <!-- JiaThis Button END -->
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="page_bar">
        <?php if(isset($total_page)): $__FOR_START_2037548486__=1;$__FOR_END_2037548486__=$total_page+1;for($p=$__FOR_START_2037548486__;$p < $__FOR_END_2037548486__;$p+=1){ if($p == $cur_page): ?><span class="current"><?php echo ($cur_page); ?></span>
                <?php else: ?>
                    <a href="<?php echo U('article/index', array('p'=>$p));?>">&nbsp;<?php echo ($p); ?>&nbsp;</a><?php endif; } ?>
            <?php if($cur_page < $total_page): ?><a href="<?php echo U('article/index', array('p'=>$cur_page+1));?>">下一页&gt;</a><?php endif; endif; ?>
        <?php if(empty($total_page)): ?>1/1 页<?php endif; ?>
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
</script>

</body>
</html>