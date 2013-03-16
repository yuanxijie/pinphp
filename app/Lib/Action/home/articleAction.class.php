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
        $this->display();
    }

    public function view() {
        $this->display();
    }
}