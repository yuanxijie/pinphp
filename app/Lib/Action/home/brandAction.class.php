<?php
/**
 * Created by IntelliJ IDEA.
 * User: yuanxijie
 * Date: 13-3-10
 * Time: 下午12:12
 * To change this template use File | Settings | File Templates.
 */

class brandAction extends frontendAction {
    public function _initialize() {
        parent::_initialize();
        $this->assign('nav_curr', 'brand');
        $this->assign('csses', array('brand.css'));
        $this->assign('jses', array('brand/brand.js'));
    }

    public function index() {
        error_reporting(E_ALL);
        $brand_cates = M('brand_cate')->where("status=0")->select();
        $cate_id = $this->_get('cate_id', "strip_tags", 1);
        $cur_cate = $brand_cates[0];
        foreach($brand_cates  as $bc) {
            if($bc['id'] == $cate_id) {
                $cur_cate = $bc;
            }
        }
        $brand_item_list_max = intval(C('pin_brand_item_list_max'));
        if(!$brand_item_list_max) {
            $brand_item_list_max = 12;
        }

        $brand_mod = M('brand');
        $brands = $brand_mod->where(array('brand_cate_id'=>$cur_cate['id']))->select();
        foreach($brands as &$val) {
            $item_mod = M('item');
            $items = $item_mod->where(array('brand_id'=>$val['id'], 'status'=>'1'))->limit($brand_item_list_max)->select();
            $val['brand_items'] = $items;
        }

        $this->assign("brand_cates", $brand_cates);
        $this->assign("brands", $brands);
        $this->assign("cate_id", $cate_id);
        $this->display();
    }

    public function view() {
        $page_max = C('pin_book_page_max'); //发现页面最多显示页数
        $sort = $this->_get('sort', 'trim', 'hot'); //排序
        $brand_id = $this->_get('brand_id', 0);
        $where = array();

        //排序：最热(hot)，最新(new)
        switch ($sort) {
            case 'hot':
                $order = 'hits DESC,id DESC';
                break;
            case 'new':
                $order = 'id DESC';
                break;
        }
        if($brand_id)  {
            $where['brand_id'] = array('eq', $brand_id);
        }

        $this->waterfall($where, $order, '', $page_max);
        //}
        $brand_cates = M('brand_cate')->where("status=0")->select();
        $brand_list = M('brand')->where(array('id'=>$brand_id))->select();
        $brand = $brand_list[0];
        $brand_cate_id = $brand['brand_cate_id'];

        $this->assign('sort', $sort);
        $this->assign('brand', $brand);
        $this->assign("brand_cates", $brand_cates);
        $this->assign("cate_id", $brand_cate_id);

        $this->_config_seo(C('pin_seo_config.book')); //SEO
        $this->display();
    }
}