<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?=$meta['title']?></title>
        <link rel="stylesheet" type="text/css" href="/css/skin1/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/skin1/featured_long_style.css" />
        <link rel="stylesheet" type="text/css" href="/css/skin1/featured_long.css" />
        <link rel="stylesheet" type="text/css" href="/css/skin1/tabs.css" />
        <link rel="stylesheet" type="text/css" href="/css/skin1/firstnavigation.css" />
        <link rel="stylesheet" type="text/css" href="/css/skin1/secondnavigation.css" />
        <link rel="stylesheet" type="text/css" href="/css/skin1/default.css" />
        <link rel="stylesheet" type="text/css" href="/css/skin1/skin.css" />
        <link rel="stylesheet" type="text/css" href="/css/skin1/prettyPhoto.css" />
        <!--[if IE 7]>
                <link rel="stylesheet" type="text/css" href="/css/skin1/ie7.css">
        <![endif]-->


        <script type='text/javascript' src='/js/skin1/jquery-1.8.3.min.js'></script>
        <script type='text/javascript' src='/js/skin1/jquery-ui.min.js'></script>
        <script type='text/javascript' src='/js/skin1/tabs.js'></script>
<!--        <script type='text/javascript' src='/js/skin1/superfish.js'></script>-->
        <script type='text/javascript' src='/js/skin1/hoverIntent.js'></script>
        <script type='text/javascript' src='/js/skin1/custom.js'></script>
        <script type='text/javascript' src='/js/skin1/jquery.jcarousel.min.js'></script>
        <script type='text/javascript' src='/js/skin1/jquery.prettyPhoto.js'></script>
        <script type='text/javascript' src='/js/skin1/sb.js'></script>

    </head>

    <body>

        <div id="container">

            <div id="headernavigation">

                <div class="navigation">
                    <ul class="firstnav-menu">
                        <? foreach ($main_menu_list as $main_link): ?>
                            <li class="page_item page-item-372"><a href="/<?= $main_link['url_name'] ?>/"><?= $main_link['name'] ?></a></li>
                        <? endforeach; ?>
                    </ul>    
                </div><!-- #navigation closer -->
            </div><!-- #headernavigation closer -->
            <div id="content">
                <div id="white_space">
                    <div id="content_holder">
                        <div id="header">
                            <a href="/"><img src="/img/logo3.png" border="0" alt="Однако Logo" class="logo"  /></a>
<!--                            <div class="ad "></div> #ad 468x60 closer -->

                        <div class="search_top_block">
                            <form action="/search/<?=$main_cat_ar['url_name']?>/1/" method="get" name="search" >
                                <input type="text" name="q" value="" />
                                <div id="top_search_submit" onclick="document.search.submit();"></div>
                            </form>
                        </div>
                        </div><!-- #header closer -->

                        <div id="categories">
                            <ul class="secondnav-menu">
                                <? foreach ($second_menu_list as $second_menu_ar): ?>
                                    <li class="cat-item cat-item-<?= $second_menu_ar['id'] ?>">
                                        <a href="/<?= $main_cat_ar['url_name'] ?>/<?= $second_menu_ar['url_name'] ?>/" ><?= $second_menu_ar['name'] ?></a>
                                    </li>
                                <? endforeach; ?>   
                            </ul>
                        </div><!-- #categories closer -->

                        <div class="cat_line"></div>

                        <?= $top_slider; ?>

                        <div id="middle">
                            <div id="left">
                                <?= $content ?>
                            </div><!-- #left closer -->
                            <div id="right">
                                <?= $right; ?>
                            </div><!-- #right closer -->
                        </div><!-- #content_holder closer -->
                    </div>
                </div><!-- #content closer -->
            </div>

            <div id="footer_widget" >
                <div class="inside">
                    <div id="footer_all_cat_block">
                        <? 
                            foreach($footer_menu_list as $menuList):
                        ?>
                        <div class="footer_acb_main_cat">
                            <a href="/<?=$menuList['url_name']?>/" class="footer_main_cat_a"><?=$menuList['name']?></a><br />
                            <div class="footer_acb_sec_cat">
                                <?
                                    if( $menuList['s_cat'] != NULL ):
                                        foreach($menuList['s_cat'] as $sCat):
                                ?>
                                <a href="/<?=$menuList['url_name']?>/<?=$sCat['url_name']?>/"><?=$sCat['name']?></a>
                                <? endforeach; endif;?>
                            </div>
                        </div>
                        <?endforeach;?>
                        
                    </div>
                </div><!-- #inside -->
            </div><!-- #footer_widget closer -->

            <div id="footer">
                <div class="inside">
                    <div class="left">&copy; 2013 Odnako.su. All Rights Reserved.</div><!-- #left -->
                    <div class="right"></div><!-- #right -->
                </div><!-- #inside -->
            </div><!-- #footer -->
        </div><!-- #container closer -->
        
        <!--LiveInternet counter-->
        <div style="overflow: hidden; height: 1px; width: 1px; position: absolute; top: -100px;">
            <script type="text/javascript"><!--
            document.write("<a href='http://www.liveinternet.ru/click' "+
            "target=_blank><img src='//counter.yadro.ru/hit?t14.5;r"+
            escape(document.referrer)+((typeof(screen)=="undefined")?"":
            ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
            screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
            ";"+Math.random()+
            "' alt='' title='LiveInternet: показано число просмотров за 24"+
            " часа, посетителей за 24 часа и за сегодня' "+
            "border='0' width='88' height='31'><\/a>")
            //--></script>
        </div>
        <!--/LiveInternet-->

    </body>
</html>