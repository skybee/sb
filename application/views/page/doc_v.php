<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<span id="docId" docId="<?=$doc_data['id']?>" style="display: none" ></span>

<div class="single">
    <div class="active">
        <h1><?=$doc_data['title']?></h1>
    </div>
    
    <div style="height: 15px; margin-top: 10px; ">
        <script type="text/javascript">loadGAd('text link blue');</script>
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
            <a class="doc-donor-link" href="http://<?=$doc_data['d_host']?>/" <?=$donor_rel;?> target="_blank" style="background-image: url('http://favicon.yandex.net/favicon/<?=$doc_data['d_host']?>');">
                <?=$doc_data['d_name']?>
            </a>
        </div>
    </div><!-- #date -->
    
    
    
        <?  #if( !empty($doc_data['main_img']) ): ?>
<!--        <div class="content-gAd">
            <div class="content-gAd-center">
                <script type="text/javascript">loadGAd('content top');</script>
            </div>
        </div>-->
        <?  #endif; ?>
    
    

    <div class="content copy-url">
        
        <?  if( !empty($doc_data['main_img']) ): ?>
        <div class="thumb thumb-fix-block">
            <div class="thumb-fix-block-bg">
                <a href="/upload/images/real/<?=$doc_data['main_img']?>" title="<?=$doc_data['title']?>" class="image-popup-no-margins" >
                    <img src="/upload/images/medium/<?=$doc_data['main_img']?>" alt="<?=$doc_data['title']?>" class="imgf" style="opacity: 1;" onerror="imgError(this);" />
                </a>
            </div>
        </div>
        <?  endif; ?>
        
        <div class="thumb thumb-gAd">
            <script type="text/javascript">loadGAd('content noImg');</script>
        </div>
        
    <?=$doc_data['text']?>
        
    </div><!-- #content -->
    
    <div class="doc-date doc-date-bottom">
        <div class="social_btn">
            <!--<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>-->
            <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus"></div> 
        </div>
        <div class="dd_left">
            &mdash; &nbsp; Поделится Новостью в Соц. Сетях
        </div>
    </div>
    
    <div class="content-gAd content-gAd-bottom">
        <div class="content-gAd-center">
            <script type="text/javascript">loadGAd('content bottom Netboard');</script>
        </div>
    </div>
    
<!--    <div style="float:left;">
        <script language="Javascript">
            var bntuniqid = 'bPq7TNrWAhoDdq97yDX3';
            var bntuniqsid = '73768';
            var async = 0;
        </script>
        <script type="text/javascript" src="http://herefegedef.net/viewt.js"></script>
    </div>-->
    
    <div id="video_holder" style="display:none;"></div>
    <div class="othernews">
        
        
        <!-- likeArticlesSlider -->
        <div id="like-acle-slider" class="listing">
            <div class="header">
                <h2 class="doc-cat-title">смотрите также:</h2>
            </div><!-- #header -->
            
            <div class="slider-block">
                
                <?  
                    $cntNews = count($like_articles);

                    for($i   = 1; $i<=$cntNews; $i = $i+3 ):
                ?>

                <div>
                    <div class="slider-block-item">    

                        <?
                            $ii = 0;
                            foreach( $like_articles as $key=>$likeArts ):

                            $newsUrl    = "/{$likeArts['full_uri']}-{$likeArts['id']}-{$likeArts['url_name']}/";
                            $dateAr     =& $likeArts['date'];
                            $dateStr    = $dateAr['day_str'].' &nbsp;'.$dateAr['time'].', &nbsp;&nbsp;'.$dateAr['day_nmbr'].' '.$dateAr['month_str'].' '.$dateAr['year_nmbr'];

                            if (!empty($likeArts['main_img']))
                                $imgUrl = '/upload/images/medium/' . $likeArts['main_img'];
                            else
                                $imgUrl = '/img/default_news.jpg';
                        ?>

                        <div class="listing">
                            <div class="content">
                                <div class="left">
                                    <div class="imgholder">
                                        <a href="<?=$newsUrl?>">
                                            <img src="<?=$imgUrl?>" class="imgf" style="opacity: 1;" onerror="imgError(this);">
                                        </a>
                                        <div class="like-art-date"><?=$likeArts['date_ar']['day_nmbr'].' '.$likeArts['date_ar']['month_str'].' '.$likeArts['date_ar']['year_nmbr']?></div>
                                    </div><!-- #imgholder -->
                                </div><!-- #left -->
                                <div class="right">
                                    <div class="small-desc">
                                        <h3><a href="<?=$newsUrl?>"><?=$likeArts['title']?></a></h3>
                                        <p><?=$likeArts['text']?></p>
                                    </div><!-- #small-desc -->
                                </div><!-- #right -->
                            </div><!-- #content -->
                        </div><!-- #listing -->

                        <? 
                            unset( $like_articles[$key] );
                            $ii++;
                            if($ii >= 3 ) break;
                            endforeach; 
                        ?>

                    </div>
                </div>
                <? endfor; ?>
                
            </div>
        </div>
        <!-- /likeArticlesSlider -->
        
        
        
        
    </div><!-- #othernews -->
    
    <div class="doc-comments">
        <div class="listing" style="margin-bottom:10px; margin-top: 15px;">
            <div class="header">
                <h2 class="doc-cat-title">Комментарии:</h2>
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
