<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Новости Украины</title>
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
                            <a href="/"><img src="/img/london_live.png" border="0" alt="London Live" class="logo"  /></a><div class="ad "><img src="/img/468-60.png" alt="468 X 60" /></div><!-- #ad 468x60 closer --></div><!-- #header closer -->

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




                                <div id="wrap" class="hideobject">

                                    <div class=" jcarousel-skin-skyali">

                                        <div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block; ">

                                            <div class="jcarousel-clip jcarousel-clip-horizontal" style="overflow-x: hidden; overflow-y: hidden; position: relative; ">

                                                <ul id="slide_" class="jcarousel-list jcarousel-list-horizontal" style="overflow-x: hidden; overflow-y: hidden; position: relative; top: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; width: 1450px; left: 0px; ">


                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="/">
                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/spider-man.jpg&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="Spider-man 4 Coming Soon in 2012">
                                                                    </a></li>

                                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="/">
                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/john-f-kennedy.jpg&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="John F Kennedy Voted one of the best presidents">
                                                                                    </a></li>

                                                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="/">
                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/lakers.png&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="Lakers at the top of the west">
                                                                                                    </a></li>

                                                                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="/">
                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/chicago-bulls.png&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="Chicago Bulls say &quot;We are the best&quot;">
                                                                                                                    </a></li>

                                                                                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="/">
                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/boston-celtic.png&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="Celtics win another one on the road">
                                                                                                                                    </a></li>

                                                                                                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="/">
                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/BRIDGE.png&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="Top bridges to walk in the world">
                                                                                                                                                    </a></li>

                                                                                                                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="/">
                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/11/france.png&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="On the streets of france">
                                                                                                                                                                    </a></li>

                                                                                                                                                                    </ul>

                                                                                                                                                                    </div><!-- #clip -->

                                                                                                                                                                    <div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" style="display: block; " disabled="true"></div>

                                                                                                                                                                    s<div class="jcarousel-next jcarousel-next-horizontal" style="display: block; " disabled="false"></div>

                                                                                                                                                                    </div><!-- #jcarousel-container -->

                                                                                                                                                                    </div><!-- #skyali skin -->

                                                                                                                                                                    </div><!-- #wrap -->

                                                                                                                                                                    <?= $content ?>

                                                                                                                                                                    </div><!-- #left closer -->
                                                                                                                                                                    <div id="right">
                                                                                                                                                                        <div id="search-3" class="widget-container widget_search rightwidget"><form method="get" id="searchform" action="http://www.londonthemes.com/themes/londonlive">
                                                                                                                                                                                <input type="text" class="search"  name="s" id="s" value="" />
                                                                                                                                                                                <input type="submit" class="searchb" value="" />
                                                                                                                                                                            </form></div><!-- //**********************************
                                                                                                                                                                               TABS POPULAR, RECENT, COMMENTS, TAGS
                                                                                                                                                                            //*************************************** -->
                                                                                                                                                                        <div id="londontabs" class="widget ">
                                                                                                                                                                            <div id="tabsheader" class="tabsheader">
                                                                                                                                                                                <ul class="tabnav">
                                                                                                                                                                                    <li><a href="#populartab">Popular</a></li>
                                                                                                                                                                                    <li><a href="#recenttab">Recent</a></li>
                                                                                                                                                                                    <li><a href="#commentstab">Comments</a></li>
                                                                                                                                                                                    <li class="tagslast"><a href="#tagtab" class="tagslast">Tags</a></li>
                                                                                                                                                                                </ul>
                                                                                                                                                                            </div><!-- #header -->
                                                                                                                                                                            <div id="populartab" class="tabdiv"><!-- #popular -->
                                                                                                                                                                                <div class="tab_inside">
                                                                                                                                                                                    <a href="/">
                                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/toy-story-3.jpg&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Toy Story 3 One of the best movies (Video)" />
                                                                                                                                                                                    </a>
                                                                                                                                                                                    <div class="content"><h1><a href="/">December 11,  2010   </span></div><!-- #content closer -->
                                                                                                                                                                                                </div><!-- #tab_inside -->
                                                                                                                                                                                                <div class="tab_inside">
                                                                                                                                                                                                    <a href="/">
                                                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/italy-bo.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Italy gives free boat rides" />
                                                                                                                                                                                                    </a>
                                                                                                                                                                                                    <div class="content"><h1><a href="/">December 01,  2010   </span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside">
                                                                                                                                                                                                        <a href="/">
                                                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/up.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Our review on the movie Up" />
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">December 01,  2010   </span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside">
                                                                                                                                                                                                        <a href="/">
                                                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/john-f-kennedy.jpg&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="John F Kennedy Voted one of the best presidents" />
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">December 11,  2010   </span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside">
                                                                                                                                                                                                        <a href="/">
                                                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/lovers.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Love bugs bites majority of world" />
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">December 01,  2010   </span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        </div><!--#popular -->


                                                                                                                                                                                                        <div id="recenttab" class="tabdiv"><!-- #recent tab -->

                                                                                                                                                                                                        <div class="tab_inside"><a href="/">
                                                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/sharper-business.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Fresh business tips to stay on top" />
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">December 11,  2010</span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside"><a href="/">
                                                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/exercise-1.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="How much exercise is enough?" />
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">December 11,  2010</span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside"><a href="/">
                                                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/obama.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Obama stresses to his staff &quot;Failure not option&quot;" />
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">December 11,  2010</span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside"><a href="/">
                                                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/durant.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Kevin Durant set to surpass legends" />
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">December 11,  2010</span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside"><a href="/">
                                                                                                                                                                                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/toy-story-3.jpg&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Toy Story 3 One of the best movies (Video)" />
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">December 11,  2010</span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->

                                                                                                                                                                                                        </div><!--#recent tab -->


                                                                                                                                                                                                        <div id="commentstab" class="tabdiv"><!-- #commentstab -->

                                                                                                                                                                                                        <div class="tab_inside">
                                                                                                                                                                                                        <a href="/"><img alt='' src='http://0.gravatar.com/avatar/207c3a86af3d4725c54de5bb00df6950?s=53&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D53&amp;r=G' class='avatar avatar-53 photo' height='53' width='53' /></a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">Duis tempor tellus sed magna mollis sed porttitor turpis bibendum. Fus</span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside">
                                                                                                                                                                                                        <a href="/"><img alt='' src='http://0.gravatar.com/avatar/207c3a86af3d4725c54de5bb00df6950?s=53&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D53&amp;r=G' class='avatar avatar-53 photo' height='53' width='53' /></a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">Nullam condimentum magna id diam hendrerit facilisis. Donec hendrerit </span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside">
                                                                                                                                                                                                        <a href="/"><img alt='' src='http://0.gravatar.com/avatar/207c3a86af3d4725c54de5bb00df6950?s=53&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D53&amp;r=G' class='avatar avatar-53 photo' height='53' width='53' /></a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">Nullam condimentum magna id diam hendrerit facilisis. Donec hendrerit </span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside">
                                                                                                                                                                                                        <a href="/"><img alt='' src='http://0.gravatar.com/avatar/207c3a86af3d4725c54de5bb00df6950?s=53&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D53&amp;r=G' class='avatar avatar-53 photo' height='53' width='53' /></a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">Mauris tempor, elit eget viverra lacinia, velit enim vestibulum mi, sc</span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->
                                                                                                                                                                                                        <div class="tab_inside">
                                                                                                                                                                                                        <a href="/"><img alt='' src='http://0.gravatar.com/avatar/207c3a86af3d4725c54de5bb00df6950?s=53&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D53&amp;r=G' class='avatar avatar-53 photo' height='53' width='53' /></a>
                                                                                                                                                                                                        <div class="content"><h1><a href="/">Mauris tempor, elit eget viverra lacinia, velit enim vestibulum mi, sc</span></div><!-- #content closer -->
                                                                                                                                                                                                        </div><!-- #tab_inside -->

                                                                                                                                                                                                        </div><!-- #commentstab -->


                                                                                                                                                                                                        <div id="tagtab" class="tabdiv"><!-- #tagtab -->

                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=boats' class='tag-link-12' title='2 topics' style='font-size: 22pt;'>boats</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=cassettes' class='tag-link-39' title='1 topic' style='font-size: 8pt;'>cassettes</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=critical' class='tag-link-41' title='1 topic' style='font-size: 8pt;'>Critical</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=durant' class='tag-link-64' title='1 topic' style='font-size: 8pt;'>Durant</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=easy' class='tag-link-43' title='1 topic' style='font-size: 8pt;'>Easy</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=entertainment' class='tag-link-44' title='1 topic' style='font-size: 8pt;'>Entertainment</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=exercise' class='tag-link-45' title='1 topic' style='font-size: 8pt;'>Exercise</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=failure' class='tag-link-46' title='1 topic' style='font-size: 8pt;'>Failure</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=france' class='tag-link-13' title='2 topics' style='font-size: 22pt;'>france</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=italy' class='tag-link-15' title='2 topics' style='font-size: 22pt;'>italy</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=kevin' class='tag-link-63' title='1 topic' style='font-size: 8pt;'>Kevin</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=movies' class='tag-link-28' title='1 topic' style='font-size: 8pt;'>Movies</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=music' class='tag-link-49' title='1 topic' style='font-size: 8pt;'>music</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=new' class='tag-link-50' title='1 topic' style='font-size: 8pt;'>new</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=obama' class='tag-link-51' title='1 topic' style='font-size: 8pt;'>Obama</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=oklahoma' class='tag-link-65' title='1 topic' style='font-size: 8pt;'>Oklahoma</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=politics' class='tag-link-30' title='1 topic' style='font-size: 8pt;'>Politics</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=quick' class='tag-link-19' title='1 topic' style='font-size: 8pt;'>Quick</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=sound' class='tag-link-55' title='1 topic' style='font-size: 8pt;'>sound</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=streets' class='tag-link-23' title='1 topic' style='font-size: 8pt;'>streets</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=thunder' class='tag-link-66' title='1 topic' style='font-size: 8pt;'>Thunder</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=top' class='tag-link-57' title='1 topic' style='font-size: 8pt;'>Top</a>
                                                                                                                                                                                                        <a href='http://www.londonthemes.com/themes/londonlive/?tag=toy-story' class='tag-link-58' title='1 topic' style='font-size: 8pt;'>Toy Story</a></div><!--#tagtab closer-->

                                                                                                                                                                                                        </div><!--#tagtab -->

                                                                                                                                                                                                        <!-- //**********************************
                                                                                                                                                                                                        TABS END
                                                                                                                                                                                                        //*************************************** -->

                                                                                                                                                                                                        <div id="lt_300x250_widget-3" class="widget-container lt_300x250_widget rightwidget"><div id="ad_300"><img src="/img/300x250.png" alt="300x250" /></div><!-- #ad 300 --></div><div id="lt_video_widget-3" class="widget-container lt_video_widget rightwidget"><h3 class="widget-title"><span class="title">Video Widget</span></h3>       	   </div>
                                                                                                                                                                                                        <div style="width:315px; float:left; ">

                                                                                                                                                                                                        <div style="float:left; width:148px; ">

                                                                                                                                                                                                        <div id="pages-4" class="widget-container widget_pages rightwidget column-left"><h3 class="widget-title"><span class="title">Pages</span></h3>		<ul>
                                                                                                                                                                                                        <li class="page_item page-item-275"><a href="/">Archives</a></li>
                                                                                                                                                                                                        <li class="page_item page-item-372"><a href="/">Contact</a></li>
                                                                                                                                                                                                        <li class="page_item page-item-279"><a href="/">Full Width</a></li>
                                                                                                                                                                                                        <li class="page_item page-item-277"><a href="/">Page Elements</a></li>
                                                                                                                                                                                                        </ul>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        <div style="float:left; width:148px; margin-left:18px;">

                                                                                                                                                                                                        <div id="categories-3" class="widget-container widget_categories rightwidget column-right"><h3 class="widget-title"><span class="title">Categories</span></h3>		<ul>
                                                                                                                                                                                                        <li class="cat-item cat-item-26"><a href="/">Business</a>
                                                                                                                                                                                                        </li>
                                                                                                                                                                                                        <li class="cat-item cat-item-27"><a href="/">Health</a>
                                                                                                                                                                                                        </li>
                                                                                                                                                                                                        <li class="cat-item cat-item-28"><a href="/">Movies</a>
                                                                                                                                                                                                        </li>
                                                                                                                                                                                                        <li class="cat-item cat-item-29"><a href="/">Opinion</a>
                                                                                                                                                                                                        </li>
                                                                                                                                                                                                        <li class="cat-item cat-item-30"><a href="/">Politics</a>
                                                                                                                                                                                                        </li>
                                                                                                                                                                                                        <li class="cat-item cat-item-31"><a href="/">Sports</a>
                                                                                                                                                                                                        </li>
                                                                                                                                                                                                        <li class="cat-item cat-item-32"><a href="/">Technology</a>
                                                                                                                                                                                                        </li>
                                                                                                                                                                                                        <li class="cat-item cat-item-62"><a href="/">World</a>
                                                                                                                                                                                                        </li>
                                                                                                                                                                                                        </ul>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        </div>

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
                                                                                                                                                                                                        <li><a href='http://www.londonthemes.com/themes/londonlive/?m=201012' title='December 2010'>December 2010</a></li>
                                                                                                                                                                                                        <li><a href='http://www.londonthemes.com/themes/londonlive/?m=201011' title='November 2010'>November 2010</a></li>
                                                                                                                                                                                                        <li><a href='http://www.londonthemes.com/themes/londonlive/?m=201010' title='October 2010'>October 2010</a></li>
                                                                                                                                                                                                        <li><a href='http://www.londonthemes.com/themes/londonlive/?m=201001' title='January 2010'>January 2010</a></li>
                                                                                                                                                                                                        </ul>
                                                                                                                                                                                                        </div><!-- #widget -->
                                                                                                                                                                                                        </div><!-- #widget_h -->



                                                                                                                                                                                                        <div class="widget_h_m">

                                                                                                                                                                                                        <div id="lt_flickr_widget-4" class="widget">  <div id="flickr">   

                                                                                                                                                                                                        <h3 class="widget-title"><span class="title">Flickr Photostream</span></h3>
                                                                                                                                                                                                        <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=6&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=33062170@N08"></script></div>     



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



                                                                                                                                                                                                        </body>

                                                                                                                                                                                                        </html>