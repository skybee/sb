<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Main extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
        
        set_time_limit( 600 );
        
        $this->load->database();
//        $this->load->helper('parser/download');
        $this->load->helper('parser/simple_html_dom');
        $this->load->library('parser/rss_url_lib');
        $this->load->library('parser/parse_lib');
        $this->load->library('parser/news_parser_lib');
        $this->load->library('parser/parse_page_lib');
        $this->load->model('parser_m');
        
        unset( $this->parser_lib );
    }


    function index(){ echo 'index'; }
    
    
    
    function get_url_from_rss(){
        header("Content-type:text/html;Charset=utf-8");
        $url_ar = array(
                        'http://ru.tsn.ua/rss/',                                   //== CAT TRUE !--Good
                        'http://www.unn.com.ua/ru/rss/main_universal/',         //== CAT TRUE
                        //'http://gazeta.ua/export/rss/rss.xml',                  //== CAT !FALSE
                        'http://rss.unian.net/site/news_rus.rss',               //== CAT TRUE
                        'http://www.interfax.com.ua/rus/rss/',                  //== CAT TRUE
                        'http://www.segodnya.ua/xml/rss.html',                  //== CAT TRUE !--Good
                        'http://delo.ua/news/rss/index.xml',                    //== CAT TRUE
                        'http://focus.ua/rss/ru.xml',                           //== CAT TRUE
                        'http://news.liga.net/all/rss.xml',                     //== CAT !FALSE
                        //-! 'http://biz.liga.net/all/rss.xml',                      //== CAT TRUE
                        //-! 'http://finance.liga.net/export/all.xml',               //== CAT TRUE
                        //-! 'http://blog.liga.net/rss.aspx',                        //== CAT !FALSE            
                        'http://isport.ua/hnd/rss.ashx?image=0',                 //== CAT TRUE
                        'http://k.img.com.ua/rss/ru/news.xml'                   //== !--Good
                        );
        
        foreach ($url_ar as $url)
        {
            echo "<b>{$url}</b> <br /> \n\n";
            $xml_str = $this->news_parser_lib->down_with_curl($url);
            
            $news_ar = $this->rss_url_lib->get_url( $xml_str );
            
            if( is_array($news_ar) && count($news_ar) > 0 ){
                foreach( $news_ar as $news){
                    $cat_id = $this->rss_url_lib->get_cat_id( $url, $news['url'], $news['category'] );
                    if( $cat_id )
                        $this->parser_m->add_to_scanlist( $news['url'], $cat_id );
                }
            }
            
            
            echo "<pre>".print_r( $news_ar, 1 )."</pre>";
        }
    }
    
    function parse_news( $cnt_news = 100 ){
        header("Content-type:text/plain;Charset=utf-8");
        
        $parse_list = $this->parser_m->get_news_url_to_parse( $cnt_news );
        
        if( !$parse_list ){  echo "ERROR Отсутствуют URL для сканирования"; return; }
        
        foreach( $parse_list as $news_ar ){
            
//            $news_ar['url'] = 'http://unn.com.ua/ru/news/1037256-ukrainskiy-svyatoy-nikolay-budet-privetstvovat-rossiyskogo-deda-moroza-s-dnem-rogedeniya';
            
            $html = $this->news_parser_lib->down_with_curl( $news_ar['url'] );
            if( empty($html) ) continue;
            
            $host                           = $this->news_parser_lib->get_donor_url( $news_ar['url'] );
            $insert_data                    = $this->parse_page_lib->get_data( $html, $host);
            $insert_data['scan_url_id']     = $news_ar['id'];
            $insert_data['url']             = $news_ar['url'];
            $insert_data['cat_id']          = $news_ar['cat_id'];
            $insert_data['date']            = date("Y-m-d H:i:s");
            
            if( !isset($insert_data['title']) || empty($insert_data['title']) ) continue;
            
//            echo "\n\n<<<\n";
            echo "\n".$news_ar['url']."\n";
//            print_r($insert_data);

            $this->news_parser_lib->insert_news( $insert_data );
            $this->parser_m->set_url_scaning( $news_ar['id'] );
//            echo "\n>>>";
            
            flush();
        }    
    }
}
