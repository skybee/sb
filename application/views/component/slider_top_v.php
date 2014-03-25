<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- SLIDER -->

<div id="featured" >
    
    <ul class="ui-tabs-nav">
        <?  $i = 1;
            foreach($articles as $article):
        ?>
        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?=$i?>">
            <a href="#fragment-<?=$i?>">
                <img src="/upload/images/small/<?=$article['main_img']?>" alt="" onerror="imgError(this);" />
            </a>
        </li>
        <? $i++; endforeach; ?>
    </ul>

    
<?  $i = 1;
    foreach($articles as $article):
        
    $newsUrl    = "/{$main_cat_url}/{$article['cat_url']}/-{$article['id']}-{$article['url_name']}/"; 
    $dateAr     =& $article['date'];
    $dateStr    = $dateAr['day_str'].', '.$dateAr['day_nmbr'].' '.$dateAr['month_str'].' '.$dateAr['year_nmbr'];
?>
    <!-- 1 Content -->
    <div id="fragment-<?=$i?>" class="ui-tabs-panel " style="margin-top:1px; background-color:transparent; float:left;">
        <a href="<?=$newsUrl?>" class="top_slide_main_img">
            <img src="/upload/images/medium/<?=$article['main_img']?>" alt="" border="0" onerror="imgError(this);" />
        </a>
        <div class="info">
            <h2><a href="<?=$newsUrl?>" ><?=$article['title']?></a></h2>
            <span class="date"><?=$dateStr?></span>
            <p><?=$article['text']?> [&hellip;]</p>
        </div><!-- #info closer -->
    </div><!-- #fragment-1 closer -->
<? $i++; endforeach; ?>
    
</div><!-- #featured closer -->
<!-- SLIDER END -->