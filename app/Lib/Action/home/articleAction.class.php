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
        $this->assign('csses', array('article.css', 'http://v3.jiathis.com/code/css/jiathis_counter.css','http://v3.jiathis.com/code/css/jiathis_share.css'));

        $this->assign('nav_curr', 'article');
    }

    public function index() {
        $brand_id = $this->_get('brand_id', 0);
        $tag = $this->_get('tag', '');
        $where = array();
        if($brand_id) {
            $where['brand_id'] = $brand_id;
        }
        if($tag) {
            $where['tag'] = $tag;
        }

        $article_mod = M('article');
        $articles = $article_mod->where($where)->select();
        foreach($articles as &$article) {
            $time = $article['add_time'];
            $article['add_time'] = date("Y-m-d", $time);

        }
        $this->assign('articles', $articles);
        $this->display();
    }

    public function view() {
        $article_id = $this->_get('id', 0);
        $article_mod = M('article');
        $articles = $article_mod->where(array('id'=>$article_id))->select();
        $article = $articles[0];

        $article['add_time'] = date("Y-m-d", $article['add_time']);

        $this->assign('article', $article);

        $this->display();
    }
}