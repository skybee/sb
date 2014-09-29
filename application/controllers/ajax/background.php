<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 


class background extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('article_m');
    }
    
    function set_top(){
        if( $_SERVER["REQUEST_METHOD"] != 'POST' ) exit('! Wrong Method');
        
        $id     = (int) $_POST['docId'];
        $ip     = $_SERVER['REMOTE_ADDR'];
        $ref    = $_POST['ref'];
        $rank   = 1;
        
        if( preg_match("#(google|yandex|mail.ru|Nigma|Rambler|Ukr.net|Bing)#i", $ref) )
            $rank = 3;  
        
        $this->article_m->set_article_rank($id, $ip, $rank);
    }
}