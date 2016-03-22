<?php

$referrer = $_SERVER['HTTP_REFERER'];

if(!empty($referrer))
{

    $ref_domain_ar = array(
        'homeshop18.com',
        'wikihow.com',
        'macys.com',
        'ovg.cc',
        'goodtoknow.co.uk',
        'filmodrom.net',
        'cosmopolitan.com',
        'cambio.com',
        'en.wikipedia.org',
        'zdnet.com',
        'mensfitness.com',
        'nevcal.com',
        'mylifetime.com'
    );
    
    foreach($ref_domain_ar as $ref_domain)
    {
        if(preg_match("#{$ref_domain}#i", $referrer))
        {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$referrer);
            exit();
        }
    }
}

