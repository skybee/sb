<?php

class cat_lib{
    
    private $mainCat = '';
    
    function __construct() {
        $this->ci = &get_instance();
    }
    
    function getCatConfig(){
        $catConf = $this->ci->config->item('category');
        
        if( isset($catConf[$this->mainCat]) ){
            return $catConf[$this->mainCat];
        }
        else{
            return $catConf['default'];
        }
    }
    
    
    function getCatFromUri(){
        $pattern = "#([a-z_-\d]+)/#i";
        
        if( preg_match_all($pattern, $_SERVER['REQUEST_URI'], $matches) ){
            $this->mainCat = $matches[1][0];
            return $matches[1];
        }
    }
}

