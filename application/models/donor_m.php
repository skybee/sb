<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class donor_m extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    
    function getDonorIdFromHost( $host ){
        $sql = "SELECT `id` FROM `donor` WHERE `host` LIKE '%{$host}%' LIMIT 1 ";
        
        $query = $this->db->query( $sql );
        
        $row = $query->row();
        return $row->id;
    }
}