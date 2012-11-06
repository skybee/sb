<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class get_url
{
    
    function __construct() {
        
    }
    
    
    
    function tsn( $xml_str )
    {
        $xml = simplexml_load_string( $xml_str );
        
        echo '<pre>';
        print_r($xml->channel->item[0]);
//        print_r($xml->channel);
        echo '</pre>';
        
        $result_ar = array();
        
        foreach ($xml->channel->item as $news) 
        {
            $news = (array)$news;
            
            $category = 'N/A';
            
            if( isset($news['category']) )
            {
                if( is_string( $news['category'] ) )
                    $category = $news['category'];
            }
            
            $result_ar[] = $category." / \t\t".$news['link']; 
            
        }
        
        echo '<pre>';
        print_r($result_ar);
        echo '</pre>';
    }
    
}