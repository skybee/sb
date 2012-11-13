<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rss_url
{
    
    function __construct() {
        
    }
    
    
    
    function get_url( $xml_str )
    {
//        if( is_object($var) )
        $xml = simplexml_load_string( $xml_str );
        
//        echo '<pre>';
//        print_r($xml->channel->item[0]);
////        print_r($xml->channel);
//        echo '</pre>';
        
        $result_ar = array();
        
        foreach ($xml->channel->item as $news) 
        {
            $news = (array) $news;
            
            $category = 'N/A';
            
            if( isset($news['category']) && is_string( $news['category'] ) )
                $category = $news['category'];
            
            $result_ar[] = array( 'category' => $category, 'url' => $news['link'] );
        }
        
        return $result_ar;
    }
    
    function get_cat_id( $donor_url, $url, $cat = false ){
        
        $cat_ar['news']['ukraine']      = 4;
        $cat_ar['news']['politics']     = 5;
        $cat_ar['news']['finance']      = 6;
        $cat_ar['news']['world']        = 7;
        $cat_ar['news']['sport']        = 8;
        $cat_ar['news']['science']      = 9;
        $cat_ar['news']['health']       = 10;
        $cat_ar['news']['showbiz']      = 11;
        
        $cat_id = FALSE;
        
        if( $donor_url == 'http://tsn.ua/rss/' ){
            if( stripos($url, 'tsn.ua/sport') )     $cat_id = $cat_ar['news']['sport'];
            if( stripos($url, 'tsn.ua/svit') )      $cat_id = $cat_ar['news']['world'];
            if( stripos($url, 'tsn.ua/ukrayina') )  $cat_id = $cat_ar['news']['ukraine'];
            if( stripos($url, 'tsn.ua/groshi') )    $cat_id = $cat_ar['news']['finance'];
            if( stripos($url, 'tsn.ua/nauka_it') )  $cat_id = $cat_ar['news']['science'];
            if( stripos($url, 'tsn.ua/politika') )  $cat_id = $cat_ar['news']['politics'];
            if( stripos($url, 'tsn.ua/glamur/') )   $cat_id = $cat_ar['news']['showbiz'];
        }
        elseif( $donor_url == 'http://www.unn.com.ua/ru/rss/main_universal/' ){
            if( stripos($cat, 'events') )       $cat_id = $cat_ar['news']['ukraine'];
            if( stripos($cat, 'agro') )         $cat_id = $cat_ar['news']['ukraine'];
            if( stripos($cat, 'army') )         $cat_id = $cat_ar['news']['ukraine'];
            if( stripos($cat, 'crime') )        $cat_id = $cat_ar['news']['ukraine'];
            if( stripos($cat, 'good') )         $cat_id = $cat_ar['news']['ukraine'];
            if( stripos($cat, 'politic') )      $cat_id = $cat_ar['news']['politics'];
            if( stripos($cat, 'zovnishnya') )   $cat_id = $cat_ar['news']['politics'];
            if( stripos($cat, 'economika') )    $cat_id = $cat_ar['news']['finance'];
            if( stripos($cat, 'techno') )       $cat_id = $cat_ar['news']['science'];
            if( stripos($cat, 'abroad') )       $cat_id = $cat_ar['news']['world'];
            if( stripos($cat, 'sport') )        $cat_id = $cat_ar['news']['sport'];
            if( stripos($cat, 'health') )       $cat_id = $cat_ar['news']['health'];
            if( stripos($cat, 'culture') )      $cat_id = $cat_ar['news']['showbiz'];
        }
        elseif( $donor_url == 'http://rss.unian.net/site/news_ukr.rss' ){
            if( stripos($cat, 'Політика') )     $cat_id = $cat_ar['news']['politics'];
            if( stripos($cat, 'Україна') )      $cat_id = $cat_ar['news']['ukraine'];
            if( stripos($cat, 'Економіка') )    $cat_id = $cat_ar['news']['finance'];
            if( stripos($cat, 'Світ') )         $cat_id = $cat_ar['news']['world'];
            if( stripos($cat, "Здоров'я") )     $cat_id = $cat_ar['news']['health']; 
            if( stripos($cat, 'Спорт') )        $cat_id = $cat_ar['news']['sport'];
        }
        elseif( $donor_url == 'http://www.interfax.com.ua/rus/rss/' ){
            if( stripos($url, 'rus/eco') )      $cat_id = $cat_ar['news']['finance'];
            if( stripos($url, 'rus/main') )     $cat_id = $cat_ar['news']['ukraine'];
            if( stripos($url, 'rus/pol') )      $cat_id = $cat_ar['news']['politics'];
        }
        elseif( $donor_url == 'http://www.segodnya.ua/xml/rss.html' ){
            if( stripos($url, 'sport.segodnya.ua') )    $cat_id = $cat_ar['news']['sport'];
            if( stripos($url, 'ua/culture') )           $cat_id = $cat_ar['news']['showbiz'];
            if( stripos($url, 'ua/politics') )          $cat_id = $cat_ar['news']['politics'];
            if( stripos($url, 'ua/economics') )         $cat_id = $cat_ar['news']['finance'];
            if( stripos($url, 'ua/science') )           $cat_id = $cat_ar['news']['science'];
        }
        elseif( $donor_url == 'http://delo.ua/news/rss/index.xml' ){
            if( stripos($cat, 'Политика') )     $cat_id = $cat_ar['news']['politics'];
            if( stripos($cat, 'Компании') )     $cat_id = $cat_ar['news']['finance'];
            if( stripos($cat, 'Экономика') )    $cat_id = $cat_ar['news']['finance'];
            if( stripos($cat, 'Рынки') )        $cat_id = $cat_ar['news']['finance'];
            if( stripos($cat, 'Банки') )        $cat_id = $cat_ar['news']['finance'];
            if( stripos($cat, 'Общество') )     $cat_id = $cat_ar['news']['ukraine'];
        }
        elseif( $donor_url == 'http://focus.ua/rss/ru.xml' ){
            if( stripos($url, 'ua/economy') )   $cat_id = $cat_ar['news']['finance'];
            if( stripos($url, 'ua/foreign') )   $cat_id = $cat_ar['news']['world'];
            if( stripos($url, 'ua/sport') )     $cat_id = $cat_ar['news']['sport'];
            if( stripos($url, 'ua/health') )    $cat_id = $cat_ar['news']['health'];
            if( stripos($url, 'ua/politics') )  $cat_id = $cat_ar['news']['politics'];
            if( stripos($url, 'ua/society') )   $cat_id = $cat_ar['news']['ukraine'];
        }
        elseif( $donor_url == 'http://news.liga.net/all/rss.xml' ){
            if( stripos($url, 'news/culture') )     $cat_id = $cat_ar['news']['showbiz'];
            if( stripos($url, '/politics/') )       $cat_id = $cat_ar['news']['politics'];
            if( stripos($url, 'foreign/world') )    $cat_id = $cat_ar['news']['world'];
            if( stripos($url, 'news/sport') )       $cat_id = $cat_ar['news']['sport'];
            if( stripos($url, 'news/society') )     $cat_id = $cat_ar['news']['ukraine'];
            if( stripos($url, 'news/health') )      $cat_id = $cat_ar['news']['health'];
        }    
            
    }
    
}