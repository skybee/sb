<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class list_m extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function get_cat( $pid ){
        $query = $this->db->query("SELECT * FROM `category` WHERE `parent_id`='{$pid}'  ORDER BY `sort`" );
        
        $result_ar = array();
        
        foreach( $query->result_array() as $row ){
            $result_ar[] = $row;
        }
        
        return $result_ar;
    }
    
    function get_footer_cat_link(){
        $cacheName = 'footer_cat';
        
        if( !$allCatAr = $this->cache->file->get($cacheName) ){
            $mainCatAr = $this->get_cat(0);

            if( count($mainCatAr) < 1 ) return NULL;

            $allCatAr = array();
            foreach( $mainCatAr as $mainCat ){
                $sCat = $this->get_cat( $mainCat['id'] );
                if( count($sCat) < 1 ) $sCat = NULL;
                $mainCat['s_cat'] = $sCat;

                $allCatAr[] = $mainCat;
            }
            $this->cache->file->save($cacheName, $allCatAr, $this->cacheTime->footerCat * 60 );
        }
        
        return $allCatAr;
    }
} 