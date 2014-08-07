<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<h3 class="widget-title">
    <span class="title">Последние новости</span>
</h3>

<div class="last_news_one_block">
    <? $firstNews = &$last_news['first']; ?>
    <a class="lnob_img_block" href="<?="/{$firstNews['full_uri']}-{$firstNews['id']}-{$firstNews['url_name']}/"?>">
        <img src="/upload/images/medium/<?=$firstNews['main_img']?>" alt="" onerror="imgError(this);" />
        <div class="lnob_title">
            <?=$firstNews['title']?>
        </div>
    </a>
</div>

<div class="last_news_list">
<?
    foreach ($last_news['all'] as $lnews ):
?>
    <div class="lnl_news">
        <span>
            <?=$lnews['date_ar']['time']?> 
            <!--<span><?//=$lnews['s_cat_name']?></span>-->
        </span>
        <a href="<?="/{$lnews['full_uri']}-{$lnews['id']}-{$lnews['url_name']}/"?>">
            : &nbsp;<?=$lnews['title']?>
        </a>    
    </div>
<?
    endforeach;
?>
    
    <!--<pre><? //print_r($last_news)?></pre>-->
</div>