<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class video_replace_lib{
            
            
    function __construct(){
        
    }
    
    
    private function get_video_pattern(){
        $paterns['youtube']['pattern']  = "#<iframe[\s\S]+?['\"]http://www.youtube.com/embed/(\w+)['\"][\s\S]+?</iframe>#i";
        $paterns['youtube']['replace']  = "<iframe width=\"616\" height=\"346\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>";
        
        $paterns['tsn']['pattern']      = "#<script[\s\S]+?addVariable\('media_id', '([\d]+)'\);[\s\S]+?</script>#i";
        $paterns['tsn']['replace']      = "<embed src='http://ru.tsn.ua/bin/player/embed.php/$1' type='application/x-shockwave-flash' width='616' height='510' allowfullscreen='true' allowscriptaccess='always'></embed>";
        
        return $paterns;
    }
    
    
    static function get_video_tags( $html ){
        $paterns = self::get_video_pattern();
        
        foreach ( $paterns as $patern ){
            $replace = parse_lib::comment_tags("<p style='text-align:center;'>{$patern['replace']}</p>");
            $html = preg_replace($patern['pattern'], $replace, $html );
        }
        
        return $html;
    }
    
    
}