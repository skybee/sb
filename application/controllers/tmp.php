<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tmp extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    function index(){
        echo 'Tmp Index Controller';
    }
    
    function _chenge_all_cat_uri(){
        $query = $this->db->query("SELECT `id` FROM  `category` ORDER BY  `id`");
        
        foreach ($query->result_array() as $row){
            $this->chenge_cat_uri( $row['id'] );
        }
        
        echo '<br /> Все изменения завершены<br /><br />';
        
        $this->change_sub_cat_id();
    }
      
    private function chenge_cat_uri( $cat_id ){
        $this->load->model('category_m');
        
        $cat_url = $this->category_m->change_cat_full_uri( $cat_id );
        
        if( $cat_url ){
            echo 'В категории ID: '.$cat_id.' URL изменен на: '.$cat_url.'<br />';
        }
        else{
            echo 'URL не изменен ID: '.$cat_id.'<br />';
        }
    }
       
    private function get_sub_cat_id( $id = 0 ){
        $sql        = "SELECT `id` FROM `category` WHERE `parent_id` = '{$id}' ";
        $query      = $this->db->query( $sql );
        $pIdList    = '';
        
        if( $query->num_rows() < 1 ) return ''; 
        
        foreach( $query->result_array() as $row){
            $pIdList   .= ','.$row['id'];
            $query2     = $this->db->query("SELECT `id` FROM `category` WHERE `parent_id` = '{$row['id']}'");
            if( $query2->num_rows() > 0 ){
                $pIdList .= ','.$this->get_sub_cat_id( $row['id'] );
            }
        }
        
        return trim( $pIdList, ',');
    }
    
    private function change_sub_cat_id(){
        $sql = "SELECT `id` FROM `category` ORDER BY `id` ";
        $query = $this->db->query($sql);
        
        foreach( $query->result_array() as $row ){
            $subId = $this->get_sub_cat_id($row['id']);
            
            if( !empty($subId) ){
                $this->db->query("UPDATE `category` SET `sub_cat_id`='{$subId}' WHERE `id` = '{$row['id']}' ");
                echo 'ID: '.$row['id']."<br />\n".$subId."<br /><br />\n\n";
            }
        }
    }
    
//    function womens( $page = 1 ){
//        $this->load->helper('parser/download_helper');
//        
//        $url = 'http://www.womenshealthmag.com/channel_ui/ajax/'.$page.'/5';
//        
//        $json = down_with_curl($url);
//        
//        $jsonAr = json_decode($json);
//        
//        print_r($jsonAr);
//    }
    
    function _create_cache_page_on_server($cat_name, $cnt_page = 1){
        set_time_limit(7200);
        
        $this->load->helper('parser/download_helper');
        
        for($i=1; $i<=$cnt_page; $i++){
            $url = "http://odnako.su/sitemap_link_page/{$cat_name}/{$i}/";
            
            $html = down_with_curl($url);
            
            if( !empty($html) ){
                echo $cat_name." page - {$i} OK <br />\n";
            }
            else{
                echo $cat_name." page - {$i} Error <br />\n";
            }
        }
        flush();
        sleep(1);
    }
}