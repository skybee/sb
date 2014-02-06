<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div class="single">
    <div class="active"><h1><?=$doc_data['title']?></h1></div>
    <div class="date">
        <div class="left">
            <span class="date">
                <a href="" title="Перейти к разделу" rel="category"><?=$main_cat_ar['name'].': '.$doc_data['cat_name']?></a>
                <span class="time"> — 11 December 2010</span>        
            </span>
        </div><!-- #left -->
    </div><!-- #date -->

    <div class="content">
        <?  if( !empty($doc_data['main_img']) ): ?>
        <div class="thumb ">
            <a href="/upload/images/real/<?=$doc_data['main_img']?>" rel="prettyPhoto" title="<?=$doc_data['title']?>">
                <img src="/upload/images/medium/<?=$doc_data['main_img']?>" alt="<?=$doc_data['title']?>" class="imgf" style="opacity: 1;">
            </a>
        </div>
        <?  endif; ?>
        
    <?=$doc_data['text']?>
        
    </div><!-- #content -->
    <div id="video_holder" style="display:none;"></div>
    <div class="othernews">
        <div class="listing other_news_listing" style="margin-bottom:10px;">
            <div class="header">
                <h1>читайте также:</h1>
            </div><!-- #header -->
            
            <?  
                foreach( $like_articles as $likeArts ): 
                    $newsUrl = "/{$main_cat_ar['url_name']}/{$s_cat_ar['url_name']}/-{$likeArts['id']}-{$likeArts['url_name']}/";
                
                    if( !empty($likeArts['main_img']) ) 
                        $imgUrl = '/upload/images/small/'.$likeArts['main_img'];
                    else
                        $imgUrl = '/img/default_news.jpg';
            ?>
            
            <div class="left_other_news">
                <a href="<?=$newsUrl?>">
                    <img src="<?=$imgUrl?>" alt="<?=$likeArts['title']?>">
                </a>
                <div class="content"><h4><a href="<?=$newsUrl?>"><?=$likeArts['title']?></a></div>
            </div><!-- #left_other_news -->
            <? endforeach; ?>
                        
            
        </div><!-- #listing -->
    </div><!-- #othernews -->


</div>
