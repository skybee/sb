<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="single">
    <div class="active">
        <h1><?=$doc_data['title']?></h1>
    </div>
    <div class="doc-date">
        
        <div class="social_btn">
            <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
            <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus"></div> 
        </div>
        
        <div class="dd_left">
            <? $dateAr =& $doc_data['date_ar']; ?>
            <?=$dateAr['time'].'&nbsp;&nbsp;&nbsp;'.$dateAr['day_nmbr'].' '.$dateAr['month_str'].' '.$dateAr['year_nmbr'];?>
        </div>
        
        <div class="dd_right">
            Источник: &nbsp;&nbsp;
            <a class="doc-donor-link" href="http://<?=$doc_data['d_host']?>/" target="_blank" style="background-image: url('http://favicon.yandex.net/favicon/<?=$doc_data['d_host']?>');">
                <?=$doc_data['d_name']?>
            </a>
        </div>
    </div><!-- #date -->

    <div class="content">
        <?  if( !empty($doc_data['main_img']) ): ?>
        <div class="thumb ">
            <a href="/upload/images/real/<?=$doc_data['main_img']?>" rel="prettyPhoto" title="<?=$doc_data['title']?>">
                <img src="/upload/images/medium/<?=$doc_data['main_img']?>" alt="<?=$doc_data['title']?>" class="imgf" style="opacity: 1;" onerror="imgError(this);" />
            </a>
        </div>
        <?  endif; ?>
        
    <?=$doc_data['text']?>
        
    </div><!-- #content -->
    <div id="video_holder" style="display:none;"></div>
    <div class="othernews">
        <div class="listing other_news_listing" style="margin-bottom:10px;">
            <div class="header">
                <h1>смотрите также:</h1>
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
                    <img src="<?=$imgUrl?>" alt="<?=$likeArts['title']?>" onerror="imgError(this);">
                </a>
                <div class="content">
                    <span class="like_artcl_date">
                        <?=$likeArts['date_ar']['day_nmbr'].'.'.$likeArts['date_ar']['month_nmbr'].'&nbsp;'?>
                    </span>
<!--                    <h4>-->
                        <a href="<?=$newsUrl?>"><?=$likeArts['title']?></a>
                </div>
                <div class="lon_hide_description">
                    <div class="lon_des_arrow"></div>
                    <div class="lon_des_txt">
                        <?=$likeArts['text']?>[...]
                    </div>
                </div>
            </div><!-- #left_other_news -->
            <? endforeach; ?>
                        
            
        </div><!-- #listing -->
    </div><!-- #othernews -->
    
    <div class="doc-comments">
        <div class="listing" style="margin-bottom:10px; margin-top: 15px;">
            <div class="header">
                <h1>Комментарии:</h1>
            </div>
        </div>
        
        <!-- KAMENT -->
<!--        <div id="kament_comments"></div>
        <script type="text/javascript">
                /* * * НАСТРОЙКА * * */
                var kament_subdomain = 'odnako';

                /* * * НЕ МЕНЯЙТЕ НИЧЕГО НИЖЕ ЭТОЙ СТРОКИ * * */
                (function() {
                        var node = document.createElement('script'); node.type = 'text/javascript'; node.async = true;
                        node.src = 'http://' + kament_subdomain + '.svkament.ru/js/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(node);
                })();
        </script>
        <noscript>Для отображения комментариев нужно включить Javascript</noscript>-->
        <!-- /KAMENT -->
        
        <div id="hypercomments_widget"></div>
        <script type="text/javascript">
            _hcwp = window._hcwp || [];
            _hcwp.push({widget:"Stream", widget_id: 19400});
            (function() {
            if("HC_LOAD_INIT" in window)return;
            HC_LOAD_INIT = true;
            var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
            var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
            hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/19400/"+lang+"/widget.js";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hcc, s.nextSibling);
            })();
        </script>
        <a href="#" class="hc-link" title="comments widget">comments powered by HyperComments</a>
        
    </div>


</div>
