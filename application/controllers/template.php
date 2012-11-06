<?php


class template extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
    }
    
    
    
    function index()
    {   
        $this->main( 'main' );
    }
    
    function main( $id )
    {
        $this->load->view('template/'.$id.'_view');
    }
    
    
    
    
}