<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function seoUrl( $title )
{
    $title = iconv('utf-8', 'cp1251//IGNORE', $title);
	$title = preg_replace("#&[a-z]+;#i", ' ', $title); //�������� ���������
	$title = preg_replace("|&#\d{2,4};|i", ' ', $title); //�������� ���������
	$title = strtolower( trim($title) );

    $letters = array(
        '�'=>'a',
        '�'=>'b',
        '�'=>'v',
        '�'=>'g',
        '�'=>'d',
        '�'=>'e',
        '�'=>'e',
		'�'=>'e',
        '�'=>'j',
        '�'=>'z',
        '�'=>'i',
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
		'�'=>'e',
        '�'=>'j',
        '�'=>'z',
        '�'=>'i',
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
		'`'=>''
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
