<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<h3 class="widget-title">
    <span class="title">TOP News</span>
</h3>

<div class="right-top-news">
    <div id="right-top-news-slider">
        
        <?php
            $i=0;
            foreach($right_top as $article):
                $newsUrl    = "/{$article['full_uri']}-{$article['id']}-{$article['url_name']}/";
        ?>
        
        <div>
            <div class="right-top-news-item">
                <a href="<?=$newsUrl?>">
                    <?php if($i==0): ?>
                    <img src="/upload/images/medium/<?=$article['main_img']?>" alt="" onerror="imgError(this);" />
                    <?php else: ?>
                    <img data-src="/upload/images/medium/<?=$article['main_img']?>" src="/img/default_news.jpg" alt="" onerror="imgError(this);" />
                    <?php endif;?>
                </a>
                <div class="right-top-news-title">
                    <?=$article['title']?>
                </div>
            </div>
        </div>
        
        <?php  
            $i++;
            endforeach; 
        ?>
    </div>
</div>

<div class="right_gad_block">
    <span class="gAd" data="right top"></span>
</div>

<style>
    #unit_83636 td{
        padding-top: 7px !important;
        padding-bottom: 7px !important;
    }
    #unit_83636 td a{ line-height: 18px; }
    #unit_83636 tr:nth-child(4) td/*,
    #unit_83636 tr:nth-child(7) td*/{
        padding-top: 20px !important;
    }
    #unit_83636 tr:nth-child(3) td/*,
    #unit_83636 tr:nth-child(6) td*/{
        padding-bottom: 20px !important;
        border-bottom-width: 2px;
        border-bottom-color: #209c00;
    }
</style>
<div id="unit_83636" style="float:left;margin:0 0 20px 8px;"><!--<a href="http://smi2.net/">Новости СМИ2</a>--></div>
<script type="text/javascript" charset="utf-8">
  (function() {
    var sc = document.createElement('script'); sc.type = 'text/javascript'; sc.async = true;
    sc.src = '//news.smi2.ru/data/js/83636.js'; sc.charset = 'utf-8';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sc, s);
  }());
</script>

<!--
<div id="right-ajax-block">
</div>
-->


<h3 class="widget-title">
    <span class="title">Последние новости</span>
</h3>

<div class="last_news_one_block">
    <?php $firstNews = &$last_news['first']; ?>
    <a class="lnob_img_block" href="<?="/{$firstNews['full_uri']}-{$firstNews['id']}-{$firstNews['url_name']}/"?>">
        <img src="/upload/images/medium/<?=$firstNews['main_img']?>" alt="" onerror="imgError(this);" />
        <div class="lnob_title">
            <?=$firstNews['title']?>
        </div>
    </a>
</div>

<div class="last_news_list">
<?php
    foreach ($last_news['all'] as $lnews ):
?>
    <div class="lnl_news">
        <!--
        <span>
            <?#=$lnews['date_ar']['time']?> 
        </span>
        -->
        <a href="<?="/{$lnews['full_uri']}-{$lnews['id']}-{$lnews['url_name']}/"?>">
            <?=$lnews['title']?>
        </a>    
    </div>
<?php
    endforeach;
?>
    
    
    <?php 
        $hcRel = '';
        if(preg_match("/YandexBot/i", $_SERVER['HTTP_USER_AGENT']))
        {
            $hcRel = ' rel="nofollow" ';
        }
    ?>
    
    <?php if( $_SERVER['REQUEST_URI'] == '/' ): //HC Link ?>
        <div class="lnl_news">
            <span>
            </span>
            <a <?=$hcRel?> href="http://house-control.org.ua/category/cctv-systems/" > Видеонаблюдение - система IP камер</a>
        </div>
    <?php elseif( $_SERVER['REQUEST_URI'] == '/hi-tech/' ): ?>
        <div class="lnl_news">
            <span>
            </span>
            <a <?=$hcRel?> href="http://house-control.org.ua/category/kamera/" > Камеры для видеонаблюдения </a>
        </div>
    <?php endif; ?>
    
</div>



<?php if( isset($serp_list) && $serp_list != false): ?>

<h3 class="widget-title" style="margin-top: 30px;">
    <span class="title">Похожее на других сайтах</span>
</h3>

<div class="serp_block">

    <?php foreach($serp_list as $serp): ?>
    <h4 rel="<?=$serp['url']?>">
        <?=$serp['title']?>
        <span>- <?=$serp['host']?></span>
    </h4>
    <p><?=$serp['text']?></p>
    <?php endforeach; ?>

</div>

<?php endif; ?>

