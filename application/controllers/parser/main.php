<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Main extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('parser/download');
        $this->load->library('parser/rss_url');
        $this->load->helper('parser/simple_html_dom');
        
        set_time_limit( 300 );
        
    }


    function index(){ echo 'index'; }
    
    
    
    function get_url_from_rss(){
        header("Content-type:text/html;Charset=utf-8");
        $url_ar = array(
                        'http://tsn.ua/rss/',                                   //== CAT TRUE
                        'http://www.unn.com.ua/ru/rss/main_universal/',         //== CAT TRUE
                        //'http://gazeta.ua/export/rss/rss.xml',                  //== CAT !FALSE
                        'http://rss.unian.net/site/news_ukr.rss',               //== CAT TRUE
                        'http://www.interfax.com.ua/rus/rss/',                  //== CAT TRUE
                        'http://www.segodnya.ua/xml/rss.html',                  //== CAT TRUE
                        'http://delo.ua/news/rss/index.xml',                    //== CAT TRUE
                        'http://focus.ua/rss/ru.xml',                           //== CAT TRUE
                        'http://news.liga.net/all/rss.xml',                     //== CAT !FALSE
                        //-! 'http://biz.liga.net/all/rss.xml',                      //== CAT TRUE
                        //-! 'http://finance.liga.net/export/all.xml',               //== CAT TRUE
                        //-! 'http://blog.liga.net/rss.aspx',                        //== CAT !FALSE            
                        'http://zn.ua/export.rss',                              //== CAT !FALSE
                        'http://www.rbc.ua/static/rss/topnews.rus.rss.xml',     //== CAT TRUE
                        'http://isport.ua/hnd/rss.ashx?image=0',                 //== CAT TRUE
                        'http://k.img.com.ua/rss/ru/news.xml'
                        );
        
        foreach ($url_ar as $url)
        {
            echo "<b>{$url}</b> <br /> \n\n";
            $xml_str = down_with_curl($url);
            
            $news_ar = $this->rss_url->get_url( $xml_str );
            
            
            echo "<pre>".print_r( $news_ar, 1 )."</pre>";
        }
    }
}
