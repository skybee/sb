<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class parse_page_lib{
    
    function __construct() {}
    
    function get_data( $html, $host){
        
        $this->data     = FALSE;
        $this->html_obj = str_get_html($html);
        
        switch( $host ){
            case 'tsn.ua':                  $this->tsn();           break;
            case 'korrespondent.net' :      $this->korrespondent(); break;
            case 'www.segodnya.ua' :        $this->segodnya();      break;
            case 'www.unn.com.ua':          $this->unn();           break;
            case 'www.unian.net' :          $this->unian();         break;
            case 'liga.net' :               $this->news_liga();     break;
            case 'interfax.com.ua' :        $this->interfax();      break;
            case 'sport.segodnya.ua' :      $this->segodnya();      break;
            case 'delo.ua' :                $this->delo();          break;
            case 'focus.ua' :               $this->focus();         break;
            case 'isport.ua' :              $this->isport();        break;
            default:  return FALSE;
        }
        
        $this->html_obj->clear();
        unset( $this->html_obj );
        
        return $this->data;
    }
    
    private function tsn(){
        $this->data['text'] = '';
        $this->data['img']  = '';
        
        if( is_object( $this->html_obj->find('.photo_descr',0) ) )
            $this->html_obj->find('.photo_descr',0)->outertext = '';
        
        if( is_object($this->html_obj->find('#news_text .image',0)) ){
            $this->data['img']      = $this->html_obj->find('#news_text .image',0)->href;
            $this->html_obj->find('#news_text .image',0)->outertext = '';
        }
        
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('h2.descr',0) ) )
            $this->data['text']     = '<h2>'.$this->html_obj->find('h2.descr',0)->innertext.'</h2>';
        
        if( is_object( $this->html_obj->find('#news_text',0) ) )
            $this->data['text']    .= $this->html_obj->find('#news_text',0)->innertext;
        
        $this->data['text']         = preg_replace("#<p><strong>[\s\S]{4,20}:[\s]*<a[\s\S]*?</a>[\s]*</strong></p>#iu", '', $this->data['text']); //удаление "Читайте:***" и т.д.
    } #+
    
    private function unn(){
        $this->data['text'] = '';
        $this->data['img']  = '';
                
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
    } #+ ?
    
    private function unian(){
        $this->data['text'] = '';
        $this->data['img']  = '';
        
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
    
    private function interfax(){
        $this->data['text'] = '';
        $this->data['img']  = '';
        
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
    
    private function segodnya(){
        $this->data['text'] = '';
        $this->data['img']  = '';
        
        if( is_object( $this->html_obj->find('.article_cut_image img',0) ) ){
            $this->data['img']      = $this->html_obj->find('.article_cut_image img',0)->src;
            $this->html_obj->find('.article_cut',0)->outertext = '';
        }
        
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_array( $this->html_obj->find('.article p') ) )
            foreach( $this->html_obj->find('.article p') as $p ){
                $tmpP = $p->outertext;
                if( preg_match("#<strong>Читайте также:<br />#i", $tmpP) ) continue;
                $this->data['text']    .= $tmpP."\n";
            }
    } #+
    
    private function delo(){
        $this->data['text'] = '';
        $this->data['img']  = '';
        
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
    
    private function focus(){
        $this->data['text'] = '';
        $this->data['img']  = '';
        
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
    
    private function news_liga(){
        $this->data['text'] = '';
        $this->data['img']  = '';
        
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
    
    private function isport(){
        $this->data['text'] = '';
        $this->data['img']  = '';
        
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
    
    private function korrespondent(){
        $this->data['text'] = '';
        $this->data['img']  = '';
        
        if( is_object( $this->html_obj->find('.post-item__photo img',0) ) ){
            $this->data['img']      = $this->html_obj->find('.post-item__photo img',0)->src;
            $this->html_obj->find('.post-item__photo',0)->outertext = '';
        }
        
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('.post-item__text',0) ) )
            $this->data['text']    = $this->html_obj->find('.post-item__text',0)->innertext;
        
//        $this->data['text']     = iconv('utf-8', 'utf-8//IGNORE', $this->data['text']);
//        $this->data['title']    = iconv('cp1251', 'utf-8//IGNORE', $this->data['title']);
    } #+
    
}