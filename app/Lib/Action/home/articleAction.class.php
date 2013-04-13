<?php
/**
 * Created by IntelliJ IDEA.
 * User: yuanxijie
 * Date: 13-3-16
 * Time: 下午5:32
 * To change this template use File | Settings | File Templates.
 */
class articleAction extends frontendAction {
    public function _initialize() {
        parent::_initialize();
        $this->assign('csses', array('brand.css','article.css', 'http://v3.jiathis.com/code/css/jiathis_counter.css','http://v3.jiathis.com/code/css/jiathis_share.css'));
        $this->assign('jses', array('brand/brand.js'));
        $this->assign('nav_curr', 'article');
    }

    public function index() {
        $brand_id = $this->_get('brand_id', 0);
        $tag = $this->_get('tag', '');

        $where = array();
        if($brand_id) {
            $where['brand_id'] = $brand_id;
            $brands= M('brand')->where(array('id'=>$brand_id))->select();
            $brand = $brands[0];

            $item_mod = M('item');
            $brand_item_list_max = intval(C('pin_brand_item_list_max'));
            if(!$brand_item_list_max) {
                $brand_item_list_max = 12;
            }

            $items = $item_mod->where(array('brand_id'=>$brand_id, 'status'=>'1'))->limit($brand_item_list_max)->select();
            $brand['brand_items'] = $items;

            $this->assign('brand_name', $brand['name']);
            $this->assign('brand', $brand);

            $site_title = C('pin_site_title');
            $title = $site_title . "-" . "品牌列表" . "-" . $brand['name'];
            $keywords = $brand['name']. "品牌服装";
            $description = $brand['short_desc'];

            $this->assign('page_seo', array(
                'title' => $title,
                'keywords' => $keywords,
                'description' => $description
            ));
        } else {
            $page = $this->_get('p', 1);
            if(empty($page)) {
                $page = 1;
            }
            $article_mod = M('article');
            $total_article_num = $article_mod->count();
            $default_page_num = C('ARTICLE_PAGE_NUM');
            $total_page_num = ceil(floatval($total_article_num)/$default_page_num);
            $this->assign('cur_page', $page) ;
            $this->assign('total_page', $total_page_num);

            $site_title = C('pin_site_title');
            $this->assign('page_seo', array(
                'title' => $site_title . "-" . "网志列表",
                'keywords' => C('pin_site_keyword'),
                'description' => C('pin_site_description')
            ));
        }

        if($tag) {
            $where['tag'] = $tag;
        }


        $article_mod = M('article');
        $articles = $article_mod->where($where)->getField('id,title, tags, img, intro, add_time');
        foreach($articles as &$article) {
            $time = $article['add_time'];
            $article['add_time'] = date("Y-m-d", $time);
        }

        $this->assign('articles', $articles);
        $article_mod = M('article');
        $news = $article_mod->order('id desc')->limit(3)->select();
        $article_mod = M('article');
        $hots = $article_mod->order('hits desc')->limit(3)->select();

        $brand_mod = M('brand');
        $brands = $brand_mod->getField('id,name, memo');
        $this->assign('new_articles', $news);
        $this->assign('hot_articles', $hots);
        $this->assign('brands', $brands);


        $this->display();
    }

    public function view() {
        $article_id = $this->_get('id', 0);
        $article_mod = M('article');
        $article_mod->where(array('id'=>$article_id))->setInc('hits', 1);
        $articles = $article_mod->where(array('id'=>$article_id))->select();
        $article = $articles[0];

        $article['add_time'] = date("Y-m-d", $article['add_time']);

        $this->assign('article', $article);

        $article_mod = M('article');
        $news = $article_mod->order('id desc')->limit(3)->select();
        $article_mod = M('article');
        $hots = $article_mod->order('hits desc')->limit(3)->select();
        $this->assign('new_articles', $news);
        $this->assign('hot_articles', $hots);

        $brand_mod = M('brand');
        $brands = $brand_mod->getField('id,name, memo');
        $this->assign('brands', $brands);

        if(intval($article['brand_id'])) {
            $brand_id = intval($article['brand_id']);
            $where['brand_id'] = $brand_id;
            $brands= M('brand')->where(array('id'=>$brand_id))->select();
            $brand = $brands[0];

            $item_mod = M('item');
            $brand_item_list_max = intval(C('pin_brand_item_list_max'));
            if(!$brand_item_list_max) {
                $brand_item_list_max = 12;
            }

            $items = $item_mod->where(array('brand_id'=>$brand_id, 'status'=>'1'))->limit($brand_item_list_max)->select();
            $brand['brand_items'] = $items;

            $this->assign('brand_name', $brand['name']);
            $this->assign('brand', $brand);

        }
        $this->display();
    }
}