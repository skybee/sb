<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class article_m extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    
    function get_cat_data_from_url_name( $url_name ){
        $url_name = mysql_real_escape_string( $url_name );
        $query = $this->db->query("SELECT * FROM `category` WHERE `url_name` = '{$url_name}' ");
        
        return $query->row_array();
    }
    
    function get_last_news( $cat, $cnt = 1, $img = false ){
        
        if( $img )  $img_sql = " AND article.main_img != '' ";
        else        $img_sql = "";
            
        
        $query = $this->db->query(" SELECT 
                                        article.id, article.date, article.url_name, article.title, article.main_img,
                                        category1.id AS 's_cat_id', category1.url_name AS 's_cat_uname',
                                        category2.id AS 'f_cat_id', category2.url_name AS 'f_cat_uname',
                                    FROM 
                                        `category` AS 'category1'
                                        `category` AS 'category2',
                                        `article`
                                    WHERE
                                        article.cat_id  = '{$cat}'
                                        AND
                                        category1.id    = article.cat_id
                                        AND
                                        category2.id    = category1.parent_id
                                        {$img_sql}
                                    ORDER BY article.date DESC
                                    LIMIT {$cnt}   
                                  ");
                                    
        $result_ar = array();
        foreach( $query->result_array() as $row ){
            $result_ar[] = $row;
        }
        
        return $result_ar;
    }
}