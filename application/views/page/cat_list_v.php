<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="list_categories">

    <div class="active">
        <h2><?=$cat_ar['p_name']?>: <span class="highlight_archive"><?=$cat_ar['name']?></span></h2>
    </div><!-- #active -->


<?  
    if( isset($news_page_list) && $news_page_list != NULL ):
    foreach( $news_page_list as $news_page_ar ):
        $news_url   = "/{$news_page_ar['full_uri']}-{$news_page_ar['id']}-{$news_page_ar['url_name']}/";
        $dateAr     =& $news_page_ar['date'];
        $dateStr    = $dateAr['day_str'].' &nbsp;'.$dateAr['time'].', &nbsp;&nbsp;'.$dateAr['day_nmbr'].' '.$dateAr['month_str'].' '.$dateAr['year_nmbr'];
?>
    <div class="listing">
        <h2 class="cat-list-title">
            <a href="<?=$news_url?>" target="_blank" ><?=$news_page_ar['title']?></a>
        </h2>
        <div class="content">
            <div class="left">
                <div class="imgholder">
                    <a href="<?=$news_url?>" target="_blank" >
                        <? if( !empty($news_page_ar['main_img']) ) 
                                $imgUrl = '/upload/images/medium/'.$news_page_ar['main_img'];
                           else
                                $imgUrl = '/img/default_news.jpg';
                        ?>
                        <img src="<?=$imgUrl?>" class="imgf" style="opacity: 1;" onerror="imgError(this);">
                    </a>
                </div><!-- #imgholder -->
            </div><!-- #left -->
            <div class="right">
                <div class="small-desc">
                    <!--<h3><a href="<?=$news_url?>"><?=$news_page_ar['title']?></a></h3>-->
                    <div class="date_source">
                        <div class="cat-list-date"><?=$dateStr?></div>
                        <div class="cat-list-donor">
                                <?=$news_page_ar['d_name']?>
                        </div>
                    </div>
                    <p><?=$news_page_ar['text']?>[...]</p>
                </div><!-- #small-desc -->
            </div><!-- #right -->
        </div><!-- #content -->
    </div><!-- #listing -->
<? 
    endforeach; 
    else:
?>
    Нет результатов для отображения
<? 
    endif;
?>

    <div class="news_pager">
        <ul>
            <? 
                foreach ($pager_ar as $page): 
                if( !isset($search_url_str) )
                    $pager_url = '/'.$cat_ar['full_uri'].$page.'/';
                else
                    $pager_url = '/search/'.$page.'/?q='.$search_url_str;
            ?>
            <li>
                <? if($page != $page_nmbr && $page != '...'): ?>
                <a href="<?=$pager_url?>"><?=$page?></a>
                <? else: ?>
                <span class="pager_not_link"><?=$page?></span>
                <? endif;?>
            </li>
            <? endforeach; ?>
        </ul>
    </div>
    
</div>

