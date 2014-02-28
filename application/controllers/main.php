<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('list_m');
        $this->load->model('article_m');
        $this->load->helper('date_convert');
    }

    function index(){ $this->main_page('news'); }

    function main_page($cat_name) {
        $this->benchmark->mark('1');
        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $this->benchmark->mark('2');
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $this->benchmark->mark('3');
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);
        $this->benchmark->mark('4');
        $data_ar['mainpage_cat_list']   = $this->article_m->get_mainpage_cat_news($data_ar['second_menu_list']);
        $this->benchmark->mark('5');
        $data_ar['meta']['title']       = $data_ar['main_cat_ar']['title'];
        
        $this->benchmark->mark('6');
        $top_slider['articles']         = $this->article_m->get_popular_articles(1, 8, 5, 0, 350);
        $top_slider['main_cat_url']     = $data_ar['main_cat_ar']['url_name'];
        
        $this->benchmark->mark('7');
        $last_news['last_news']         = $this->article_m->get_last_news( $data_ar['main_cat_ar']['id'], 50, false, true );
//        echo '<pre>'.print_r($top_slider,1).'</pre>';

        $this->benchmark->mark('8');
        $tpl_ar = $data_ar; //== !!! tmp    
        $tpl_ar['content']  = $this->load->view('component/main_latest_v', $data_ar, true);
        $tpl_ar['content'] .= $this->load->view('component/cat_listing_v', $data_ar, true);
        $tpl_ar['content'] .= $this->load->view('component/main_other_news_v', $data_ar, true);
        
        $tpl_ar['right']        = $this->load->view('component/right_last_news_v', $last_news, true);
        $tpl_ar['top_slider']   = $this->load->view('component/slider_top_v', $top_slider, true);

        $this->load->view('main_v', $tpl_ar);
        
        $this->benchmark->mark('end');
        
        echo    '<br /> 1 - ';
        echo  $this->benchmark->elapsed_time('1', '2');
        echo    '<br /> 2 - ';
        echo  $this->benchmark->elapsed_time('2', '3');
        echo    '<br /> 3 - ';
        echo  $this->benchmark->elapsed_time('3', '4');
        echo    '<br /> 4 - ';
        echo  $this->benchmark->elapsed_time('4', '5');
        echo    '<br /> 5 - ';
        echo  $this->benchmark->elapsed_time('5', '6');
        echo    '<br /> 6 - ';
        echo  $this->benchmark->elapsed_time('6', '7');
        echo    '<br /> 7 - ';
        echo  $this->benchmark->elapsed_time('7', '8');
        echo    '<br /> 8 - ';
        echo  $this->benchmark->elapsed_time('8', 'end');
    }

    function document($cat_name, $s_cat_name, $url_id_name) {
        
        preg_match("#-(\d+)-(.+)#i", $url_id_name, $url_id_name_ar); //зазбор URL_name
        $doc_id = $url_id_name_ar[1];
        $doc_urlname = $url_id_name_ar[2];

        $data_ar['doc_data']            = $this->article_m->get_doc_data($doc_id);
        if (!$data_ar['doc_data'])
            show_404();
        $data_ar['like_articles']       = $this->article_m->get_like_articles( $data_ar['doc_data']['id'], $data_ar['doc_data']['title'], 8, 15, $data_ar['doc_data']['date'] );
        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $data_ar['s_cat_ar']            = $this->article_m->get_cat_data_from_url_name($s_cat_name);
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);
        $data_ar['meta']['title']       = $data_ar['main_cat_ar']['name'].'/'.$data_ar['s_cat_ar']['name'].': '.$data_ar['doc_data']['title'];

        $top_slider['articles']         = $this->article_m->get_popular_articles( $data_ar['s_cat_ar']['id'], 8, 5, 0, 350);
        $top_slider['main_cat_url']     = $data_ar['main_cat_ar']['url_name'];
        
        $last_news['last_news']         = $this->article_m->get_last_news( $data_ar['main_cat_ar']['id'], 20, false, true );
        
        $tpl_ar                 = $data_ar; //== !!! tmp
        $tpl_ar['content']      = $this->load->view('page/doc_v', $data_ar, true);
        $tpl_ar['top_slider']   = $this->load->view('component/slider_top_v', $top_slider, true);
        $tpl_ar['right']        = $this->load->view('component/right_last_news_v', $last_news, true);

        $this->load->view('main_v', $tpl_ar);
    }

    function cat_list($cat_name, $s_cat_name, $page = 1) {
        $page = (int) $page;
        if (!$page) $page = 1;

        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $data_ar['s_cat_ar']            = $this->article_m->get_cat_data_from_url_name($s_cat_name);
        $data_ar['news_page_list']      = $this->article_m->get_page_list($data_ar['s_cat_ar']['id'], $page, 15);
        $data_ar['pager_ar']            = $this->article_m->get_pager_ar( $data_ar['s_cat_ar']['id'], $page, 15, 4);
        $data_ar['page_nmbr']           = $page;
        
        if (!$data_ar['news_page_list'])
            show_404();
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);
        $data_ar['meta']['title']       = $data_ar['s_cat_ar']['title'].' - страница '.$page;

        $top_slider['articles']         = $this->article_m->get_popular_articles( $data_ar['s_cat_ar']['id'], 8, 5, 0, 350);
        $top_slider['main_cat_url']     = $data_ar['main_cat_ar']['url_name'];
        
        $last_news['last_news']         = $this->article_m->get_last_news( $data_ar['main_cat_ar']['id'], 50, false, true );
        
        $tpl_ar                 = $data_ar; //== !!! tmp
        $tpl_ar['content']      = $this->load->view('page/cat_list_v', $data_ar, true);
        $tpl_ar['top_slider']   = $this->load->view('component/slider_top_v', $top_slider, true);
        $tpl_ar['right']        = $this->load->view('component/right_last_news_v', $last_news, true);

        $this->load->view('main_v', $tpl_ar);
    }

}