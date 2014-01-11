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
        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);
        $data_ar['mainpage_cat_list']   = $this->article_m->get_mainpage_cat_news($data_ar['second_menu_list']);
//        echo '<pre>'.print_r($data_ar,1).'</pre>';

        $tpl_ar = $data_ar; //== !!! tmp
        $tpl_ar['content']  = $this->load->view('component/main_latest_v', $data_ar, true);
        $tpl_ar['content'] .= $this->load->view('component/cat_listing_v', $data_ar, true);
        $tpl_ar['content'] .= $this->load->view('component/main_other_news_v', $data_ar, true);

        $this->load->view('main_v', $tpl_ar);
    }

    function document($cat_name, $s_cat_name, $url_id_name) {
        preg_match("#-(\d+)-(.+)#i", $url_id_name, $url_id_name_ar); //зазбор URL_name
        $doc_id = $url_id_name_ar[1];
        $doc_urlname = $url_id_name_ar[2];

        $data_ar['doc_data']            = $this->article_m->get_doc_data($doc_id);
        if (!$data_ar['doc_data'])
            show_404();
        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);


        $tpl_ar = $data_ar; //== !!! tmp

        $tpl_ar['content'] = $this->load->view('page/doc_v', $data_ar, true);
//        $tpl_ar['content']     .=  '<pre>'.print_r($data_ar,1).'</pre>';

        $this->load->view('main_v', $tpl_ar);
    }

    function cat_list($cat_name, $s_cat_name, $page = 1) {
        $page = (int) $page;
        if (!$page) $page = 1;

        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name($cat_name);
        $data_ar['s_cat_ar']            = $this->article_m->get_cat_data_from_url_name($s_cat_name);
        $data_ar['news_page_list']      = $this->article_m->get_page_list($data_ar['s_cat_ar']['id'], $page, 15);
        if (!$data_ar['news_page_list'])
            show_404();
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat($data_ar['main_cat_ar']['id']);

        $tpl_ar = $data_ar; //== !!! tmp

        $tpl_ar['content'] = $this->load->view('page/cat_list_v', $data_ar, true);
//        $tpl_ar['content']             .=  '<pre>'.print_r($data_ar,1).'</pre>';        

        $this->load->view('main_v', $tpl_ar);
    }

}