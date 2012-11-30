<?php


class template extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
    }
    
    
    
    function index()
    {   
        $this->load->view('template/main2_v');
    }
    
    function main( $id )
    {
        $this->load->view('template/'.$id.'_view');
    }
    
    
    
    
}