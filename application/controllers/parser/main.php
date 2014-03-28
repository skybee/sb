<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
        
        set_time_limit( 60 ); 
//        exit('123');
        
        $this->load->database();
//        $this->load->helper('parser/download');
        $this->load->helper('parser/simple_html_dom');
        $this->load->library('parser/rss_url_lib');
        $this->load->library('parser/parse_lib');
        $this->load->library('parser/news_parser_lib');
        $this->load->library('parser/parse_page_lib');
        $this->load->model('parser_m');
        $this->load->model('donor_m');
        
        unset( $this->parser_lib );
    }

    function index(){ echo 'index'; }
    
    function get_url_from_rss(){
        header("Content-type:text/html;Charset=utf-8");
        
        if( $this->single_work( 2, 'get_url_from_rss') == false ) exit('The work temporary Lock');
        
        $urls = array(
                        array('url'=>'http://rss.unian.net/site/news_rus.rss',  'host'=>'unian.net'),           //== CAT TRUE        
                        array('url'=>'http://focus.ua/rss/ru.xml',              'host'=>'focus.ua'),
                        #array('url'=>'http://news.liga.net/all/rss.xml',        'host'=>'liga.net'),
                        array('url'=>'http://ru.tsn.ua/rss/',                   'host'=>'tsn.ua'),              //== CAT TRUE !--Good
                        array('url'=>'http://k.img.com.ua/rss/ru/news.xml',     'host'=>'korrespondent.net'),   //== !--Good
                        array('url'=>'http://www.segodnya.ua/xml/rss.html',     'host'=>'segodnya.ua'),         //== CAT TRUE !--Good
                        array('url'=>'http://www.unn.com.ua/rss/news_ru.xml',   'host'=>'unn.com.ua')           //== CAT TRUE
//                       http://rian.com.ua/
//                        'http://gazeta.ua/export/rss/rss.xml',                  //== CAT !FALSE !!!OLD
//                        'http://www.interfax.com.ua/rus/rss/',                  //== CAT TRUE
//                        'http://delo.ua/news/rss/index.xml',                    //== CAT TRUE
//                        //-! 'http://biz.liga.net/all/rss.xml',                      //== CAT TRUE
//                        //-! 'http://finance.liga.net/export/all.xml',               //== CAT TRUE
//                        //-! 'http://blog.liga.net/rss.aspx',                        //== CAT !FALSE            
                        );
        
        foreach ($urls as $urlAr)
        {
            echo "<b>{$urlAr['url']}</b> <br /> \n\n";
            $xml_str = $this->news_parser_lib->down_with_curl($urlAr['url']);
            
            $news_ar = $this->rss_url_lib->get_url( $xml_str );
            
            if( is_array($news_ar) && count($news_ar) > 0 ){
                foreach( $news_ar as $news){
                    $cat_id     = $this->rss_url_lib->get_cat_id( $urlAr['url'], $news['url'], $news['category'] );
                    $donor_id   = $this->donor_m->getDonorIdFromHost( $urlAr['host'] );
                    
                    if( !$donor_id ) echo "<br />! No Donor ID {$urlAr['url']}<br />";
                    if( $cat_id )
                        $this->parser_m->add_to_scanlist( $news['url'], $cat_id, $donor_id );
                }
            }
            
            
            echo "<pre>".print_r( $news_ar, 1 )."</pre>";
        }
    }
    
    function parse_news( $cnt_news = 1 ){
        header("Content-type:text/html;Charset=utf-8");
        
        if( $this->single_work( 2, 'parse_news') == false ) exit('The work temporary Lock');
        
        $parse_list = $this->parser_m->get_news_url_to_parse( $cnt_news );
        
        if( count($parse_list) < 1 ){  echo "ERROR Отсутствуют URL для сканирования"; return; }
        
        $i=1;
        foreach( $parse_list as $news_ar ){
            
//            $news_ar['url'] = 'http://ru.tsn.ua/politika/avakov-nazval-pravyy-sektor-banditami-i-poobeschal-prinyat-vyzov-356930.html';  
        
            $html = $this->news_parser_lib->down_with_curl( $news_ar['url'] );
            
            if( empty($html) ){ 
                $this->parser_m->set_url_scaning( $news_ar['id'] );
                continue;
            }
            
//            $host                           = $this->news_parser_lib->get_donor_url( $news_ar['url'] );
            $host                           = $news_ar['host'];
            $insert_data                    = $this->parse_page_lib->get_data( $html, $host);
            $insert_data['scan_url_id']     = $news_ar['id'];
            $insert_data['url']             = $news_ar['url'];
            $insert_data['cat_id']          = $news_ar['cat_id'];
            $insert_data['donor_id']        = $news_ar['donor_id'];
            $insert_data['date']            = date("Y-m-d H:i:s");
            
            echo "<br />\n$i - <i>".$news_ar['url']."</i><br />\n";
           
//            echo '<pre>'.print_r($insert_data,1).'</pre>';

            $this->news_parser_lib->insert_news( $insert_data );
            $this->parser_m->set_url_scaning( $news_ar['id'] );
            
            flush(); $i++;
        }    
    }
    
    function single_work( $minutes, $fname = 'null' ){
        $lockFile   = 'lock/'.$fname.'.lock';
        $lockTime   = time() + (60*$minutes);
        
        
        if( is_file($lockFile) ){
            $fileTimeLock   = file_get_contents($lockFile);
            $fileTimeLock   = (int) $fileTimeLock;
            
            if( time() < $fileTimeLock ) return FALSE;
        }
            
        file_put_contents($lockFile, $lockTime );
        
        return TRUE;
    }
    
    function tmp_clean_doubles(){
        set_time_limit(1200);
        $doubleIdAr = array();        
        $sql     = "SELECT `id`, `title` FROM `article` ";

        $query = $this->db->query($sql);

        foreach($query->result_array() as $row){
            $allAricles[$row['id']] = $row;
        }

        foreach( $allAricles as $artticleData ){
            
            if( in_array($artticleData['id'], $doubleIdAr) ) continue;
            
            $artticleData['title'] = mysql_real_escape_string($artticleData['title']);
            $sql2    = "SELECT `id`, `title` FROM `article` WHERE `title` =  '{$artticleData['title']}' AND `id` != '{$artticleData['id']}' ";
            
            echo $artticleData['id'].'-'.$artticleData['title'].'<br />';
            
            $query2 = $this->db->query( $sql2 );

            foreach($query2->result_array() as $row){
                $doubleIdAr[] = $row['id'];
                echo '---'.$row['id'].'--'.$row['title'].'<br />';
            }
        }
    }
}
