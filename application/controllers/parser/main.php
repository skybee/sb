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
        $this->load->library('parser/video_replace_lib');
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
        
//        echo '<pre>'.print_r($parse_list,1).'</pre>'; exit();
        
        if( $parse_list == null ){  echo "ERROR Отсутствуют URL для сканирования"; return; }
        
        $i=1;
        foreach( $parse_list as $news_ar ){
            $this->parser_m->set_url_scaning( $news_ar['id'] );
			
            #<for test>
//            $news_ar['url']     = 'http://4pda.ru/2010/07/11/26480/';  
//            $news_ar['host']    = '4pda.ru';
            #</for test>
            
            $html = $this->news_parser_lib->down_with_curl( $news_ar['url'] );
            
            if( empty($html) ){ 
                $this->parser_m->set_url_scaning( $news_ar['id'] );
                continue;
            }
            
//            $host                           = $this->news_parser_lib->get_donor_url( $news_ar['url'] );
            $insert_data                    = $this->parse_page_lib->get_data( $html, $news_ar );
            if( is_array($insert_data) == false ) continue;
            $insert_data['scan_url_id']     = $news_ar['id'];
            $insert_data['url']             = $news_ar['url'];
            $insert_data['cat_id']          = $news_ar['cat_id'];
            $insert_data['donor_id']        = $news_ar['donor_id'];
            
//            if( !isset($insert_data['date']) || $insert_data['date'] == false ){
                $insert_data['date']            = date("Y-m-d H:i:s");
//            }
            
            if( !empty($news_ar['main_img_url']) && empty($insert_data['img']) ){ 
                $insert_data['img']         = $news_ar['main_img_url'];
            }    
                
            
            echo "<br />\n$i - <i>".$news_ar['url']."</i><br />\n";
            
//            echo '<pre>'.print_r($news_ar,1).'</pre>';
//            echo '<pre>'.print_r($insert_data,1).'</pre>';

            $this->news_parser_lib->insert_news( $insert_data );
    
            flush(); $i++;
        }    
    }
    
    function get_articles_url(){
        if( $this->single_work( 2, 'parse_articles_url') == false ) exit('The work temporary Lock');
        
        $this->load->library('parser/articles_lib');
        
        $scanUrl    = $this->donor_m->getScanPageListUrl();
        
        $this->donor_m->updScanUrlTime( $scanUrl['id'] );
        
        echo '<pre>'.print_r( $scanUrl, 1 ).'</pre>';
        
//        $scanUrl['url']         = 'http://compulenta.computerra.ru/tehnika/internet/';
//        $scanUrl['host']        = 'compulenta.computerra.ru';
        
        $this->articles_lib->setScanUrl( $scanUrl['url'] );
        $data = $this->articles_lib->getData( $scanUrl['host'] );
        
        echo '<pre>'.print_r( $data, 1 ).'</pre>';
        
        if( $data == null ) exit("No URLs to add");
        
        foreach( $data as $urlAr ){
            $this->parser_m->add_to_scanlist( $urlAr['url'], $scanUrl['cat_id'], $scanUrl['donor_id'], $urlAr['img'] );
        }
    }
    
    
    function _get_old_articles_url(){
        $this->load->library('parser/articles_lib');
        
        $countPage = 40;
        
        for($page=1; $page <= $countPage; $page++){
            
//            if( $page == 1 ){
//            $scanUrl['url']         = 'http://compulenta.computerra.ru/tehnika/computers/';}
//            else{
//            $scanUrl['url']         = 'http://compulenta.computerra.ru/tehnika/computers/?PAGEN_1='.$page;}
//            $scanUrl['host']        = 'compulenta.computerra.ru';
//            $scanUrl['donor_id']    = 8;
//            $scanUrl['cat_id']      = 20;
            
            if( $page == 1 ){
                $scanUrl['url']     = 'http://habrahabr.ru/hub/hardware/';
            }
            else{
                $scanUrl['url']     = 'http://habrahabr.ru/hub/hardware/page'.$page.'/';
            }
            $scanUrl['host']        = 'habrahabr.ru';
            $scanUrl['donor_id']    = 9;
            $scanUrl['cat_id']      = 20;
            
//            if( $page == 1 ){
//                $scanUrl['url']     = 'http://itc.ua/tag/notebook/';
//            }
//            else{
//                $scanUrl['url']     = 'http://itc.ua/tag/notebook/page/'.$page.'/';
//            }
//            $scanUrl['host']        = 'itc.ua';
//            $scanUrl['donor_id']    = 10;
//            $scanUrl['cat_id']      = 20;
            
//            if( $page == 1 ){
//                $scanUrl['url']     = 'http://4pda.ru/news/';
//            }
//            else{
//                $scanUrl['url']     = 'http://4pda.ru/news/page/'.$page.'/';
//            }
//            $scanUrl['host']        = '4pda.ru';
//            $scanUrl['donor_id']    = 12;
//            $scanUrl['cat_id']      = 22;

            $this->articles_lib->setScanUrl( $scanUrl['url'] );
            $data = $this->articles_lib->getData( $scanUrl['host'] );

            echo '<br />-------Page '.$page.' scaning-------<br />';
            echo '<pre>'.print_r( $data, 1 ).'</pre>';
            flush();

            if( $data == null ) exit("No URLs to add");

            foreach( $data as $urlAr ){
                $this->parser_m->add_to_scanlist( $urlAr['url'], $scanUrl['cat_id'], $scanUrl['donor_id'], $urlAr['img'] );
            }
            sleep(5);
        }
    }
    
    private function single_work( $minutes, $fname = 'null' ){
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
    
    private function _tmp_clean_doubles(){
        exit('lock method');
        set_time_limit(1800);
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
                echo '---Удаление--'.$row['id'].'--'.$row['title'].'<br />';
                $query3 = $this->db->query("SELECT `main_img` FROM `article` WHERE `id` = '{$row['id']}' ");
                $rowImg     = $query3->row_array();
                $mainImg    = $rowImg['main_img'];
                if( !empty($mainImg) ){
                    if( is_file( 'upload/images/medium/'.$mainImg ) )
                        if( unlink('upload/images/medium/'.$mainImg) ) echo '---- medium img удалена<br />';
                    if( is_file( 'upload/images/real/'.$mainImg ) )
                        if( unlink('upload/images/real/'.$mainImg) ) echo '---- real img удалена<br />';
                    if( is_file( 'upload/images/small/'.$mainImg ) )
                        if( unlink('upload/images/small/'.$mainImg) ) echo '---- small img удалена<br />';
                }
                if( $this->db->query("DELETE FROM `article`  WHERE `id` = '{$row['id']}' ") ) echo '----- новость удалена<br />';
                if( $this->db->query("DELETE FROM `shingles` WHERE `article_id` = '{$row['id']}' ") )echo '----- шинглы удалены<br />';
            }
        }
    }
}
