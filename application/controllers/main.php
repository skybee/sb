<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('list_m');
        $this->load->model('article_m');
        $this->load->model('category_m');
        $this->load->helper('date_convert');
        $this->load->helper('doc_helper');
        $this->load->driver('cache');
        $this->load->config('category');
        $this->load->library('cat_lib');
        
        $this->catNameAr = $this->cat_lib->getCatFromUri();
        $this->catConfig = $this->cat_lib->getCatConfig();
        
        $this->cacheTime->footerCat     = 180; //minutes
        
        $this->topSliderTxtLength       = 290;
    }

    function index(){ $this->main_page('news'); }

    function main_page($cat_name) {
        $this->output->cache( $this->catConfig['cache_time']['main_page'] );

        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);
        $data_ar['footer_menu_list']    = $this->list_m->get_footer_cat_link();
        $data_ar['mainpage_cat_list']   = $this->article_m->get_mainpage_cat_news($data_ar['second_menu_list']); // 9.5 sec.
        $data_ar['meta']['title']       = $data_ar['main_cat_ar']['title'];
        
        $top_slider['articles']         = $this->article_m->get_top_slider_data($data_ar['main_cat_ar']['id'], 8, 90, 0, $this->topSliderTxtLength, true, true); // 1.5 sec.
        $top_slider['main_cat_url']     = $data_ar['main_cat_ar']['url_name'];
        
        $last_news['last_news']         = $this->article_m->get_last_left_news( $data_ar['main_cat_ar']['id'], 50 ); // 1.5 sec.

        $tpl_ar = $data_ar; //== !!! tmp    
        $tpl_ar['content']  = $this->load->view('component/main_latest_v', $data_ar, true);
        $tpl_ar['content'] .= $this->load->view('component/cat_listing_v', $data_ar, true);
        $tpl_ar['content'] .= $this->load->view('component/main_other_news_v', $data_ar, true);
        
        $tpl_ar['right']        = $this->load->view('component/right_last_news_v', $last_news, true);
        $tpl_ar['top_slider']   = $this->load->view('component/slider_top_v', $top_slider, true);

        $this->load->view('main_v', $tpl_ar);
    }

    function document($url_id_name) {
        
        preg_match("#-(\d+)-(.+)#i", $url_id_name, $url_id_name_ar); //зазбор URL_name
        $doc_id = $url_id_name_ar[1];
        $doc_urlname = $url_id_name_ar[2];

        $data_ar['doc_data']            = $this->article_m->get_doc_data($doc_id);
        if (!$data_ar['doc_data']){
            show_404();
        }
        
        $true_url = '/'.$data_ar['doc_data']['cat_full_uri'].'-'.$data_ar['doc_data']['id'].'-'.$data_ar['doc_data']['url_name'].'/';
        
        if( $true_url != $_SERVER['REQUEST_URI'] ){
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$true_url);
            exit();
        }
        
        $data_ar['like_articles']       = $this->article_m->get_like_articles( $data_ar['doc_data']['id'], $data_ar['doc_data']['title'], 12, $this->catConfig['like_news_day'], $data_ar['doc_data']['date'] );
        $data_ar['cat_ar']              = $this->category_m->get_cat_data_from_id($data_ar['doc_data']['cat_id']);
        
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['cat_ar']['parent_id']);
        $data_ar['footer_menu_list']    = $this->list_m->get_footer_cat_link();
        $data_ar['meta']['title']       = $data_ar['cat_ar']['name'].': '.$data_ar['doc_data']['title'].' - Odnako.su';
        $data_ar['donor_rel']           = botRelNofollow();

        $top_slider['articles']         = $this->article_m->get_top_slider_data( $data_ar['cat_ar']['id'], 8, 90, 0, $this->topSliderTxtLength, true, false);
        $last_news['last_news']         = $this->article_m->get_last_left_news( $data_ar['cat_ar']['parent_id'], 20 );
        
//        print_r($data_ar['cat_ar']);
        
        $tpl_ar                 = $data_ar; //== !!! tmp
        $tpl_ar['content']      = $this->load->view('page/doc_v', $data_ar, true);
        $tpl_ar['top_slider']   = $this->load->view('component/slider_top_v', $top_slider, true);
        $tpl_ar['right']        = $this->load->view('component/right_last_news_v', $last_news, true);
        $tpl_ar['meta']['og']   = $this->load->view('component/meta_og_v', $data_ar['doc_data'], true);

        $this->load->view('main_v', $tpl_ar);
    }

    function cat_list($cat_name, $page) {
        
        $page = (int) $page;
        if (!$page) $page = 1;

        $data_ar['cat_ar']              = $this->category_m->get_cat_data_from_url( $cat_name );
        if( !isset($data_ar['cat_ar']['id']) ){
            show_404();
        }
        $data_ar['news_page_list']      = $this->article_m->get_page_list($data_ar['cat_ar']['id'], $page, 15, 250 );
        $data_ar['pager_ar']            = $this->article_m->get_pager_ar( $data_ar['cat_ar']['id'], $page, 15, 4);
        $data_ar['page_nmbr']           = $page;
        
        if (!$data_ar['news_page_list'])
            show_404();
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['cat_ar']['parent_id']);
        $data_ar['footer_menu_list']    = $this->list_m->get_footer_cat_link();
        $data_ar['meta']['title']       = $data_ar['cat_ar']['title'].' - страница '.$page;

        $top_slider['articles']         = $this->article_m->get_top_slider_data( $data_ar['cat_ar']['id'], 8, 90, 0, $this->topSliderTxtLength, true, false);
        
        $last_news['last_news']         = $this->article_m->get_last_left_news( $data_ar['cat_ar']['parent_id'], 50 );
        
        $tpl_ar                 = $data_ar; //== !!! tmp
        $tpl_ar['content']      = $this->load->view('page/cat_list_v', $data_ar, true);
        $tpl_ar['top_slider']   = $this->load->view('component/slider_top_v', $top_slider, true);
        $tpl_ar['right']        = $this->load->view('component/right_last_news_v', $last_news, true);

        $this->load->view('main_v', $tpl_ar);
    }
    
    function search( $page=1 ){
        $page = (int) $page; if (!$page) $page = 1;
        
        $searchStr   = $_GET['q'];
        $searchStr   = preg_replace("#[^a-z а-яё]#iu", ' ', $searchStr);
        
//        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $data_ar['news_page_list']      = $this->article_m->get_search_page_list($searchStr, $page, 15 );
        $data_ar['pager_ar']            = $this->article_m->get_search_pager_ar( $searchStr, $page, 15, 4);
        $data_ar['page_nmbr']           = $page;
        
        if (!$data_ar['news_page_list'])
            $data_ar['news_page_list'] = NULL; #show_404();
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat(1);
        $data_ar['footer_menu_list']    = $this->list_m->get_footer_cat_link();
        $data_ar['meta']['title']       = 'Поиск: &laquo;'.$searchStr.'&raquo;  - страница '.$page;
        
        $top_slider['articles']         = $this->article_m->get_top_slider_data(1, 8, 90, 0, 350, true, true); // 1.5 sec.
        
        $last_news['last_news']         = $this->article_m->get_last_left_news( 1, 50 );
        
        //<Rename for cat list view>
        $data_ar['cat_ar']['p_name']    = 'Поиск';
        $data_ar['cat_ar']['name']      = $searchStr;
        $data_ar['search_url_str']          = str_replace(' ', '+', $searchStr);
        //</Rename for cat list view>
        
        $tpl_ar                 = $data_ar; //== !!! tmp
        $tpl_ar['content']      = $this->load->view('page/cat_list_v', $data_ar, true);
        $tpl_ar['top_slider']   = $this->load->view('component/slider_top_v', $top_slider, true);
        $tpl_ar['right']        = $this->load->view('component/right_last_news_v', $last_news, true);

        $this->load->view('main_v', $tpl_ar);
    }

}