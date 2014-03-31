<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('list_m');
        $this->load->model('article_m');
        $this->load->helper('date_convert');
        $this->load->driver('cache');
        
        $this->cacheTime->mainPage      = 10; //minutes
        $this->cacheTime->topSlider     = 15;
        $this->cacheTime->leftLastNews  = 5;
        $this->cacheTime->footerCat     = 60;
    }

    function index(){ $this->main_page('news'); }

    function main_page($cat_name) {
        $this->output->cache( $this->cacheTime->mainPage );

        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);
        $data_ar['footer_menu_list']    = $this->list_m->get_footer_cat_link();
        $data_ar['mainpage_cat_list']   = $this->article_m->get_mainpage_cat_news($data_ar['second_menu_list']); // 9.5 sec.
        $data_ar['meta']['title']       = $data_ar['main_cat_ar']['title'];
        
        $top_slider['articles']         = $this->article_m->get_top_slider_data(1, 8, 5, 0, 350); // 1.5 sec.
        $top_slider['main_cat_url']     = $data_ar['main_cat_ar']['url_name'];
        
        $last_news['last_news']         = $this->article_m->get_last_left_news( $data_ar['main_cat_ar']['id'], 50, false, true ); // 1.5 sec.
//        echo '<pre>'.print_r($top_slider,1).'</pre>';

        $tpl_ar = $data_ar; //== !!! tmp    
        $tpl_ar['content']  = $this->load->view('component/main_latest_v', $data_ar, true);
        $tpl_ar['content'] .= $this->load->view('component/cat_listing_v', $data_ar, true);
        $tpl_ar['content'] .= $this->load->view('component/main_other_news_v', $data_ar, true);
        
        $tpl_ar['right']        = $this->load->view('component/right_last_news_v', $last_news, true);
        $tpl_ar['top_slider']   = $this->load->view('component/slider_top_v', $top_slider, true);

        $this->load->view('main_v', $tpl_ar);
    }

    function document($cat_name, $s_cat_name, $url_id_name) {
        
        preg_match("#-(\d+)-(.+)#i", $url_id_name, $url_id_name_ar); //зазбор URL_name
        $doc_id = $url_id_name_ar[1];
        $doc_urlname = $url_id_name_ar[2];

        $data_ar['doc_data']            = $this->article_m->get_doc_data($doc_id);
        if (!$data_ar['doc_data'])
            show_404();
        
        if( $data_ar['doc_data']['url_name'] != $doc_urlname ){
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: /".$cat_name.'/'.$s_cat_name.'/-'.$doc_id.'-'.$data_ar['doc_data']['url_name'].'/');
            exit();
        }
        
        $data_ar['like_articles']       = $this->article_m->get_like_articles( $data_ar['doc_data']['id'], $data_ar['doc_data']['title'], $data_ar['doc_data']['cat_id'], 8, 15, $data_ar['doc_data']['date'] );
        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $data_ar['s_cat_ar']            = $this->article_m->get_cat_data_from_url_name($s_cat_name);
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);
        $data_ar['footer_menu_list']    = $this->list_m->get_footer_cat_link();
        $data_ar['meta']['title']       = $data_ar['main_cat_ar']['name'].'/'.$data_ar['s_cat_ar']['name'].': '.$data_ar['doc_data']['title'];
        
        if( $data_ar['s_cat_ar']['id'] != $data_ar['doc_data']['cat_id'] || $data_ar['main_cat_ar']['id'] != $data_ar['s_cat_ar']['parent_id']  ) 
            show_404 ();
        
//        echo '<pre>'.print_r($data_ar['like_articles'],1).'</pre>';

        $top_slider['articles']         = $this->article_m->get_top_slider_data( $data_ar['s_cat_ar']['id'], 8, 5, 0, 350);
        
        $top_slider['main_cat_url']     = $data_ar['main_cat_ar']['url_name'];
        
        $last_news['last_news']         = $this->article_m->get_last_left_news( $data_ar['main_cat_ar']['id'], 20, false, true );
        
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
//        echo '<pre>'.print_r($data_ar['main_cat_ar'],1).'</pre>';
        $data_ar['s_cat_ar']            = $this->article_m->get_cat_data_from_url_name($s_cat_name);
        $data_ar['news_page_list']      = $this->article_m->get_page_list($data_ar['s_cat_ar']['id'], $page, 15);
        $data_ar['pager_ar']            = $this->article_m->get_pager_ar( $data_ar['s_cat_ar']['id'], $page, 15, 4);
        $data_ar['page_nmbr']           = $page;
        
        if (!$data_ar['news_page_list'])
            show_404();
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);
        $data_ar['footer_menu_list']    = $this->list_m->get_footer_cat_link();
        $data_ar['meta']['title']       = $data_ar['s_cat_ar']['title'].' - страница '.$page;

        $top_slider['articles']         = $this->article_m->get_top_slider_data( $data_ar['s_cat_ar']['id'], 8, 5, 0, 350);
        $top_slider['main_cat_url']     = $data_ar['main_cat_ar']['url_name'];
        
        $last_news['last_news']         = $this->article_m->get_last_left_news( $data_ar['main_cat_ar']['id'], 50, false, true );
        
        $tpl_ar                 = $data_ar; //== !!! tmp
        $tpl_ar['content']      = $this->load->view('page/cat_list_v', $data_ar, true);
        $tpl_ar['top_slider']   = $this->load->view('component/slider_top_v', $top_slider, true);
        $tpl_ar['right']        = $this->load->view('component/right_last_news_v', $last_news, true);

        $this->load->view('main_v', $tpl_ar);
    }
    
    function search( $cat_name, $page=1 ){
        $page = (int) $page; if (!$page) $page = 1;
        
        $searchStr   = $_GET['q'];
        $searchStr   = preg_replace("#[^a-z а-яё]#iu", ' ', $searchStr);
        
        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $data_ar['news_page_list']      = $this->article_m->get_search_page_list($searchStr, $page, 15 );
        $data_ar['pager_ar']            = $this->article_m->get_search_pager_ar( $searchStr, $page, 15, 4);
        $data_ar['page_nmbr']           = $page;
        
//        echo '<pre>'.print_r($data_ar['news_page_list'],1).'</pre>';
        
        if (!$data_ar['news_page_list'])
            $data_ar['news_page_list'] = NULL; #show_404();
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);
        $data_ar['footer_menu_list']    = $this->list_m->get_footer_cat_link();
        $data_ar['meta']['title']       = 'Поиск: &laquo;'.$searchStr.'&raquo;  - страница '.$page;
        
        $top_slider['articles']         = $this->article_m->get_top_slider_data(1, 8, 5, 0, 350); // 1.5 sec.
        $top_slider['main_cat_url']     = $data_ar['main_cat_ar']['url_name'];
        
        $last_news['last_news']         = $this->article_m->get_last_left_news( $data_ar['main_cat_ar']['id'], 50, false, true );
        
        //<Rename for cat list view>
        $data_ar['main_cat_ar']['name']     = 'Поиск';
        $data_ar['s_cat_ar']['name']        = $searchStr;
        $data_ar['s_cat_ar']['url_name']    = $data_ar['news_page_list'][0]['s_cat_uname'];
        $data_ar['search_url_str']          = str_replace(' ', '+', $searchStr);
        //</Rename for cat list view>
        
        $tpl_ar                 = $data_ar; //== !!! tmp
        $tpl_ar['content']      = $this->load->view('page/cat_list_v', $data_ar, true);
        $tpl_ar['top_slider']   = $this->load->view('component/slider_top_v', $top_slider, true);
        $tpl_ar['right']        = $this->load->view('component/right_last_news_v', $last_news, true);

        $this->load->view('main_v', $tpl_ar);
    }

}