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
                    <div class="icon_holder"><a href="/"><img src="/img/rss.png" alt="Subscribe to our Rss" class="shareimg"  /></a><a href="http://www.twitter.com/#"><img src="/img/twitter.png" alt="Follow us on Twitter!" class="shareimg" /></a><a href="http://www.facebook.com/#"><img src="/img/facebook.png" alt="Follow us on Facebook!" class="shareimg" /></a><a href="http://www.youtube.com/user/#"><img src="/img/youtube.png" alt="Check out our Youtube!" class="shareimg"  /></a></div><!-- #icon holder closer --></div><!-- #navigation closer -->
            </div><!-- #headernavigation closer -->
            <div id="content">
                <div id="white_space">
                    <div id="content_holder">
                        <div id="header">
                            <a href="/"><img src="/img/logo3.png" border="0" alt="Однако Logo" class="logo"  /></a>
                            <div class="ad "></div><!-- #ad 468x60 closer -->
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
                                123
                            </div><!-- #right closer -->
                        </div><!-- #content_holder closer -->
                    </div>
                </div><!-- #content closer -->
            </div>

            <div id="footer_widget" >
                <div class="inside">
                    <!-- WIDGET SPACE -->
                    <div class="widget_h_l">
                        <div id="archives-4" class="widget"><h3 class="widget-title"><span class="title">Archives</span></h3>		<ul>
                                
                            </ul>
                        </div><!-- #widget -->
                    </div><!-- #widget_h -->

                    <div class="widget_h_m">
                        <div id="lt_flickr_widget-4" class="widget">  
                            <div id="flickr">   
                                <h3 class="widget-title"><span class="title">Flickr Photostream</span></h3>
                            </div>     
                        </div><!-- #widget -->
                    </div><!-- #widget_h -->

                    <div class="widget_h_m">
                        <div id="meta-2" class="widget"><h3 class="widget-title"><span class="title">Meta</span></h3>			<ul>
                                <li><a href="/">Log in</a></li>
                                <li><a href="/">RSS</abbr></a></li>
                                <li><a href="/">RSS</abbr></a></li>
                                <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>
                            </ul>
                        </div><!-- #widget -->
                    </div><!-- #widget_h -->

                    <div class="widget_h_r">
                        <div id="text-3" class="widget"><h3 class="widget-title"><span class="title">Text Widget</span></h3>			<div class="textwidget">Maecenas mattis, tortor ut posuere aliquam, quam enim accumsan purus, auctor placerat orci velit vitae massa. Vivamus non iaculis lectus. Sed dignissim metus ac libero sagittis non iaculis lorem mattis.</div>
                        </div><!-- #widget -->
                    </div><!-- #widget_h -->

                    <div class="logo">
                        <img src="/img/london_live_footer.png" alt="London Live" />
                        <a href="#top" class="toparrow"><img src="/img/top_arrow.png" class="top" /></a>
                    </div>
                    <!-- WIDGET END -->
                </div><!-- #inside -->
            </div><!-- #footer_widget closer -->

            <div id="footer">
                <div class="inside">
                    <div class="left">&copy; 2012 London Live. All Rights Reserved.</div><!-- #left -->
                    <div class="right">Powered by Wordpress. Designed by <a href="http://londonthemes.com/index.php?themeforest=true">Skyali</a></div><!-- #right -->
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