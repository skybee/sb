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
} 