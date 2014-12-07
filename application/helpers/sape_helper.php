<?php


function getSapeLink(){
    if (!defined('_SAPE_USER')){
        define('_SAPE_USER', '45984c345b02b02bc82d32707552aa52');
     }
     require_once(realpath($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'));
     $sape = new SAPE_client();
     
     $linkAr = $sape->return_links(3);
     
     return $linkAr;
}

