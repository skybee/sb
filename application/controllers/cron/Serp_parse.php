<?php

set_time_limit(60);

class Serp_parse extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('serp_parse_m');
        $this->load->library('parser/serp_parse_lib');
    }

    function yandex_xml($cnt_scan = 1)
    {
        header("Content-type:text/plain; Charset=utf-8");

        if( $this->single_work( 2, 'serp_parse') == false ){
            exit('The work temporary Lock');
        }

        $cnt_scan = (int) $cnt_scan;
        
        $articlesList = $this->serp_parse_m->getArticles($cnt_scan);

        if(!$articlesList){
            exit('No Articles');
        }

        $this->serp_parse_lib->setThisHost('odnako.su');

        foreach($articlesList as $articleData)
        {
            $serpData = $this->serp_parse_lib->getData($articleData);
            if(!$serpData){
                echo "Parse Error: ID-".$articleData['id'].' '.$articleData['title']."\n\n";
                continue;
            }
            $jsonData = json_encode($serpData);

            if( $this->serp_parse_m->updateSerpData($articleData['id'], $jsonData) ){
                echo "OK: ID-".$articleData['id'].' '.$articleData['title']."\n\n";
            }
            else{
                echo "Update SQL Error: ID-".$articleData['id'].' '.$articleData['title']."\n\n";
            }
            
            flush();
            sleep(1);
        }
    }

    private function single_work( $minutes, $fname = 'null' ){
        $lockFile   = 'lock/'.$fname.'.lock';
        $lockTime   = time() + (60*$minutes);


        if( is_file($lockFile) ){
            $fileTimeLock   = file_get_contents($lockFile);
            $fileTimeLock   = (int) $fileTimeLock;

            if( time() < $fileTimeLock ) return FALSE;
        }

        file_put_contents($lockFile, $lockTime );

        return TRUE;
    }
}

