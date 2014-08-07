<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tmp extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    function index(){
        echo 'Tmp Index Controller';
    }
    
    function chenge_cat_uri( $cat_id ){
        $this->load->model('category_m');
        
        $cat_url = $this->category_m->change_cat_full_uri( $cat_id );
        
        if( $cat_url ){
            echo 'В категории ID: '.$cat_id.' URL изменен на: '.$cat_url.'<br />';
        }
        else{
            echo 'URL не изменен ID: '.$cat_id.'<br />';
        }
    }
    
    function chenge_all_cat_uri(){
        $query = $this->db->query("SELECT `id` FROM  `category` ORDER BY  `id`");
        
        foreach ($query->result_array() as $row){
            $this->chenge_cat_uri( $row['id'] );
        }
        
        echo '<br /> Все изменения завершены';
    }
}