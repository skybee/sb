<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class main extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('list_m');
        $this->load->model('article_m');
        
        
    }
    
    function index( $cat_name = 'news' ){   
        
        $data_ar['main_cat_ar']         = $this->article_m->get_cat_data_from_url_name( $cat_name );
//        echo '<pre>'.print_r($data_ar,1).'</pre>';
        $data_ar['main_menu_list']      = $this->list_m->get_cat(0);
        $data_ar['second_menu_list']    = $this->list_m->get_cat( $data_ar['main_cat_ar']['id'] );
        
        
        $this->load->view('main_v', $data_ar);
    }
    
    function tmp(){ echo '1231';}
}