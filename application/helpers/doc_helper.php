<?php if (!defined('BASEPATH')) exit('No direct script access allowed');





function getDescriptionFromText( string &$text, integer $length ){
}


function botRelNofollow(){
    
//    $ip = $_SERVER['HTTP_X_REAL_IP'];
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

    $newsUrl    = "/{$likeList[0]['full_uri']}-{$likeList[0]['id']}-{$likeList[0]['url_name']}/";

    $search     = "/([\s\S]{500}(<\/p>|<br.{0,2}>\s*<br.{0,2}>))/i";
    $replace    = "$1 \n".'<h2 class="look_more_hdn" rel="'.$newsUrl.'"><span>Смотрите также:</span> '.$likeList[0]['title']."</h2>\n";
    $replace   .= '<p class="look_more_hdn">'."\n";

    if(!empty($likeList[0]['main_img'])){
        $replace .= '<img src="/upload/images/small/'.$likeList[0]['main_img'].'" alt="'.$likeList[0]['title'].'" onerror="imgError(this);" />'."\n";
    }
    $replace   .= $likeList[0]['text']."\n</p>\n";

    $text = preg_replace($search, $replace, $text, 1);

    return $text;
}