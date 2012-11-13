<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function seoUrl( $title )
{
    $title = iconv('utf-8', 'cp1251', $title);
	$title = preg_replace("#&[a-z]+;#i", ' ', $title); //�������� ���������
	$title = strtolower( trim($title) );

    $letters = array(
        '�'=>'a',
        '�'=>'b',
        '�'=>'v',
        '�'=>'g',
        '�'=>'d',
        '�'=>'e',
        '�'=>'e',
        '�'=>'j',
        '�'=>'z',
        '�'=>'i',
        '�'=>'y',
        '�'=>'k',
        '�'=>'l',
        '�'=>'m',
        '�'=>'n',
        '�'=>'o',
        '�'=>'p',
        '�'=>'r',
        '�'=>'s',
        '�'=>'t',
        '�'=>'u',
        '�'=>'f',
        '�'=>'h',
        '�'=>'c',
        '�'=>'ch',
        '�'=>'sh',
        '�'=>'sh',
        '�'=>'',
        '�'=>'y',
        '�'=>'',
        '�'=>'e',
        '�'=>'yu',
        '�'=>'ya',
		'�'=>'a',
        '�'=>'b',
        '�'=>'v',
        '�'=>'g',
        '�'=>'d',
        '�'=>'e',
        '�'=>'e',
        '�'=>'j',
        '�'=>'z',
        '�'=>'i',
        '�'=>'y',
        '�'=>'k',
        '�'=>'l',
        '�'=>'m',
        '�'=>'n',
        '�'=>'o',
        '�'=>'p',
        '�'=>'r',
        '�'=>'s',
        '�'=>'t',
        '�'=>'u',
        '�'=>'f',
        '�'=>'h',
        '�'=>'c',
        '�'=>'ch',
        '�'=>'sh',
        '�'=>'shch',
        '�'=>'',
        '�'=>'y',
        '�'=>'',
        '�'=>'e',
        '�'=>'yu',
        '�'=>'ya',
        ' '=>'-',
		'-'=>'-',
		'.'=>'-',
    );

    // �������� ������ �� �����
    $pattern = "#[�-���-ߨ\w\d\s\.-]{1}#i";
    preg_match_all($pattern, $title, $bukvy);

	//echo '<pre>';
	//print_r($bukvy);
	//echo '</pre>';
	
    $urlstr = '';
    foreach ($bukvy[0] as $b)
    {
        if( isset($letters[$b])  )
            $urlstr .= $letters[$b];
        else
            $urlstr .=$b;
    }
    #$urlstr .= '_';

	return $urlstr;
}
