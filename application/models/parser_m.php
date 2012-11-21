<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class parser_m extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function add_to_scanlist( $url, $cat_id){
        $query = $this->db->query("SELECT COUNT(`id`) AS 'cnt' FROM `scan_url` WHERE `url` = '{$url}' ");
        
        $row = $query->row();
        
        if( $row->cnt < 1 )
            $this->db->query("INSERT INTO `scan_url` SET `url`='{$url}', `cat_id`='{$cat_id}' ");
    }
    
    function get_news_url_to_parse( $limit ){
        $query = $this->db->query("SELECT * FROM `scan_url` WHERE `scan`=0 AND ( `url` LIKE '%delo.ua%')  ORDER BY `date` DESC LIMIT {$limit} ");
        
        if( $query->num_rows() < 1 ) return FALSE;
        
        $return_ar = array();
        foreach( $query->result_array() as $row ){
            $return_ar[] = $row;
        }
        
        return $return_ar;
    }
    
    function add_shingles($shingles_ar, $article_id){
        
        if( count($shingles_ar) < 1 ) return FALSE;
        
        $values = '';
        $i=0;
        foreach( $shingles_ar as $shingle ){
            if($i)
                $values .= ', ';
            $values .= "('{$shingle}', '{$article_id}')";
            $i++;
        }
        
        $this->db->query(" REPLACE INTO `shingles` (`hash`,`article_id`) VALUES {$values} ");
        
        
    }
    
    function get_like_shingles(){}
    
    function set_url_scaning( $url_id ){
        if( !$url_id ) return FALSE;
        $this->db->query(" UPDATE `scan_url` SET `scan`=1 WHERE `id`='$url_id' ");
    }
}