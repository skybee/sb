<?php ?>

<h3 class="widget-title">
    <span class="title">Последние новости</span>
</h3>

<div class="last_news_list">
<?
    foreach ($last_news as $lnews ):
?>
    <div class="lnl_news">
        <span><?=$lnews['date_ar']['time']?> </span>
        <a href="<?="/{$lnews['f_cat_uname']}/{$lnews['s_cat_uname']}/-{$lnews['id']}-{$lnews['url_name']}/"?>">
            <i><?=$lnews['s_cat_name']?></i>: &nbsp;<?=$lnews['title']?>
        </a>    
    </div>
<?
    endforeach;
?>
    
    <!--<pre><? //print_r($last_news)?></pre>-->
</div>