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
    
    function get_page_list( $cat_id, $page, $cnt = 15){
        $stop   = $page * $cnt;
        $start  = $stop - $cnt;
        
        $query = $this->db->query(" SELECT * 
                                    FROM `article`
                                    WHERE `cat_id`={$cat_id} 
                                    ORDER BY `date` DESC 
                                    LIMIT {$start}, {$cnt} ");
        
        if( $query->num_rows() < 1 ) return FALSE;
        
        $result_ar = array();
        foreach( $query->result_array() as $row){
            $row['text']    = $this->get_short_txt( $row['text'], 200 );
            $row['date']    = get_date_str_ar( $row['date'] );
            $result_ar[]    = $row;
        }
        
        return $result_ar;
    }
    
    function get_short_txt( $text, $length = 100 ){
        $text = strip_tags($text);
        return mb_substr($text, 0, $length);
    }
    
    function get_like_articles( $id, $text, $cntNews = 4, $dayPeriod = false, $newsDate = false  ){
        $cleanPattern = "#(['\"\,\.\\\]+|&\w{2,6};)#i";
        $text = preg_replace($cleanPattern, ' ', $text);
        
        if( $dayPeriod && $newsDate ){
            
            $intNewsDate = strtotime( $newsDate );
            
            $dateStart  = date("Y-m-d H:i:s", strtotime(" -{$dayPeriod} day", $intNewsDate ) );
            $dateStop   = date("Y-m-d H:i:s", strtotime(" +{$dayPeriod} day", $intNewsDate ) );
            
            $dateSql = " AND (`date` > '{$dateStart}' AND `date` < '{$dateStop}') ";
        }
        else
            $dateSql = '';
        
        $sql = "SELECT * FROM "
                . "(SELECT `id`, `title`, `url_name`, `main_img`, `date` "
                . "FROM `article` "
                . "WHERE MATCH (`title`,`text`) AGAINST ('{$text}') "
                . "AND `id` != '{$id}' "
                . $dateSql  
                . "LIMIT {$cntNews} ) AS `t1` ORDER BY `t1`.`date` DESC";
                
        $query = $this->db->query( $sql );
        
        if( $query->num_rows() < 1 ) return NULL;
        
        $result = array();
        foreach( $query->result_array() as $row ){
            $result[] = $row;
        }
        
        return $result;
    }
    
    function get_pager_ar( $cat_id, $page = 1, $cnt_on_page = 15, $page_left_right = 3 ){
                
        $query_str = "  SELECT 
                            COUNT(`id`) AS 'count'
                        FROM 
                            `article`
                        WHERE
                            `cat_id` = {$cat_id}
                    ";
                            
         $query = $this->db->query($query_str);
         $row   = $query->row();
         $count_goods = $row->count;
         
         $start     = $page - $page_left_right; if( $start < 1 ) $start = 1;
         $cnt_page  = ceil( $count_goods / $cnt_on_page );
         $stop      = $page + $page_left_right; if( $stop > $cnt_page ) $stop = $cnt_page;
         
         $result_ar = array();
         
         if( $page > $page_left_right+1 ){ //дополнение массива первой страницей
             $result_ar[] = 1;
             if( $page != $page_left_right+2 )
                $result_ar[] = '...';
         }    
         
         
         for($i = $start; $i<=$stop; $i++ ){
             $result_ar[] = $i;
         }
         
         if($cnt_page > $stop+1 ){ //дополняет масив последней страницей
             $result_ar[] = '...';
             $result_ar[] = $cnt_page;
         }    
         
         return $result_ar;
    }
    
    function get_popular_articles($idParentId, $cntNews, $dayAgo, $hourAgo, $textLength = 200, $img = true ){
        
        $dateStart  = date("Y-m-d H:i:s", strtotime(" -{$dayAgo} day {$hourAgo} hours" ) );
        
        if( $img )
            $imgSql = " AND `main_img` != '' "; 
        else
            $imgSql = '';
        
        $sql = "SELECT `date`, `url_name`, `title`, `text`, `main_img` FROM `article` "
                . "WHERE "
                . " (`cat_id` = '{$idParentId}' OR `cat_id` IN (SELECT `id` FROM `category` WHERE `parent_id` = '{$idParentId}') )"
                . " AND "
                . " `date` > '{$dateStart}' "
                . $imgSql
                . " ORDER BY `views` DESC, `date` DESC LIMIT {$cntNews} ";
                
        $query = $this->db->query( $sql );        
        
        if( $query->num_rows() < 1 ) return NULL;
        
        $result = array();
        
        foreach( $query->result_array() as $row ){
            $row['text']    = $this->get_short_txt( $row['text'], $textLength );
            $result[]       = $row;
        }
        
        return $result;
    }
}