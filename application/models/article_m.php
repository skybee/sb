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
                                        category2.id AS 'f_cat_id', category2.url_name AS 'f_cat_uname'
                                    FROM 
                                        `category` AS `category1`,
                                        `category` AS `category2`,
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
    
    function get_mainpage_cat_news( $news_cat_list ){ //принимает массив с id & name категорий
        $result_ar = array();
        foreach( $news_cat_list as $s_cat_ar ){
            $tmp_ar = $this->get_last_news($s_cat_ar['id'], 4, true);
            if( $tmp_ar == NULL || count($tmp_ar) < 1 ) continue; 
            $tmp_ar['s_cat_ar']                 = $s_cat_ar;
            $tmp_ar['s_cat_ar']['f_cat_uname']  = $tmp_ar[0]['f_cat_uname'];
            $result_ar[]                        = $tmp_ar; 
        }
        
        return $result_ar;
    }
    
    function get_doc_data( $id ){
        $id = (int) $id;
        $query = $this->db->query(" SELECT article.*, category.name AS 'cat_name' 
                                    FROM 
                                        `article`, `category`
                                    WHERE 
                                        article.id  = {$id}
                                        AND
                                        category.id = article.cat_id
                                  ");
        
        if( $query->num_rows() < 1 ) return FALSE; 
        
        return $query->row_array();
    }
}