<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<meta property="og:title" content="<?=$doc_data['title']?>"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="http://<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>"/>
<meta property="og:site_name" content="Odnako.su"/>
<meta property="og:description" content="<?= mb_substr( strip_tags($doc_data['text']), 0, 200)?>..."/>

<? if( !empty($doc_data['main_img']) ): ?>
<meta property="og:image" content="http://<?=$_SERVER['HTTP_HOST']?>/upload/images/medium/<?=$doc_data['main_img']?>"/>
<? endif; ?>

<meta name="description" content="<?=$doc_data['title']?>: <?= mb_substr( strip_tags($doc_data['text']), 0, 100)?>..." />    

