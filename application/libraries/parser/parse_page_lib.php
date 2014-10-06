<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class parse_page_lib{
   
    function get_data( $html, $donorData ){
        
        $parseClass = $this->selectClass( $donorData['host'] );
        if( !$parseClass ) return false;
        $parseObj   = new $parseClass( $donorData );
        
        return  $parseObj->get_data($html);
    }
    
    private function selectClass($host){
        switch( $host ){
            case 'tsn.ua':                      return 'parseTsn';
            case 'korrespondent.net' :          return 'parseKorrespondent';
            case 'www.segodnya.ua' :            return 'parseSegodnya';
            case 'www.unn.com.ua':              return 'parseUnn';
            case 'www.unian.net' :              return 'parseUnian';
            case 'liga.net' :                   return 'parseNewsLiga';
            case 'interfax.com.ua' :            return 'parseInterfax';
            case 'sport.segodnya.ua' :          return 'parseSegodnya';
            case 'delo.ua' :                    return 'parseDelo';
            case 'focus.ua' :                   return 'parseFocus';
            case 'isport.ua' :                  return 'parseIsport';
            case 'compulenta.computerra.ru':    return 'parseCompulenta';
            case 'itc.ua':                      return 'parseItc';
            case 'habrahabr.ru':                return 'parseHabr'; 
            case '4pda.ru':                     return 'parse4PDA';
            case 'www.computerra.ru':           return 'parseComputerra';    
            default: return false;
        }
    }
    
}


class cleanDOM{
    
    private $DOM;
    
    function __construct( &$dom ) {
        $this->DOM = $dom;
    }
    
    function delSingle($selector, $key){
        if( is_object( $this->DOM->find($selector, $key) ) ){
            $this->DOM->find($selector, $key)->outertext = '';
        }
    }
    
    function delAll( $selector ){
        if( is_array( $this->DOM->find($selector) ) ){
            foreach( $this->DOM->find($selector) as $nextElement ){
                $nextElement->outertext = '';
            } 
        }
    }
}


abstract class parse_page{
    
    protected $donorData, $cleaner, $html_obj, $data = array('img'=>false,'title'=>false,'text'=>false,'date'=>false);
    
    function __construct( $donorData ) {
        $this->donorData = $donorData;
    }
    
    function get_data( $html ){
        
        $html = $this->predParseHTML( $html );
        $this->html_obj = str_get_html($html);
        if( !is_object($this->html_obj) ) return false;
        $this->cleaner  = new cleanDOM( $this->html_obj );
        $this->parseDOM();
        $this->html_obj->clear();
        
        unset( $this->html_obj );
        
        $this->data['text'] =  video_replace_lib::get_video_tags( $this->data['text'] );
        
        return $this->data;
    }
    
    function predParseHTML( $html ){ return $html; }
    
    abstract protected function parseDOM();
    
    protected function getNbrMonthFromStr( $str ){
        $patternAr = array(1=>'янва','февр','март','апрел','ма(й|я)','июн','июл','август','сентяб','октяб','ноябр','декабр');
        
        foreach( $patternAr as $mNmbr => $pattern ){
            $pattern = "#".$pattern."#iu";
            if( preg_match($pattern, $str) ){
                if( $mNmbr < 10 ) $mNmbr = '0'.$mNmbr;
                return $mNmbr;
            }
        }
        
        return 5;
    }
    
}
    

class parseTsn extends parse_page{
    
    function parseDOM(){
        
        if( is_object( $this->html_obj->find('.photo_descr',0) ) )
            $this->html_obj->find('.photo_descr',0)->outertext = '';
        
        if( is_object( $this->html_obj->find('span.v_info',0) ) ) //иконка для видео
            $this->html_obj->find('span.v_info',0)->outertext = '';
        
        if( is_object($this->html_obj->find('#news_text .image',0)) ){
            $this->data['img']      = $this->html_obj->find('#news_text .image',0)->href;
            $this->html_obj->find('#news_text .image',0)->outertext = '';
        }
        
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('h2.descr',0) ) )
            $this->data['text']     = '<h2>'.$this->html_obj->find('h2.descr',0)->innertext.'</h2>';
        
        if( is_object( $this->html_obj->find('#news_text',0) ) ){
            $this->data['text']    .= $this->html_obj->find('#news_text',0)->innertext;
            
            //вставка видео из конца текста, если есть
            if( !is_object( $this->html_obj->find('#news_text',0)->find('.v_player', 0) ) && is_object( $this->html_obj->find('.v_player',0) ) ){
//                $this->data['text'] .= $this->html_obj->find('.v_player',0)->outertext;
                $html = $this->html_obj->find('body',0)->innertext;
                preg_match("#<div class='v_player' id='video_player'></div>[\s]+<script[\s\S]+?addVariable\('media_id', '[\d]+'\);[\s\S]+?</script>#i", $html, $videoJsArr );
                $this->data['text'] .= "\n\n".$videoJsArr[0];
            }
        }
        
//        $this->data['text']         = preg_replace("#<p><strong>[\s\S]{4,20}:[\s]*<a[\s\S]*?</a>[\s]*</strong></p>#iu", '', $this->data['text']); //удаление "Читайте:***" и т.д.
        $this->data['text']         = preg_replace("#>[\s]*Читайте также:[\s\S]+?</a>#iu", '> </a>', $this->data['text']); //удаление Читайте также:
        
        #<video>
//        $this->data['text']         = preg_replace( "#<script[\s\S]+?addVariable\('media_id', '([\d]+)'\);[\s\S]+?</script>#i", 
//                                                    parse_lib::comment_tags("<p style='text-align:center;'><embed src='http://ru.tsn.ua/bin/player/embed.php/$1' type='application/x-shockwave-flash' width='600' height='537' allowfullscreen='true' allowscriptaccess='always'></embed></p>"), 
//                                                    $this->data['text']); 
        #</video>
    }
    
} 

class parseKorrespondent extends parse_page{
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('.post-item__photo img',0) ) ){
            $this->data['img']      = $this->html_obj->find('.post-item__photo img',0)->src;
            $this->html_obj->find('.post-item__photo',0)->outertext = '';
        }
        
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('.post-item__text',0) ) )
            $this->data['text']    = $this->html_obj->find('.post-item__text',0)->innertext;
        
        $this->data['text']         = preg_replace("#>[\s]*Читайте также:[\s\S]+?</a>#iu", '> </a>', $this->data['text']); //удаление Читайте также:
//        $this->data['text']     = iconv('utf-8', 'utf-8//IGNORE', $this->data['text']);
//        $this->data['title']    = iconv('cp1251', 'utf-8//IGNORE', $this->data['title']);
    }
}

class parseSegodnya extends parse_page{
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('.article_cut_image img',0) ) ){
            $this->data['img']      = $this->html_obj->find('.article_cut_image img',0)->src;
            $this->html_obj->find('.article_cut',0)->outertext = '';
        }
        
        if( is_object( $this->html_obj->find('h1',0) ) ){
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
            $this->data['title']    = preg_replace("#\(\s*в(и|і)део\s*\)#i", ' ', $this->data['title']); //удаление слова "видео"
        }
        
        if( is_array( $this->html_obj->find('.article p') ) ){
            foreach( $this->html_obj->find('.article p') as $p ){
                $tmpP = $p->outertext;
                if( preg_match("#<strong>Читайте также:<br />#i", $tmpP) ) continue;
                $this->data['text']    .= $tmpP."\n";
            }
        }
    }
}

class parseUnn extends parse_page{
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('.b-news-full-img img',0) ) ){
            $this->data['img']      = $this->html_obj->find('.b-news-full-img img',0)->src;
            $this->html_obj->find('.b-news-full-img',0)->outertext = '';
        }
        
        if( is_object( $this->html_obj->find('.b-news-holder',0) ) )
            $this->data['text']    = $this->html_obj->find('.b-news-holder',0)->innertext;
        
//        if( is_object( $this->html_obj->find('h2.title_leader',0) ) )
//            $this->data['text']    .= '<p><i>'.$this->html_obj->find('h2.title_leader',0)->innertext.'</i></p>';
//        
//        if( is_object( $this->html_obj->find('.news_inside_page p.link',0) ) )
//                $this->html_obj->find('.news_inside_page p.link',0)->outertext = '';
//        
//        if( is_array( $this->html_obj->find('.news_inside_page p') ) )
//            foreach( $this->html_obj->find('.news_inside_page p') as $p ){
//                $this->data['text']    .= $p->outertext."\n";
//            }
    }
}

class parseUnian extends parse_page{
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('.photo_block img',0) ) ){
            $this->data['img']      = $this->html_obj->find('.photo_block img',0)->src;
            $this->html_obj->find('.photo_block img',0)->outertext = '';
            
            if( is_object( $this->html_obj->find('.subscribe_photo_text',0) ) ){
                $this->html_obj->find('.subscribe_photo_text',0)->outertext = '';
            }
        }
        
        if( is_object( $this->html_obj->find('.read_also',0) ) )
            $this->data['text']     = $this->html_obj->find('.read_also',0)->outertext = '';
        
        if( is_object( $this->html_obj->find('.article_body',0) ) )
            $this->data['text']     = $this->html_obj->find('.article_body',0)->innertext;
        
//        $this->data['text']         = preg_replace("#<p>[\s]*По теме:[\s\S]*?</p>#iu", '', $this->data['text']);
        
    }
}

class parseNewsLiga extends parse_page{
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('.annotation',0) ) )
            $this->data['text']    .= '<h2>'.$this->html_obj->find('.annotation',0)->innertext."</h2>\n";
        
        if( is_object( $this->html_obj->find('.img img',0) ) ){
            $this->data['img']      = $this->html_obj->find('.img img',0)->src;
            $this->html_obj->find('.img',0)->outertext = '';
        }
        
        if( is_object( $this->html_obj->find('.text',0) ) )
            $this->data['text']    .= $this->html_obj->find('.text',0)->innertext;
        
        $this->data['text']         = preg_replace("#<b>Подписывайтесь на аккаунт[\s\S]+?</b>#i", '', $this->data['text']); //удаление "Подписывайтесь***" и т.д.
    }
}

class parseInterfax extends parse_page{
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('h3.article-content-title',0) ) )
            $this->data['title']    = $this->html_obj->find('h3.article-content-title',0)->innertext;
        
        if( is_object( $this->html_obj->find('img.article-content-image',0) ) ){
            $this->data['img']     .= $this->html_obj->find('img.article-content-image',0)->src;
        }
        
        if( is_object( $this->html_obj->find('div.article-content',0) ) ){
            $this->data['text']    .= $this->html_obj->find('div.article-content',0)->innertext;
            $this->data['text']    = nl2br( $this->data['text'] );
        }
    }
}

class parseDelo extends parse_page{
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('h2.art_teaser',0) ) )
            $this->data['text']    .= '<h2>'.$this->html_obj->find('h2.art_teaser',0)->innertext."</h2>\n";
        
        if( is_object( $this->html_obj->find('.big-img img',0) ) ){
            $this->data['text']    .= $this->html_obj->find('.big-img img',0)->outertext."\n";
            $this->data['img']      = $this->html_obj->find('.big-img img',0)->src;
        }
        
        if( is_object( $this->html_obj->find('#hypercontext',0) ) )
            $this->data['text']    .= $this->html_obj->find('#hypercontext',0)->innertext;
    }
}

class parseFocus extends parse_page{
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('.single h1 #pedit',0) ) )
            $this->html_obj->find('.single h1 #pedit',0)->outertext = '';
        
        if( is_object( $this->html_obj->find('.single h1',0) ) )
            $this->data['title']    = $this->html_obj->find('.single h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('.subheader',0) ) )
            $this->data['text']    .= '<h2>'.$this->html_obj->find('.subheader',0)->innertext."</h2>\n";
        
        if( is_object( $this->html_obj->find('.single-pic img',0) ) ){
            $this->data['img']      = $this->html_obj->find('.single-pic img',0)->src;
            $this->html_obj->find('.single-pic',0)->outertext = '';
        }
        
        if( is_object( $this->html_obj->find('#dcontent',0) ) )
            $this->data['text']    .= $this->html_obj->find('#dcontent',0)->innertext;
        
        if( stripos( $this->data['title'], 'Главное за день') !== false )
            $this->data['title']    = '';
    }
}

class parseIsport extends parse_page{
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('#ctl00_News3_c1_5_intro',0) ) )
            $this->data['text']    .= '<h2>'.$this->html_obj->find('#ctl00_News3_c1_5_intro',0)->innertext."</h2>\n";
        
        if( is_object( $this->html_obj->find('#ctl00_News3_c1_5_image',0) ) ){
            $this->data['text']    .= $this->html_obj->find('#ctl00_News3_c1_5_image',0)->outertext."\n";
            $this->data['img']      = $this->html_obj->find('#ctl00_News3_c1_5_image',0)->src;
        }
        
        if( is_object( $this->html_obj->find('#ctl00_News3_c1_5_FullText',0) ) )
            $this->data['text']    .= $this->html_obj->find('#ctl00_News3_c1_5_FullText',0)->innertext;
    }
}

class parseCompulenta extends parse_page{
    
    function predParseHTML( $html ){
        return parse_lib::validHTML($html);
    }
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('h1.article-title',0) ) )
            $this->data['title']    = $this->html_obj->find('h1.article-title',0)->innertext;
        
        
        if( is_object( $this->html_obj->find('.image-anons',0) ) ){
            foreach( $this->html_obj->find('.image-anons') as $imgAnons ){
                $imgAnons->outertext = '<br /><i style="font-size: 11px;">'.$imgAnons->innertext.'</i><br />';
            }
        }
        
        if( is_object( $this->html_obj->find('.article-lead',0) ) )
            $this->data['text']    .= '<p><i>'.$this->html_obj->find('.article-lead',0)->innertext.'</i></p>';
        
        if( is_object( $this->html_obj->find('.article-text',0) ) )
            $this->data['text']    .= $this->html_obj->find('.article-text',0)->innertext;
        
        if( is_object( $this->html_obj->find('.article-info-author',0) ) )
            $this->data['text']    .= '<p><i>Автор: '.$this->html_obj->find('.article-info-author',0)->innertext.'</i></p>';
        
        if( is_object( $this->html_obj->find('.article-info-date',0) ) ){
            $this->data['date'] = $this->getDate( $this->html_obj->find('.article-info-date',0)->innertext );
        }
    }
    
    private function getDate( $dateStr ){
        $date = false;
        $pattern = "#(\d{2})\s+([а-яёА-ЯЁ]+)\s+(\d{4})#iu";
        if( preg_match($pattern, $dateStr, $matches) ){
//            echo '<pre>'.print_r($matches,1).'</pre>';
            $date = $matches[3].'-'.$this->getNbrMonthFromStr( $matches[2] ).'-'.$matches[1].' '.rand(10,22).':00:00';
        }
        
        return $date;
    }
}

class parseItc extends parse_page{
    
    function predParseHTML($html) {
        
        $imgURL = $this->donorData['main_img_url'];
        if( empty($imgURL) ) return $html;
        
        $pattern    = "#<img[\s\S]+?src=['\"]{$imgURL}['\"][\s\S]+?>#i";
//        $html       = preg_replace($pattern, '', $html);
        
        return $html;
    }
    
    function parseDOM(){
        if( is_object( $this->html_obj->find('h1.post-title',0) ) ){
            $this->data['title']    = $this->html_obj->find('h1.post-title',0)->innertext;
        }
        
        if( is_object( $this->html_obj->find('.article-content',0) ) ){
            
            
            $this->cleaner->delSingle('.article-content .post-tags', 0);
            $this->cleaner->delSingle('.article-content .social', 0);
            $this->cleaner->delSingle('.article-content .post-types', 0);
            $this->cleaner->delSingle('.article-content .itc-hl', 0);
            $this->cleaner->delSingle('.article-content .itc-share', 0);
            $this->cleaner->delSingle('.article-content .za-protiv', 0);
            $this->cleaner->delSingle('.article-content .competitors', 0);
            
            $this->cleaner->delAll('.hlinker');
            $this->cleaner->delAll('.sk-hl-00');
            $this->cleaner->delAll('td.hotlinetable-lefttop');
            $this->cleaner->delAll('td.hotlinetable-righttop');
            $this->cleaner->delAll('.spec1 h1');
            
            

            
            if( is_array( $this->html_obj->find('.fotorama--wp') ) ){ //image slider
                foreach( $this->html_obj->find('.fotorama--wp') as $fotoramaWP ){
                    $images = '';
                    if( is_object($fotoramaWP->find('a',0)) ){                        
                            $imgURL = $fotoramaWP->find('a',0)->href;
                            if( !empty($imgURL) )
                                $images .= '<p><img src="'.$imgURL.'" rel="my-fotorama--wp" /></p>';
                        }
                    $fotoramaWP->outertext = $images;
                } 
            }
            
            if( is_array( $this->html_obj->find('.fotorama') ) ){ //image slider
                foreach( $this->html_obj->find('.fotorama') as $fotorama ){
                    $images = '';
                    if( is_object($fotorama->find('img',0)) ){                        
                            $imgURL = $fotorama->find('img',0)->src;
                            if( !empty($imgURL) )
                                $images .= '<p><img src="'.$imgURL.'" rel="my-fotorama" /></p>';
                        }
                    $fotorama->outertext = $images;
                } 
            }
            
            $this->data['text'] = $this->html_obj->find('.article-content',0)->innertext;
            
            if( is_object($this->html_obj->find('.avtor a',0)) ){
                $author = $this->html_obj->find('.avtor a',0)->innertext;
                $this->data['text'] .= '<p><i>Автор: '.$author.'</i></p>';
                
                if( stripos($author, 'Реклама') ){ $this->data['text'] = ''; }
            }
            
            //del first img without text
            $firstImgPattern = "#^[^а-яёА-ЯЁ]+?<img\s*[\s\S]+?>#i";
            while( preg_match($firstImgPattern, $this->data['text']) ){
                $this->data['text'] = preg_replace($firstImgPattern, '', $this->data['text']);
            }
            
            if( is_object($this->html_obj->find('time[pubdate]',0)) ){
                $this->data['date'] = $this->getDate( $this->html_obj->find('time[pubdate]',0)->pubdate );
            }
            
//            $this->data['text'] = $this->chengeH1( $this->data['text'] );
        }
    }
    
    private function chengeH1( $html ){
        $pattern[]      = "#<h1#i";
        $pattern[]      = "#h1>#i";
        $replacement[]  = '<h3';
        $replacement[]  = 'h3>';
        
        $html   = preg_replace($pattern, $replacement, $html);
        
        return $html;
    }
    
    private function getDate( $dateStr ){
        $date = false;
        $pattern = "#\d{4}-\d{2}-\d{2}#i";
        if( preg_match($pattern, $dateStr, $matches) ){
//            echo '<pre>'.print_r($matches,1).'</pre>';
            $date = $matches[0].' '.rand(10,22).':00:00';
        }
        
        return $date;
    }
}

class parseHabr extends parse_page{
    
    function parseDOM() {
        
        $this->cleaner->delSingle('.polling', 0);
        
        if( is_object( $this->html_obj->find('h1.title span.post_title',0) ) ){
            $this->data['title']    = $this->html_obj->find('h1.title span.post_title',0)->innertext;
        }
        
        if( is_object( $this->html_obj->find('.content',0) ) ){
            $this->data['text'] = $this->html_obj->find('.content',0)->innertext;
            
            $firstImgPattern = "#^[^а-яёА-ЯЁ]+?<img\s*[\s\S]+?>#i";
            while( preg_match($firstImgPattern, $this->data['text']) ){
                $this->data['text'] = preg_replace($firstImgPattern, '', $this->data['text']);
            }
        }
        
        if( is_object( $this->html_obj->find('.published',0) ) ){
            $this->data['date'] = $this->getDate( $this->html_obj->find('.published',0)->innertext );
        }
    }
    
    private function getDate( $dateStr ){
        $date = false;
        $pattern = "#(\d{1,2})\s+([а-яёА-ЯЁ]+)\s+(\d{4}|)#iu";
        if( preg_match($pattern, $dateStr, $matches) ){
//            echo '<pre>'.print_r($matches,1).'</pre>';
            
            $day = $matches[1];
            if( $day < 10 ) $day = '0'.$day;
            
            $month = $this->getNbrMonthFromStr($matches[2]);
            
            $year = $matches[3];
            if( empty($year) ) $year = date("Y");
            
            $date = $year.'-'.$month.'-'.$day.' '.rand(10,22).':00:00';
        }
        
        return $date;
    }
}

class parse4PDA extends parse_page{
    
    function predParseHTML( $html ){
        return iconv('cp1251', 'utf-8//IGNORE', $html );
    }
    
    function parseDOM() {
        if( is_object( $this->html_obj->find('#content .description h1',0) ) ){
            $this->data['title']    = $this->html_obj->find('#content .description h1',0)->innertext;
        }
        
        $this->cleaner->delAll('.table4site');
        
        if( is_object( $this->html_obj->find('.content .content-box',0) ) ){
            
            $content = $this->html_obj->find('.content .content-box',0);
            
            #<lightbox big photo>
            if( is_array($content->find('a[data-lightbox]')) ){
                foreach( $content->find('a[data-lightbox]') as $lightbox ){
                    $bigImgUrl          = $lightbox->href;
                    if( is_object($lightbox->find('img',0)) ){
                        $defaultImgWidth    = $lightbox->find('img',0)->width;
                        if( isset($defaultImgWidth) && $defaultImgWidth < 250 ){
                            $lightbox->innertext = '<p><img src="'.$bigImgUrl.'" /></p>';
                        }
                    }
                }
            }
            #</lightbox big photo>
            
            $this->data['text'] = $content->innertext;
//            $this->data['text'] = $this->html_obj->find('.content .content-box',0)->innertext;
            
            if( is_object( $this->html_obj->find('.info-holder .date',0) ) ){
                $this->data['date'] = $this->getDate( $this->html_obj->find('.info-holder .date',0)->innertext );
            }
        }
    }
    
    private function getDate( $dateStr ){
        $date = false;
        $pattern = "#(\d{1,2})\.(\d{1,2})\.(\d{2})#i";
        if( preg_match($pattern, $dateStr, $matches) ){
//            echo '<pre>'.print_r($matches,1).'</pre>';
            
            $day = $matches[1];
            if( strlen($day) < 2 ) $day = '0'.$day;
            
            $month = $matches[2];
            if( strlen($month) < 2 ) $month = '0'.$month;
            
            $year = '20'.$matches[3];
            
            $date = $year.'-'.$month.'-'.$day.' '.rand(10,22).':00:00';
        }
        
        return $date;
    }
}

class parseComputerra extends parse_page{
    
    function parseDOM() {
        
        if( is_object( $this->html_obj->find('.article h1.title',0) ) ){
            $this->data['title']    = $this->html_obj->find('.article h1.title',0)->innertext;
        }
        
        if( is_object( $this->html_obj->find('.article .author .user__name',0) ) ){
            $author = $this->html_obj->find('.article .author .user__name',0)->innertext;
        }
        
//        $this->cleaner->delSingle('.article h1.title', 0);
//        $this->cleaner->delSingle('.article a.item-section', 0);
//        $this->cleaner->delSingle('.article .author', 0);
//        $this->cleaner->delSingle('.article .article-soc', 0);
//        $this->cleaner->delSingle('.article .article-tags', 0);
//        $this->cleaner->delSingle('.article .also', 0);
//        $this->cleaner->delSingle('.article .item-ban-700', 0);
//        $this->cleaner->delSingle('.article .comments', 0);
//        $this->cleaner->delAll('.article .item-article', 0);
        
        if( is_object( $this->html_obj->find('.article',0) ) ){
            $article = $this->html_obj->find('.article',0)->innertext;
            $pattern = "#<!-- start -->[\s\S]+?<!-- fin -->#i";
            
            preg_match($pattern, $article, $matches);
            $this->data['text'] = $matches[0];
            
            if( isset($author) ){
                $this->data['text'] .= '<p><i> Автор: '.$author.'</i></p>';
            }
        }
        
//        if( is_object( $this->html_obj->find('.published',0) ) ){
//            $this->data['date'] = $this->getDate( $this->html_obj->find('.published',0)->innertext );
//        }
    }
}

