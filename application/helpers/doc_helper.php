<?php if (!defined('BASEPATH')) exit('No direct script access allowed');





function getDescriptionFromText( string &$text, integer $length ){
}


function botRelNofollow(){
    
    $ip = $_SERVER['REMOTE_ADDR'];
    $pattern = "#^(127\.0|66\.249|203\.208|72\.14|209\.85)\.\d{1,3}\.\d{1,3}#i";
 
    $rel = '';
    
    if( preg_match($pattern, $ip) ){
        $rel = ' rel="nofollow" ';
    }
    
    return $rel;
}