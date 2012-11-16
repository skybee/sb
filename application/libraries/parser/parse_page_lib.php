<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class parse_page_lib{
    
    function __construct() {
        
    }
    
    function get_data( $html, $host){
        
        $this->data     = FALSE;
        $this->html_obj = str_get_html($html);
        
        switch( $host ){
            case 'tsn.ua':                  $this->tsn();       break;
            case 'unn.com.ua':              $this->unn();       break;
            case 'rss.unian.net' :          $this->unian();     break;
            case 'www.interfax.com.ua' :    $this->interfax();  break;
            case 'www.segodnya.ua' :        $this->segodnya();  break;
            case 'delo.ua' :                $this->delo();      break;
            case 'focus.ua' :               $this->focus();     break;
            case 'news.liga.net' :          $this->news_liga(); break;
            case 'isport.ua' :              $this->isport();    break;
            case 'k.img.com.ua' :           $this->k_img();     break;
            default:  return FALSE;
        }
        
        $this->html_obj->clear();
        unset( $this->html_obj );
        
        return $this->data;
    }
    
    private function tsn(){
        
        $this->data['text'] = '';
        
        if( is_object( $this->html_obj->find('.photo_descr',0) ) )
            $this->html_obj->find('.photo_descr',0)->outertext = '';
        
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('h2.descr',0) ) )
            $this->data['text']     = '<h2>'.$this->html_obj->find('h2.descr',0)->innertext.'</h2>';
        
        if( is_object( $this->html_obj->find('#news_text',0) ) )
            $this->data['text']    .= $this->html_obj->find('#news_text',0)->innertext;
        
        $this->data['text']         = preg_replace("#<p><strong>Читайте[\s\S]*?</p>#i", '', $this->data['text']);
        $this->data['text']         = preg_replace("#<p><strong>Дивіться ФОТО:#i", '',      $this->data['text']);
        
        if( is_object($this->html_obj->find('#news_text .image img',0)) )
            $this->data['img']      = $this->html_obj->find('#news_text .image img',0)->src;
        else
            $this->data['img']  = '';
    }
    
    private function unn(){
        $this->data['text'] = '';
        $this->data['img']  = '';
                
        if( is_object( $this->html_obj->find('h1',0) ) )
            $this->data['title']    = $this->html_obj->find('h1',0)->innertext;
        
        if( is_object( $this->html_obj->find('.news_inside_page img',0) ) ){
            $this->data['text']     = $this->html_obj->find('.news_inside_page img',0)->outertext;
            $this->data['img']     .= $this->html_obj->find('.news_inside_page img',0)->src;
        }    
        
        if( is_object( $this->html_obj->find('h2.title_leader',0) ) )
            $this->data['text']    .= '<p><i>'.$this->html_obj->find('h2.title_leader',0)->innertext.'</i></p>';
        
        if( is_object( $this->html_obj->find('.news_inside_page p.link',0) ) )
                $this->html_obj->find('.news_inside_page p.link',0)->outertext = '';
        
        if( is_array( $this->html_obj->find('.news_inside_page p') ) )
            foreach( $this->html_obj->find('.news_inside_page p') as $p ){
                $this->data['text']    .= $p->outertext."\n";
            }
    }
    
    private function unian(){
        return FALSE;
    }
    
    private function interfax(){
        return FALSE;
    }
    
    private function segodnya(){
        return FALSE;
    }
    
    private function delo(){
        return FALSE;
    }
    
    private function focus(){
        return FALSE;
    }
    
    private function news_liga(){
        return FALSE;
    }
    
    private function isport(){
        return FALSE;
    }
    
    private function k_img(){
        return FALSE;
    }
    
}