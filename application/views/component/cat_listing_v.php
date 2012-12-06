<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<? foreach( $mainpage_cat_list as $catlist_ar ): ?>

<div class="cat_listing">

    <div class="header">
        <h1>
            <a href="/<?=$catlist_ar['s_cat_ar']['f_cat_uname']?>/<?=$catlist_ar['s_cat_ar']['url_name']?>/">
                <?=$catlist_ar['s_cat_ar']['name']?>
            </a>
        </h1>
    </div><!-- #header -->

    <div class="content">
        <div class="left">
            <div class="imgholder">
                <a href="/<?=$catlist_ar['s_cat_ar']['f_cat_uname']?>/<?=$catlist_ar['s_cat_ar']['url_name']?>/doc/-<?=$catlist_ar[0]['id']?>-<?=$catlist_ar[0]['url_name']?>/">
                    <img src="/upload/news/<?=$catlist_ar[0]['main_img']?>" alt="<?=$catlist_ar[0]['title']?>" class="imgf"  border="0" style="height:213px;" />
                </a>
                <div class="description"><h3><a href="/<?=$catlist_ar['s_cat_ar']['f_cat_uname']?>/<?=$catlist_ar['s_cat_ar']['url_name']?>/doc/-<?=$catlist_ar[0]['id']?>-<?=$catlist_ar[0]['url_name']?>/"><?=$catlist_ar[0]['title']?></a></h3></div><!-- #description -->
            </div><!-- #imgholder -->
        </div><!-- #left -->
        
        
        <div class="right">
            <? if( isset($catlist_ar[1]) ): ?>
            <div class="small-listing">
                <div class="thumb">
                    <a href="/<?=$catlist_ar['s_cat_ar']['f_cat_uname']?>/<?=$catlist_ar['s_cat_ar']['url_name']?>/doc/-<?=$catlist_ar[1]['id']?>-<?=$catlist_ar[1]['url_name']?>/">
                        <img src="/upload/news/<?=$catlist_ar[1]['main_img']?>" alt="<?=$catlist_ar[1]['title']?>" class="shareimg" border="0" />
                    </a>
                </div><!-- #thumb -->
                <div class="description"><h4><a href="/<?=$catlist_ar['s_cat_ar']['f_cat_uname']?>/<?=$catlist_ar['s_cat_ar']['url_name']?>/doc/-<?=$catlist_ar[1]['id']?>-<?=$catlist_ar[1]['url_name']?>/"><?=$catlist_ar[1]['title']?></a></h4></div><!-- #description -->
            </div><!-- #small-listing -->
            <? endif; ?>
            
            <? if( isset($catlist_ar[2]) ): ?>
            <div class="small-listing">
                <div class="thumb">
                    <a href="/<?=$catlist_ar['s_cat_ar']['f_cat_uname']?>/<?=$catlist_ar['s_cat_ar']['url_name']?>/doc/-<?=$catlist_ar[2]['id']?>-<?=$catlist_ar[2]['url_name']?>/">
                        <img src="/upload/news/<?=$catlist_ar[2]['main_img']?>" alt="<?=$catlist_ar[2]['title']?>" class="shareimg" border="0" />
                    </a>
                </div><!-- #thumb -->
                <div class="description"><h4><a href="/<?=$catlist_ar['s_cat_ar']['f_cat_uname']?>/<?=$catlist_ar['s_cat_ar']['url_name']?>/doc/-<?=$catlist_ar[2]['id']?>-<?=$catlist_ar[2]['url_name']?>/"><?=$catlist_ar[2]['title']?></a></h4></div><!-- #description -->
            </div><!-- #small-listing -->
            <? endif; ?>
            
            <? if( isset($catlist_ar[3]) ): ?>
            <div class="small-listing">
                <div class="thumb">
                    <a href="/<?=$catlist_ar['s_cat_ar']['f_cat_uname']?>/<?=$catlist_ar['s_cat_ar']['url_name']?>/doc/-<?=$catlist_ar[3]['id']?>-<?=$catlist_ar[3]['url_name']?>/">
                        <img src="/upload/news/<?=$catlist_ar[3]['main_img']?>" alt="<?=$catlist_ar[3]['title']?>" class="shareimg" border="0" />
                    </a>
                </div><!-- #thumb -->
                <div class="description"><h4><a href="/<?=$catlist_ar['s_cat_ar']['f_cat_uname']?>/<?=$catlist_ar['s_cat_ar']['url_name']?>/doc/-<?=$catlist_ar[3]['id']?>-<?=$catlist_ar[3]['url_name']?>/"><?=$catlist_ar[3]['title']?></a></h4></div><!-- #description -->
            </div><!-- #small-listing -->
            <? endif; ?>
            
        </div><!-- #right -->
    </div><!-- #content -->
</div><!-- #listing -->

<? endforeach; ?>

