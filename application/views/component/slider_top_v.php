<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- SLIDER -->

<div id="featured" >
    
    <ul class="ui-tabs-nav">
        <?  $i = 1;
            foreach($articles as $article):
        ?>
        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?=$i?>">
            <a href="#fragment-<?=$i?>">
                <img src="/upload/images/small/<?=$article['main_img']?>" alt="" />
            </a>
        </li>
        <? $i++; endforeach; ?>
    </ul>

    
<?  $i = 1;
    foreach($articles as $article):
?>
    <!-- 1 Content -->
    <div id="fragment-<?=$i?>" class="ui-tabs-panel " style="margin-top:1px; background-color:transparent; float:left;">
        <a href="/" class="top_slide_main_img">
            <img src="/upload/images/medium/<?=$article['main_img']?>" alt="<?=$article['title']?>" border="0" />
        </a>
        <div class="info">
            <h2><a href="/" ><?=$article['title']?></a></h2>
            <span class="date">December 11,  2010 -  <a href="/">(0) comments</a></span>
            <p><?=$article['text']?> [&hellip;]</p>
        </div><!-- #info closer -->
    </div><!-- #fragment-1 closer -->
<? $i++; endforeach; ?>
    
</div><!-- #featured closer -->
<!-- SLIDER END -->