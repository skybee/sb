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
    
    function get_last_news( $cat_id, $cnt = 1, $img = false, $formatDate = false, $parentCat = false ){
        
        if ($img)
            $img_sql = " AND article.main_img != '' ";
        else
            $img_sql = "";
        
        if( $parentCat ){
            $idParentId = 'parent_id';
        }
        else{
            $idParentId = 'id';
        }

        $sql = "SELECT `article`.`id`, `article`.`date`, `article`.`url_name`, `article`.`title`, `article`.`text`, `article`.`main_img`, `category`.`full_uri` "
                . "FROM `article`,  `category`"
                . "WHERE "
                . "`category`.`{$idParentId}`   = '{$cat_id}' "
                . "AND "
                . "`article`.`cat_id`           = `category`.`id` "
                . $img_sql
                . " ORDER BY `article`.`date` DESC LIMIT {$cnt} ";


        $query = $this->db->query($sql);

        $result_ar = array();
        foreach ($query->result_array() as $row) {
            if ($formatDate) {
                $row['date_ar'] = get_date_str_ar($row['date']);
            }
            $result_ar[] = $row;
        }
        
        return $result_ar;
    }
    
    function get_last_left_news( $idParentId, $cnt = 1 ){
        
        $cacheName = 'last_news_'.$idParentId.'_'.$cnt;
        
        if( !$lastNewsCache = $this->cache->file->get($cacheName) ){
            $data['first']  = $this->get_last_news($idParentId, 1, true, true, true);
            $data['first']  = $data['first'][0];
            $data['all']    = $this->get_last_news($idParentId, $cnt, false, true, true);
            unset($data['all'][0]);
            $this->cache->file->save($cacheName, $data, $this->catConfig['cache_time']['right_last_news'] * 60 );
        }
        else
            $data = $lastNewsCache;
        
        return $data;
        
    }
    
    function get_mainpage_cat_news( $news_cat_list ){ //принимает массив с id & name категорий
        $result_ar = array();
        foreach( $news_cat_list as $s_cat_ar ){
            $tmp_ar = $this->get_last_news($s_cat_ar['id'], 4, true, false, false);
            if( $tmp_ar == NULL || count($tmp_ar) < 1 ) continue; 
            $tmp_ar['s_cat_ar']                 = $s_cat_ar;
            $tmp_ar['s_cat_ar']['full_uri']     = $tmp_ar[0]['full_uri'];
            $result_ar[]                        = $tmp_ar; 
        }
        
        return $result_ar;
    }
    
    function get_doc_data( $id ){
        $id = (int) $id;
        $query = $this->db->query(" SELECT  `article`.*, 
                                            `category`.`name` AS 'cat_name', `category`.`full_uri` AS 'cat_full_uri', `category`.`id` AS 'cat_id',
                                            `donor`.`name` AS 'd_name', `donor`.`img` AS 'd_img', `donor`.`host` AS 'd_host' 
                                    FROM 
                                        `article`, `category`, `donor`
                                    WHERE 
                                        `article`.`id`  = {$id}
                                        AND
                                        `category`.`id` = `article`.`cat_id`
                                        AND
                                        `article`.`donor_id` = `donor`.`id`
                                  ");
        
        if( $query->num_rows() < 1 ) return FALSE; 
        
        $returnAr = $query->row_array();
        $returnAr['date_ar'] = get_date_str_ar( $returnAr['date'] );
        
        return $returnAr;
    }
    
    function get_page_list( $cat_id, $page, $cnt = 15, $text_len = 200 ){
        $stop   = $page * $cnt;
        $start  = $stop - $cnt;
        
        $sql = "SELECT "
                . "`article`.*, "
                . "`category`.`full_uri`,"
                . "`donor`.`name` AS 'd_name', `donor`.`img` AS 'd_img' "
                . "FROM "
                . "`article`, `donor`, `category` "
                . "WHERE "
                . "`article`.`cat_id`={$cat_id} "
                . "AND "
                . "`article`.`donor_id` = `donor`.`id` "
                . "AND "
                . "`category`.id = `article`.`cat_id`"
                . "ORDER BY `date` DESC "
                . "LIMIT {$start}, {$cnt} ";
                
        $query = $this->db->query($sql);
        
        if( $query->num_rows() < 1 ) return FALSE;
        
        $result_ar = array();
        foreach( $query->result_array() as $row){
            $row['text']    = $this->get_short_txt( $row['text'], $text_len );
            $row['date']    = get_date_str_ar( $row['date'] );
            $result_ar[]    = $row;
        }
        
        return $result_ar;
    }
    
    function get_short_txt( $text, $length = 100 ){
        $text = strip_tags($text);
        $text = mb_substr($text, 0, $length);
        
//        $pattern = "# \S+$#i";
//        $text = preg_replace( $pattern, '', $text );
        return $text;
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
                . "(SELECT "
                . "`article`.`id`, `article`.`title`, `article`.`url_name`, `article`.`main_img`, `article`.`date`, `article`.`text`,"
                . "`category`.`full_uri` "
                . "FROM `article`,`category` "
                . "WHERE MATCH (`article`.`title`,`article`.`text`) AGAINST ('{$text}') "
                . "AND `category`.`id`      = `article`.`cat_id` "
                . "AND `article`.`id`      != '{$id}' "
                . $dateSql  
                . "LIMIT {$cntNews} ) AS `t1` ORDER BY `t1`.`date` DESC";
                
        $query = $this->db->query( $sql );
        
        if( $query->num_rows() < 1 ) return NULL;
        
        $result = array();
        foreach( $query->result_array() as $row ){
            $row['text']    = $this->get_short_txt( $row['text'], 500 );
            $row['date_ar'] = get_date_str_ar( $row['date'] );
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
    
    function get_popular_articles($cat_id, $cntNews, $hourAgo, $textLength = 200, $img = true, $parentCat = false ){
        
//        $dateStart  = date("Y-m-d H:i:s", strtotime(" -{$dayAgo} day {$hourAgo} hours" ) );
        $dateStart  = date("Y-m-d H:i:s", strtotime(" - {$hourAgo} hours" ) );
        
        if( $img )
            $imgSql = "\n AND `article`.`main_img` != '' "; 
        else
            $imgSql = '';
        
        if( $parentCat ){
            $idParentId = 'parent_id';
        }
        else{
            $idParentId = 'id';
        }
        
//        $sql = "SELECT `article`.`id`, `article`.`date`, `article`.`url_name`, `article`.`title`, `article`.`text`, `article`.`main_img`, `category`.`full_uri` "
//                . "FROM `article`,  `category`"
//                . "WHERE "
//                . "`category`.`{$idParentId}`   = '{$cat_id}' "
//                . "AND "
//                . "`article`.`cat_id`           = `category`.`id` "
//                . "\n -- AND "
//                . "\n -- `date` > '{$dateStart}' "
//                . $imgSql
//                . " ORDER BY "
//                . "\n -- `article`.`views` DESC, "
//                . "\n `article`.`date` DESC "
//                . "\n LIMIT {$cntNews} ";   
                
        $sql = "SELECT `article`.`id`, `article`.`date`, `article`.`url_name`, `article`.`title`, `article`.`text`, `article`.`main_img`, `category`.`full_uri` "
                . "FROM `article`,  `category` "
                . "WHERE "
                . "`category`.`{$idParentId}`   = '{$cat_id}' "
                . "AND "
                . "`article`.`cat_id`           = `category`.`id` "
                . "AND "
                . "`date` > '{$dateStart}' "
                . $imgSql
                . " ORDER BY "
                . "`article`.`views` DESC, "
                . "`article`.`date` DESC "
                . "LIMIT {$cntNews} ";        

//        echo $sql; exit();
                
        $query = $this->db->query( $sql );
        
        if( $query->num_rows() < 1 ) return NULL;
        
        $result = array();
        
        foreach( $query->result_array() as $row ){
            $row['text']    = $this->get_short_txt( $row['text'], $textLength );
            $row['date']    = get_date_str_ar( $row['date'] );
            $result[]       = $row;
        }
        
        return $result;
    }
    
    function get_top_slider_data( $idParentId, $cntNews, $hourAgo, $textLength = 200, $img = true, $parentCat = false ){
        
        $topSliderCacheName = 'slider_'.$idParentId;
        if( !$sliderCache = $this->cache->file->get($topSliderCacheName) ){
            $data = $this->get_popular_articles( $idParentId, $cntNews, $hourAgo, $textLength, $img, $parentCat );
            $this->cache->file->save($topSliderCacheName, $data, $this->catConfig['cache_time']['top_slider'] * 60 );
        }
        else
            $data = $sliderCache;
        
        return $data;
    }
    
    function get_search_page_list( $searchStr, $page, $cnt = 15){
        $stop   = $page * $cnt;
        $start  = $stop - $cnt;
        
        $sql = "SELECT "
                . "`article`.*, "
                . "`category`.`full_uri`,"
                . "`donor`.`name` AS 'd_name', `donor`.`img` AS 'd_img' "
                . "FROM "
                . "`article`, `donor`, `category`, "
                . " (   SELECT `id`, MATCH (`title`,`text`) AGAINST ('{$searchStr}') AS `rank` "
                . "     FROM `article`"
                . "     WHERE MATCH (`title`,`text`) AGAINST ('{$searchStr}') "
                . "     LIMIT 150 ) AS `seach` "
                . "WHERE "
                . "`article`.`id`       = `seach`.`id` "
                . "AND "
                . "`article`.`donor_id` = `donor`.`id` "
                . "AND "
                . "`category`.id = `article`.`cat_id`"
                . "ORDER BY `seach`.`rank` DESC "
                . "LIMIT {$start}, {$cnt} ";
        
//        $sql = "    SELECT 
//                            article.id, article.date, article.url_name, article.title, article.text, article.main_img,
//                            category1.id AS 's_cat_id', category1.url_name AS 's_cat_uname', category1.name AS 's_cat_name',
//                            category2.id AS 'f_cat_id', category2.url_name AS 'f_cat_uname',
//                            `donor`.`name` AS 'd_name', `donor`.`img` AS 'd_img'
//                        FROM 
//                            `category` AS `category1`,
//                            `category` AS `category2`,
//                            `article`,
//                            `donor`,
//                            (   SELECT `id`, MATCH (`title`,`text`) AGAINST ('{$searchStr}') AS `rank` 
//                                FROM `article` 
//                                WHERE 
//                                MATCH (`title`,`text`) AGAINST ('{$searchStr}')
//                                LIMIT 150     
//                            ) AS `seach`
//                        WHERE
//                            article.id          = seach.id
//                        AND
//                            category1.id        = article.cat_id
//                        AND
//                            category2.id        = category1.parent_id  
//                        AND
//                            article.donor_id    = donor.id
//                        ORDER BY seach.rank DESC
//                        LIMIT {$start}, {$cnt}   
//                  ";
                        
        $query = $this->db->query($sql);                
        
        if( $query->num_rows() < 1 ) return FALSE;
        
        $result_ar = array();
        foreach( $query->result_array() as $row){
            $row['text']    = $this->get_short_txt( $row['text'], 200 );
            $row['date']    = get_date_str_ar( $row['date'] );
            $result_ar[]    = $row;
        }
        
        return $result_ar;
    }
    
    function get_search_pager_ar( $searchStr, $page = 1, $cnt_on_page = 15, $page_left_right = 3 ){
                
        $query_str = "  SELECT 
                            COUNT(`id`) AS 'count'
                        FROM 
                            `article`
                        WHERE
                            MATCH (`title`,`text`) AGAINST ('{$searchStr}')        
                    ";
                            
         $query = $this->db->query($query_str);
         $row   = $query->row();
         $count_goods = $row->count;
         
         if( $count_goods > 150 ) $count_goods = 150;
         
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
    
    function set_article_rank($id, $ip, $rank){
        //проверка наличие записи с таким IP и ID в базе
        $query = $this->db->query(" SELECT COUNT(*) AS 'cnt' FROM `article_top` WHERE `article_id` = '{$id}' AND `ip` = '{$ip}' "); 
        $row = $query->row_array();
        
        
        if( $row['cnt'] < 1 ){ //запись новой записи в базу
            $this->db->query("INSERT INTO `article_top` SET `article_id` = '{$id}', `ip` = '{$ip}', `rank` = {$rank} ");
            
            if( rand(1, 1000) <= 50 ){ //удаление старых записей
                $control_date   = date("Y-m-d H:i:s", strtotime("- 90 day", time() ) ); //дата удаления записи
                
                $this->db->query("DELETE FROM `article_top` WHERE `date` < '{$control_date}' ");
            }
        }
    }
    
}