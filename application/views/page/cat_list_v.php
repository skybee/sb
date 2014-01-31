<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="list_categories">

    <div class="active">
        <h2><?=$main_cat_ar['name']?>: <span class="highlight_archive"><?=$s_cat_ar['name']?></span></h2>
    </div><!-- #active -->


<? foreach( $news_page_list as $news_page_ar ): 
   $news_url = "/{$main_cat_ar['url_name']}/{$s_cat_ar['url_name']}/-{$news_page_ar['id']}-{$news_page_ar['url_name']}/";
?>
    <div class="listing">
        <div class="content">
            <div class="left">
                <div class="imgholder">
                    <a href="<?=$news_url?>">
                        <? if( !empty($news_page_ar['main_img']) ) 
                                $imgUrl = '/upload/images/medium/'.$news_page_ar['main_img'];
                           else
                                $imgUrl = '/img/default_news.jpg';
                        ?>
                        <img src="<?=$imgUrl?>" class="imgf" style="opacity: 1;">
                    </a>
                </div><!-- #imgholder -->
            </div><!-- #left -->
            <div class="right">
                <div class="small-desc">
                    <h3><a href="<?=$news_url?>"><?=$news_page_ar['title']?></a></h3>
                    <p><?=$news_page_ar['text']?>[...]</p>
                </div><!-- #small-desc -->
            </div><!-- #right -->
        </div><!-- #content -->
    </div><!-- #listing -->
<? endforeach; ?>

    <div class="news_pager">
        <ul>
            <? foreach ($pager_ar as $page): ?>
            <li>
                <? if($page != $page_nmbr && $page != '...'): ?>
                <a href="<?='/'.$main_cat_ar['url_name'].'/'.$s_cat_ar['url_name'].'/'.$page.'/'?>"><?=$page?></a>
                <? else: ?>
                <span class="pager_not_link"><?=$page?></span>
                <? endif;?>
            </li>
            <? endforeach; ?>
        </ul>
    </div>
    
</div>

