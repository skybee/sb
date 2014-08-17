<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?= $meta['title'] ?></title>
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
        
        <? if(isset($meta['og'])) echo $meta['og']; ?>

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
                                <form action="/search/1/" method="get" name="search" >
                                    <input type="text" name="q" value="" />
                                    <div id="top_search_submit" onclick="document.search.submit();"></div>
                                </form>
                            </div>
                        </div><!-- #header closer -->

                        <div id="categories">
                            <ul class="secondnav-menu">
                                <? foreach ($second_menu_list as $second_menu_ar): ?>
                                    <li class="cat-item cat-item-<?= $second_menu_ar['id'] ?>">
                                        <a href="/<?= $second_menu_ar['full_uri'] ?>" ><?= $second_menu_ar['name'] ?></a>
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
                        foreach ($footer_menu_list as $menuList):
                            ?>
                            <div class="footer_acb_main_cat">
                                <a href="/<?= $menuList['url_name'] ?>/" class="footer_main_cat_a"><?= $menuList['name'] ?></a><br />
                                <div class="footer_acb_sec_cat">
                                    <?
                                    if ($menuList['s_cat'] != NULL):
                                        foreach ($menuList['s_cat'] as $sCat):
                                            ?>
                                            <a href="/<?= $menuList['url_name'] ?>/<?= $sCat['url_name'] ?>/"><?= $sCat['name'] ?></a>
                                        <? endforeach;
                                    endif; ?>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                    <div class="footer_contact">
                        <span>Контакты</span><br />
                        E-mail: <a href="mailto:mail@odnako.su">mail@odnako.su</a>
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

        
        <div style="overflow: hidden; height: 1px; width: 1px; position: absolute; top: -100px;">
            <!--LiveInternet counter-->
            <script type="text/javascript"><!--
            document.write("<a href='http://www.liveinternet.ru/click' " +
                        "target=_blank><img src='//counter.yadro.ru/hit?t14.5;r" +
                        escape(document.referrer) + ((typeof (screen) == "undefined") ? "" :
                        ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                                screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
                        ";" + Math.random() +
                        "' alt='' title='LiveInternet: показано число просмотров за 24" +
                        " часа, посетителей за 24 часа и за сегодня' " +
                        "border='0' width='88' height='31'><\/a>")
                        //--></script>
            <!--/LiveInternet-->
            
            <!-- Yandex.Metrika counter -->
            <script type="text/javascript">
                                (function(d, w, c) {
                                    (w[c] = w[c] || []).push(function() {
                                        try {
                                            w.yaCounter24764222 = new Ya.Metrika({id: 24764222,
                                                webvisor: true,
                                                clickmap: true,
                                                accurateTrackBounce: true});
                                        } catch (e) {
                                        }
                                    });

                                    var n = d.getElementsByTagName("script")[0],
                                            s = d.createElement("script"),
                                            f = function() {
                                                n.parentNode.insertBefore(s, n);
                                            };
                                    s.type = "text/javascript";
                                    s.async = true;
                                    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                                    if (w.opera == "[object Opera]") {
                                        d.addEventListener("DOMContentLoaded", f, false);
                                    } else {
                                        f();
                                    }
                                })(document, window, "yandex_metrika_callbacks");
            </script>
            <noscript><div><img src="//mc.yandex.ru/watch/24764222" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
            <!-- /Yandex.Metrika counter -->
        </div>
        


    </body>
</html>