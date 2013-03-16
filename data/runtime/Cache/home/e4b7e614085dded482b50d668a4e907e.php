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
        <div class="blog_title blog_view_title">梦一样的初恋</div>
        <div class="blog_view_info">发布： 02月21 分类： 爱情 标签:初恋 一样</div>
        <div class="blog_view_content"><p style="margin-top:0px;margin-bottom:12px;padding:0px;line-height:22px;white-space:normal;">
            &nbsp; &nbsp; &nbsp;&nbsp;他和她是在村子里是前后邻居，说起来还是近亲。那是在八十年代中期，刚包产到户的年代，他们两家和另外两家成立了一个小组共同分到了生产队的一头牛，一起耕种土地。平时放了学或者周末假期的时候，他们经常帮助家长干农活，所以，接触的就比较多。
        </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>那个时候，他十四岁，她比他大一岁，十五岁。都在邻村上初中，早晚自习，双方的家长就让他们结伴而行，相互照顾。都是豆蔻年华，两小无猜，青梅竹马，他们之间自然而然慢慢的就产生了一些别样的感情。总是喜欢在一起，一起去河边看柳，一起在月光下的麦场的草垛旁谈心。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>当时他的家里已经给他盖了三间大瓦房，预备以后好给他娶媳妇，当时只是安装了大门，正屋里放了好多切好的牛料。每当晚饭后，写完了作业，他就在她家后墙上踹三脚，她听到了就会出来，然后一起到这里，躺在柔软的干草上面说话，一说就到很晚。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>后来他考上了高中，到了镇上上学了，她则留在了家里务农，每周只能见一次了。但是每个周末回来，他们都要在一起。相约这辈子永不分离，他发誓非她不娶，她发誓�伤患蓿�彼此死守一辈子。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>可是不久，传来了一个消息。他爸爸在很远的一个城市国有大型企业做工会主席，符合条件，全家可以农转非了。也就是说，她们全家和她就要离开这个生活了十多年的乡村，去大城市里生活了。从此他们就将分开，不能生活在一起了。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>听到这个消息，他们相拥而泣，她说她不会走的，她要留下来，等他们都长大了，她要和他结婚，然后生一大群孩子，过平凡的日子。他也说一定好好学习，争取考上大学，就可以分到大城市了，再把她接去，一起享受爱情的甜蜜。&nbsp;
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>毕竟都是小孩子，大人的意志是违背不了的。最后，她还是和她的家人一起，去了遥远的另外一个城市。那个时候，交通和通信都很不发达，之间只能靠偶尔的书信交流。后来，慢慢的书信也越来越少了，她的爸妈截取了他写去的书信，他们的交流中断了。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>一转眼几年过去了，他已经是一名大四的学生了，很快就要毕业。在寒假过后，他在地图上找到了她在的城市，他对家人谎称有事要提前几天到校，他却坐上了找她的列车，来到了她的城市，整整找了三天才找到，期间他晚上就住在一个简易的小旅馆里。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>来到她的家里，她们的家人还是热情的接待了他，虽然都知道他此行的目的。等吃中午饭的时候，她才回来，身边跟着一个男孩子。将近十年的相遇，没有什么更多的交流，甚至都没有能说上几句话，他就匆匆离开了，他承受不了那种尴尬的气氛。&nbsp;
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>她的二姐送他去的车站，路上对他说，我们都知道你们两个人好，但是事情过去就过去了吧，如今你也大学快毕业了，她身边的男孩就是她的男朋友，也很快就要结婚了，面对现实，各自过各自的生活吧。他眼里含着泪说，说过的话，留下的誓言，怎么就轻易的忘记了呢。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>他毕业以后回到了老家的县城工作，一晃又是十多年过去了，之间他娶妻生子，日子过得平淡而幸福。他们从来没有联系过，听别的同学说，她曾经回来过老家几次，但他们没有见过面。&nbsp;
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>随着时间的流失，他越来越怀念他的初恋，好多次在梦中与她相遇，她还是年轻时候的容颜。而这样的做梦的频率越来越高，有的时候甚至沉迷在其中不能自拔。尤其过了而立之年，他想知道她的近况的欲望越来越强烈。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>他也向她当初很要好的同学打听过她的手机和别的联系方式，始终未果。前几天，他一个初中的同学的父亲去世了，他们好多同学集合起来一起去吊唁，期间说到了她，大家都没有她的消息。有个同学知道他们之间的关系，况且他们还是同村，就命令他一定要设法找到她的联系方式，然后转发给同学们，这么个年龄了，应该加强联系了。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>他想到老家找她的叔叔们要号码，又怕引起不必要的误会。他回到家里，左思右想，终于想到了网络，网络是神奇的，或许借助网络的力量，一定会找到她。他首先找到了她在的那个企业的网站，然后在站内搜索她的名字，可是没有结果。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>他又想到，每个城市，每个单位都有自己的百度贴吧，会不会她在的企业也有自己的贴吧呢。于是，他在百度里输入了她所在企业的名字，果然找到了她们企业的贴吧。此时正是周末的上午十一点多钟，他马上在上面发了一个帖子，写的是在他的城市的老家的同学找她，并写上她的名字，还有他的QQ号码，希望看到了以后和他联系，之后他就忙自己的事情了。&nbsp;
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>吃过午饭，他又来到了电脑前面，他第一眼就看到了他QQ有个加好友的请求，他马上打开一看，是她在的城市的一个男孩，他赶紧同意了，马上聊了起来，原来这个男孩就是她的儿子，他的妈妈就在他的身边，他给了电话号码，她打了过来。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>真要感谢网络，二十多年时间没有找到，他就是发了一个帖子，两个小时的时间，就找到了她，他有点不敢相信这是真的。他非常的激动，急忙说着话，好像要几句就像概括出着二十多年的思念。她也有些激动吧，开始聊了好久还说不知道是谁，后来才说，其实早就猜到应该是他，只是故意不说而已。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>她只是说，上班的时候，儿子就打来电话说，企业吧里有个找她的帖子，在下班的路上，有个同事也把这个消息告诉了她。她就急忙回家，想看看到底是谁。期间老公曾经给她打过电话，说肯定是他，别的同学不会这么多年了还在找她，她起初还不相信呢。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>等到她下午上班的，他又给她打去电话，说了彼此的一些事情和家庭状况。他说的更多的是这些年来的思念和怀念。她说的都是，现在已经这个年龄了，没有别的什么想法了，好好的伺候老公和儿子，平平安安就是最大的幸福了。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>他能听的出来，她现在生活的还好，不想让他打扰她平静的生活。其实，他也没有什么别的想法，就是想知道曾经的恋人，在另外一个城市里，这么多年了，生活的是不是如意，只要过得比自己好也就心满意足了。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>他们打了很长时间的电话，直到她说自己的手机快没有电了。他说什么时候没有电了，什么时候停止吧。后来电话突然中断了，他知道这是她的手机没有电了。他恋恋不舍地放下了手机，回味着突如其来的幸福，也是突如其来的无限的失落。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>他来到她儿子的QQ空间，一眼就看到了有她的照片，她真的变化不大，还是二十多年前的样子，和自己在梦里见到的一模一样。然后把照片保存到了自己的电脑里，一整个晚上，他都在对着照片发呆，回味着那些逝去的时光。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>初恋，其实就像一个美丽的气球一样，只能握在手里欣赏和回忆，如果你想知道里面的内容，打开了，就破坏了，就只是剩下几块碎屑，空留惆怅。那些过去的时光，永远也不会再回来了，即使回来了，也不再是原来的味道。
            </p>
            <p style="margin-top:0px;margin-bottom:15px;padding:0px;line-height:22px;white-space:normal;">
                <span style="line-height:22px;white-space:normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>深夜，他还是做出了决定，删除了存在电脑里的照片，还有她儿子的QQ，还有他手机里接过一次，打过一次的号码。他决定把那份初恋，用纯洁的爱细心地包好，放在心灵最深处的角落，以后，永远也不会再去翻看。
            </p></div>
        <div class="blog_view_link">本文固定链接：<a href="http://www.521715.com/index.php?m=article&amp;a=view&amp;id=8">http://www.521715.com/index.php?m=article&amp;a=view&amp;id=8</a></div>
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