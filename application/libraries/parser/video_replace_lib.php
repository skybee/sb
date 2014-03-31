<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class video_replace_lib{
    
    private $videoCodeName = array();
            
            
    function __construct(){
        
    }
    
    
    private function get_video_pattern(){
        $paterns['youtube'] = "<iframe[\s\S]+?youtube.com/embed/[\s\S]+?</iframe>";
        $paterns['youtube'] = "<iframe[\s\S]+?youtube.com/embed/[\s\S]+?</iframe>";
    }
    
    
    
}