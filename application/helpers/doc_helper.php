<?php if (!defined('BASEPATH')) exit('No direct script access allowed');





function getDescriptionFromText( string &$text, integer $length ){
}


function botRelNofollow(){
    
//    $ip = $_SERVER['REMOTE_ADDR'];
//    $pattern    = "#^(127\.0|66\.249|203\.208|72\.14|209\.85)\.\d{1,3}\.\d{1,3}#i";
    $pattern = "#(Yandex|google|rogerbot|Exabot|MJ12bot|DotBot|Gigabot|AhrefsBot|Yahoo|msnbot|bingbot|SolomonoBot|SemrushBot|Blekkobot)#i";
 
    $rel = '';
    
//    if( preg_match($pattern, $ip) ){
//        $rel = ' rel="nofollow" ';
//    }
    
    if( preg_match( $pattern, $_SERVER['HTTP_USER_AGENT']) ){
        $rel = ' rel="nofollow" ';
    }
    
    return $rel;
}

function serpDataFromJson($json)
{
    if(empty($json)){
        return false;
    }

    $data = json_decode($json, true);

    return $data;
}

function insertLikeArticleInTxt($text, $likeList)
{
    if(!isset($likeList[0])){
        return $text;
    }

    $search     = "/([\s\S]{20,200}<\/p>)/i";
    $replace = "$1 \n".'<h2 class="look_more_hdn"><span>Смотрите также:</span> '.$likeList[0]['title']."</h2>\n".'<p class="look_more_hdn">'."\n".$likeList[0]['text']."\n</p>\n";

    $text = preg_replace($search, $replace, $text, 1);

    return $text;
}