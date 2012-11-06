<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Main extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('parser/download');
        $this->load->library('parser/get_url');
        
        set_time_limit( 300 );
        
    }


    function index(){ echo 'Hello'; }
    
    
    
    function tsn()
    {
        $url_ar = array('http://tsn.ua/rss/',                                   //== CAT TRUE
                        'http://www.unn.com.ua/ua/rss/main_universal/',         //== CAT TRUE
                        'http://gazeta.ua/export/rss/rss.xml',                  //== CAT !FALSE
                        'http://rss.unian.net/site/news_ukr.rss',               //== CAT TRUE
                        'http://k.img.com.ua/rss/ru/news.xml',                  //== CAT TRUE
                        'http://www.interfax.com.ua/rus/rss/',                  //== CAT TRUE
                        'http://pravda.in.ua/index.php?format=feed&type=rss',   //== CAT !FALSE
                        'http://www.segodnya.ua/xml/rss.html',                  //== CAT TRUE
                        'http://delo.ua/news/rss/index.xml',                    //== CAT TRUE
                        'http://focus.ua/rss/ru.xml',                           //== CAT TRUE
                        'http://news.liga.net/all/rss.xml',                     //== CAT !FALSE
                        'http://biz.liga.net/all/rss.xml',                      //== CAT TRUE
                        'http://finance.liga.net/export/all.xml',               //== CAT TRUE
                        'http://blog.liga.net/rss.aspx',                        //== CAT !FALSE            
                        'http://zn.ua/export.rss',                              //== CAT !FALSE
                        'http://www.rbc.ua/static/rss/topnews.rus.rss.xml',     //== CAT TRUE
                        'http://isport.ua/hnd/rss.ashx?image=0'                 //== CAT TRUE
                        );
        
        foreach ($url_ar as $url)
        {
            echo "<b>{$url}</b><br />";
            $xml_str = down_with_curl($url);

            $this->get_url->tsn( $xml_str );
        }
    }
}
