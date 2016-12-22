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
    
    if(count($data)<1)
    {
        $json = stripcslashes($json);
        $data = json_decode($json, true); 
    }
    
    return $data;
}

function insertLikeArticleInTxt($text, $likeList)
{   
    if(!isset($likeList[0])){
        return $text; 
    }

//    echo $likeList[0]['text'];
    
    $newsUrl    = "/{$likeList[0]['full_uri']}-{$likeList[0]['id']}-{$likeList[0]['url_name']}/";
    
    $likeTitle  = str_replace('$', '&dollar;', $likeList[0]['title']);
    $likeText   = str_replace('$', '&dollar;', $likeList[0]['text']);

    $search     = "/([\s\S]{500}(<\/p>|<br.{0,2}>\s*<br.{0,2}>))/i";
    $replace    = "$1 \n "
                . '<style> '
                    . '@media(max-width: 980px){ #left div.single div.mobile-in-txt .mobile-intxt-grey{width: 468px; height: 60px;} } '
                    . '@media(max-width: 540px){ #left div.single div.mobile-in-txt .mobile-intxt-grey{width: 320px; height: 100px;} } '
                    . '@media(max-width: 340px){ #left div.single div.mobile-in-txt .mobile-intxt-grey{width: 234px; height: 60px;} } '
                . '</style> '
                .'<h2 class="look_more_hdn" rel="'.$newsUrl.'"><span>Смотрите также:</span> '.$likeTitle
                    ."<span class=\"gAd\" data=\"mobile greyInTxt\"></span> \n  "
                . "</h2>\n";
    
    $replace   .= '<p class="look_more_hdn">'."\n";

    if(!empty($likeList[0]['main_img'])){
        $replace .= '<img src="/upload/images/small/'.$likeList[0]['main_img'].'" alt="'.$likeTitle.'" onerror="imgError(this);" />'."\n";
    }
    $replace   .= $likeText."\n "
            . "<span style=\"display:block; margin-top:15px;\"> \n"
            . "<span class=\"gAd\" data=\"content greyInTxt\"></span> \n "
            . "</span> \n"
            . "</p>\n";

    $text = preg_replace($search, $replace, $text, 1);

    return $text;
}

function addResponsiveVideoTag($text){
    $pattern = "#(<(iframe|embed)[\s\S]+?(youtube.com|vimeo.com|tsn.ua)[\s\S]+?</(iframe|embed)>)#i";
    
    $text = preg_replace($pattern, "<div class=\"respon_video\">$1</div>", $text);
    
    return $text;
}


function cctv_article_linkator( $text ){ 
    
    $pattern_list['/category/CCTV-Cameras/']                        = "#(купол[а-я]*|уличн[а-я]+|поворотн[а-я]+|наружн[а-я]+|)\s*(ip-|cctv-|ptz-|)(теле|видео|)камер[а-я]*\s*((видео|)наблюден[а-я]+|)#ui";
    $pattern_list['/category/CCTV-Kits/']                           = "#комплект.{1,20}видеонаблюден[а-я]+#ui";
    $pattern_list['/']                                              = "#(устан[а-я]*|монт[а-я]*|инстал[а-я]*)\s*(систем.{0,20}|.{0,20}камер[а-я]*|)\s*видеонаблюден[а-я]+#ui";
    $pattern_list['/']                                              = "#(систем.{1,20}|)видеонаблюден[а-я]+#ui";
//    $pattern_list['/category/avto_videoregistratory/']              = "#авто(мобил[а-я]*|)\s*(видео|)регистр[а-я]*#ui";
    $pattern_list['/category/CCTV-DVR/']                            = "#(цифров[а-я]*|сетев[а-я]*|ip-|)\s*видеорегистр[а-я]*#ui";
    $pattern_list['/category/Intercom/']                            = "#(устан[а-я]*|монт[а-я]*)\s*(видео|аудио|)\s*домофон[а-я]*\s*(.{0,20}(дом[а-я]*|офис[а-я]*|квартир[а-я]*|commax)|)#ui";
    $pattern_list['/category/Intercom/']                            = "#(панель|монитор|)\s*(видео|аудио|)\s*домофон[а-я]*\s*(.{0,20}(дом[а-я]*|офис[а-я]*|квартир[а-я]*|commax)|)#ui";
//    $pattern_list['/category/ohranna_pozharnaja_signalizacija/']    = "#(систем[а-я]*.{0,15}|)\s*(охран[а-я]*|(охран[а-я]*.{0,3}|)пожар[а-я]*|)\s*сигнализ[а-я]*\s*(.{0,20}(дом[а-я]*|офис[а-я]*|квартир[а-я]*|магазин[а-я]*|склад[а-я]*)|)#ui";
//    $pattern_list['/category/kontrol_dostupa/']                     = "#(систем[а-я]*.{0,15}|)\s*контр[а-я]*\s*(.{0,10}управ[а-я]*|)\s*доступ[а-я]*#ui";
    
    
    $key = 1;
    foreach( $pattern_list as $url => $pattern ){
        if( !empty($pattern) ){
            if( preg_match($pattern, $text, $keyword_ar ) ){
//                echo '<pre>'.print_r($keyword_ar[0],1).'</pre>';
                $replace_key = "#$key#";
                
                $replace_ar['search'][$key]     = $replace_key;
                $replace_ar['replace'][$key]    = ' <a target="_blaank" href="http://cctv-pro.com.ua'.$url.'">'.$keyword_ar[0].'</a> ';
                
                $text = preg_replace("#{$keyword_ar[0]}#ui", $replace_key, $text, 1);
            }
        }
        $key++;
    }
    
    if( $replace_ar['search'] > 1 ){
        $text = str_ireplace( $replace_ar['search'], $replace_ar['replace'], $text);
    }
    
    return $text;
}