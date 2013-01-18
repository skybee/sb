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
                        <? foreach($main_menu_list as $main_link): ?>
                        <li class="page_item page-item-372"><a href="/<?=$main_link['url_name']?>/"><?=$main_link['name']?></a></li>
                        <? endforeach; ?>
                    </ul>
                    <div class="icon_holder"><a href="http://www.londonthemes.com/themes/londonlive?feed=rss2"><img src="/img/rss.png" alt="Subscribe to our Rss" class="shareimg"  /></a><a href="http://www.twitter.com/#"><img src="/img/twitter.png" alt="Follow us on Twitter!" class="shareimg" /></a><a href="http://www.facebook.com/#"><img src="/img/facebook.png" alt="Follow us on Facebook!" class="shareimg" /></a><a href="http://www.youtube.com/user/#"><img src="/img/youtube.png" alt="Check out our Youtube!" class="shareimg"  /></a></div><!-- #icon holder closer --></div><!-- #navigation closer -->
            </div><!-- #headernavigation closer -->
            <div id="content">
                <div id="white_space">
                    <div id="content_holder">
                        <div id="header">
                            <a href="http://www.londonthemes.com/themes/londonlive"><img src="/img/london_live.png" border="0" alt="London Live" class="logo"  /></a><div class="ad "><img src="/img/468-60.png" alt="468 X 60" /></div><!-- #ad 468x60 closer --></div><!-- #header closer -->
                        
                            <div id="categories">
                                <ul class="secondnav-menu">
                                    <? foreach( $second_menu_list as $second_menu_ar ): ?>
                                    <li class="cat-item cat-item-<?=$second_menu_ar['id']?>">
                                        <a href="/<?=$main_cat_ar['url_name']?>/<?=$second_menu_ar['url_name']?>/" ><?=$second_menu_ar['name']?></a>
                                    </li>
                                    <? endforeach; ?>   
                                </ul>
                            </div><!-- #categories closer -->
                        
                        <div class="cat_line"></div>

                        <!-- SLIDER -->

                        <div id="featured" >
                            <ul class="ui-tabs-nav">
                                <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1">
                                    <a href="#fragment-1">


                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/sharper-business.png&amp;w=87&amp;h=63&amp;zc=1&amp;q=100" alt="Fresh business tips to stay on top" />


                                    </a>
                                </li>
                                <li class="ui-tabs-nav-item " id="nav-fragment-2">
                                    <a href="#fragment-2">


                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/exercise-1.png&amp;w=87&amp;h=63&amp;zc=1&amp;q=100" alt="How much exercise is enough?" />


                                    </a>
                                </li>
                                <li class="ui-tabs-nav-item " id="nav-fragment-3">
                                    <a href="#fragment-3">


                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/obama.png&amp;w=87&amp;h=63&amp;zc=1&amp;q=100" alt="Obama stresses to his staff &quot;Failure not option&quot;" />


                                    </a>
                                </li>
                                <li class="ui-tabs-nav-item " id="nav-fragment-4">
                                    <a href="#fragment-4">


                                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/durant.png&amp;w=87&amp;h=63&amp;zc=1&amp;q=100" alt="Kevin Durant set to surpass legends" />


                                    </a>
                                </li>
                            </ul>


                            <!-- 1 Content -->
                            <div id="fragment-1" class="ui-tabs-panel " style="margin-top:1px; background-color:transparent; float:left;">
                                <a href="http://www.londonthemes.com/themes/londonlive/?p=485">
                                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/sharper-business.png&amp;w=467&amp;h=278&amp;zc=1&amp;q=100" alt="Fresh business tips to stay on top" border="0" />
                                </a>
                                <div class="info">
                                    <h2><a href="http://www.londonthemes.com/themes/londonlive/?p=485" >Fresh business tips to stay on top</a></h2>
                                    <span class="date">December 11,  2010 -  <a href="http://www.londonthemes.com/themes/londonlive/?p=485#respond" title="Comment on Fresh business tips to stay on top">(0) comments</a></span>
                                    <p>Maecenas mattis, tortor ut posuere aliquam, quam enim accumsan purus, auctor placerat orci velit vitae massa. Vivamus non iaculis lectus. Sed dignissim metus ac libero sagittis non iaculis lorem mattis. Praesent adipiscing mi eget ipsum imperdiet elementum. Nulla facilisi. Quisque [&hellip;]</p>
                                </div><!-- #info closer -->
                            </div><!-- #fragment-1 closer -->



                            <!-- 2 Content -->
                            <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="margin-top:1px; background-color:transparent; float:left;">
                                <a href="http://www.londonthemes.com/themes/londonlive/?p=482">
                                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/exercise-1.png&amp;w=467&amp;h=278&amp;zc=1&amp;q=100" alt="How much exercise is enough?" border="0" />
                                </a>
                                <div class="info">
                                    <h2><a href="http://www.londonthemes.com/themes/londonlive/?p=482" >How much exercise is enough?</a></h2>
                                    <span class="date">December 11,  2010 -  <a href="http://www.londonthemes.com/themes/londonlive/?p=482#respond" title="Comment on How much exercise is enough?">(0) comments</a></span>
                                    <p>Maecenas mattis, tortor ut posuere aliquam, quam enim accumsan purus, auctor placerat orci velit vitae massa. Vivamus non iaculis lectus. Sed dignissim metus ac libero sagittis non iaculis lorem mattis. Praesent adipiscing mi eget ipsum imperdiet elementum. Nulla facilisi. Quisque [&hellip;]</p>
                                </div><!-- #info closer -->
                            </div><!-- #fragment-2 closer -->



                            <!-- 3 Content -->
                            <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="margin-top:1px; background-color:transparent; float:left;">
                                <a href="http://www.londonthemes.com/themes/londonlive/?p=477">
                                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/obama.png&amp;w=467&amp;h=278&amp;zc=1&amp;q=100" alt="Obama stresses to his staff &quot;Failure not option&quot;" border="0" />
                                </a>
                                <div class="info">
                                    <h2><a href="http://www.londonthemes.com/themes/londonlive/?p=477" >Obama stresses to his staff &quot;Failure not option&quot;</a></h2>
                                    <span class="date">December 11,  2010 -  <a href="http://www.londonthemes.com/themes/londonlive/?p=477#respond" title="Comment on Obama stresses to his staff &quot;Failure not option&quot;">(0) comments</a></span>
                                    <p>Maecenas mattis, tortor ut posuere aliquam, quam enim accumsan purus, auctor placerat orci velit vitae massa. Vivamus non iaculis lectus. Sed dignissim metus ac libero sagittis non iaculis lorem mattis. Praesent adipiscing mi eget ipsum imperdiet elementum. Nulla facilisi. Quisque [&hellip;]</p>
                                </div><!-- #info closer -->
                            </div><!-- #fragment-3 closer -->



                            <!-- 4 Content -->
                            <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide" style="margin-top:1px; background-color:transparent; float:left;">
                                <a href="http://www.londonthemes.com/themes/londonlive/?p=475">
                                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/durant.png&amp;w=467&amp;h=278&amp;zc=1&amp;q=100" alt="Kevin Durant set to surpass legends" border="0" />
                                </a>
                                <div class="info">
                                    <h2><a href="http://www.londonthemes.com/themes/londonlive/?p=475" >Kevin Durant set to surpass legends</a></h2>
                                    <span class="date">December 11,  2010 -  <a href="http://www.londonthemes.com/themes/londonlive/?p=475#respond" title="Comment on Kevin Durant set to surpass legends">(0) comments</a></span>
                                    <p>Maecenas mattis, tortor ut posuere aliquam, quam enim accumsan purus, auctor placerat orci velit vitae massa. Vivamus non iaculis lectus. Sed dignissim metus ac libero sagittis non iaculis lorem mattis. Praesent adipiscing mi eget ipsum imperdiet elementum. Nulla facilisi. Quisque [&hellip;]</p>
                                </div><!-- #info closer -->
                            </div><!-- #fragment-4 closer -->



                        </div><!-- #featured closer -->
                        <!-- SLIDER END --><div id="middle">
                            <div id="left">




                                <div id="wrap" class="hideobject">

                                    <div class=" jcarousel-skin-skyali">

                                        <div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block; ">

                                            <div class="jcarousel-clip jcarousel-clip-horizontal" style="overflow-x: hidden; overflow-y: hidden; position: relative; ">

                                                <ul id="slide_" class="jcarousel-list jcarousel-list-horizontal" style="overflow-x: hidden; overflow-y: hidden; position: relative; top: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; width: 1450px; left: 0px; ">


                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=470">Dec</a></h1></span> <span class="day"><h2><a href="http://www.londonthemes.com/themes/londonlive/?p=470">11</a></h2></span></div><a href="http://www.londonthemes.com/themes/londonlive/?p=470">
                                                            <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/spider-man.jpg&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="Spider-man 4 Coming Soon in 2012">
                                                        </a></li>

                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=467">Dec</a></h1></span> <span class="day"><h2><a href="http://www.londonthemes.com/themes/londonlive/?p=467">11</a></h2></span></div><a href="http://www.londonthemes.com/themes/londonlive/?p=467">
                                                            <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/john-f-kennedy.jpg&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="John F Kennedy Voted one of the best presidents">
                                                        </a></li>

                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=460">Dec</a></h1></span> <span class="day"><h2><a href="http://www.londonthemes.com/themes/londonlive/?p=460">11</a></h2></span></div><a href="http://www.londonthemes.com/themes/londonlive/?p=460">
                                                            <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/lakers.png&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="Lakers at the top of the west">
                                                        </a></li>

                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=434">Dec</a></h1></span> <span class="day"><h2><a href="http://www.londonthemes.com/themes/londonlive/?p=434">11</a></h2></span></div><a href="http://www.londonthemes.com/themes/londonlive/?p=434">
                                                            <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/chicago-bulls.png&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="Chicago Bulls say &quot;We are the best&quot;">
                                                        </a></li>

                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=315">Dec</a></h1></span> <span class="day"><h2><a href="http://www.londonthemes.com/themes/londonlive/?p=315">01</a></h2></span></div><a href="http://www.londonthemes.com/themes/londonlive/?p=315">
                                                            <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/boston-celtic.png&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="Celtics win another one on the road">
                                                        </a></li>

                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=300">Dec</a></h1></span> <span class="day"><h2><a href="http://www.londonthemes.com/themes/londonlive/?p=300">01</a></h2></span></div><a href="http://www.londonthemes.com/themes/londonlive/?p=300">
                                                            <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/BRIDGE.png&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="Top bridges to walk in the world">
                                                        </a></li>

                                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="list-style-type: none; list-style-position: initial; list-style-image: initial; float: left; " jcarouselindex="1"><div class="date"><span class="month"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=326">Nov</a></h1></span> <span class="day"><h2><a href="http://www.londonthemes.com/themes/londonlive/?p=326">01</a></h2></span></div><a href="http://www.londonthemes.com/themes/londonlive/?p=326">
                                                            <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/11/france.png&amp;w=115&amp;h=94&amp;zc=1&amp;q=100" alt="On the streets of france">
                                                        </a></li>

                                                </ul>

                                            </div><!-- #clip -->

                                            <div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" style="display: block; " disabled="true"></div>

                                            s<div class="jcarousel-next jcarousel-next-horizontal" style="display: block; " disabled="false"></div>

                                        </div><!-- #jcarousel-container -->

                                    </div><!-- #skyali skin -->

                                </div><!-- #wrap -->

                                <?=$content?>

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
                                            <a href="http://www.londonthemes.com/themes/londonlive/?p=473">
                                                <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/toy-story-3.jpg&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Toy Story 3 One of the best movies (Video)" />
                                            </a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=473">Toy Story 3 One of the best movies (Video)</a></h1> <br  /> <span class="date">December 11,  2010   </span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside">
                                            <a href="http://www.londonthemes.com/themes/londonlive/?p=329">
                                                <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/italy-bo.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Italy gives free boat rides" />
                                            </a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=329">Italy gives free boat rides</a></h1> <br  /> <span class="date">December 01,  2010   </span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside">
                                            <a href="http://www.londonthemes.com/themes/londonlive/?p=319">
                                                <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/up.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Our review on the movie Up" />
                                            </a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=319">Our review on the movie Up</a></h1> <br  /> <span class="date">December 01,  2010   </span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside">
                                            <a href="http://www.londonthemes.com/themes/londonlive/?p=467">
                                                <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/john-f-kennedy.jpg&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="John F Kennedy Voted one of the best presidents" />
                                            </a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=467">John F Kennedy Voted one of the best presidents</a></h1> <br  /> <span class="date">December 11,  2010   </span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside">
                                            <a href="http://www.londonthemes.com/themes/londonlive/?p=322">
                                                <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/lovers.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Love bugs bites majority of world" />
                                            </a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=322">Love bugs bites majority of world</a></h1> <br  /> <span class="date">December 01,  2010   </span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                    </div><!--#popular -->


                                    <div id="recenttab" class="tabdiv"><!-- #recent tab -->

                                        <div class="tab_inside"><a href="http://www.londonthemes.com/themes/londonlive/?p=485">
                                                <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/sharper-business.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Fresh business tips to stay on top" />
                                            </a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=485">Fresh business tips to stay on top</a></h1> <br  /> <span class="date">December 11,  2010</span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside"><a href="http://www.londonthemes.com/themes/londonlive/?p=482">
                                                <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/exercise-1.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="How much exercise is enough?" />
                                            </a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=482">How much exercise is enough?</a></h1> <br  /> <span class="date">December 11,  2010</span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside"><a href="http://www.londonthemes.com/themes/londonlive/?p=477">
                                                <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/obama.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Obama stresses to his staff &quot;Failure not option&quot;" />
                                            </a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=477">Obama stresses to his staff &quot;Failure not option&quot;</a></h1> <br  /> <span class="date">December 11,  2010</span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside"><a href="http://www.londonthemes.com/themes/londonlive/?p=475">
                                                <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/durant.png&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Kevin Durant set to surpass legends" />
                                            </a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=475">Kevin Durant set to surpass legends</a></h1> <br  /> <span class="date">December 11,  2010</span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside"><a href="http://www.londonthemes.com/themes/londonlive/?p=473">
                                                <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/toy-story-3.jpg&amp;w=53&amp;h=41&amp;zc=1&amp;q=100" alt="Toy Story 3 One of the best movies (Video)" />
                                            </a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=473">Toy Story 3 One of the best movies (Video)</a></h1> <br  /> <span class="date">December 11,  2010</span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->

                                    </div><!--#recent tab -->


                                    <div id="commentstab" class="tabdiv"><!-- #commentstab -->

                                        <div class="tab_inside">
                                            <a href="http://www.londonthemes.com/themes/londonlive/?p=319#comment-60"><img alt='' src='http://0.gravatar.com/avatar/207c3a86af3d4725c54de5bb00df6950?s=53&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D53&amp;r=G' class='avatar avatar-53 photo' height='53' width='53' /></a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=319#comment-60">Our review on the movie Up</a></h1> <br  /> <span class="date">Duis tempor tellus sed magna mollis sed porttitor turpis bibendum. Fus</span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside">
                                            <a href="http://www.londonthemes.com/themes/londonlive/?p=319#comment-59"><img alt='' src='http://0.gravatar.com/avatar/207c3a86af3d4725c54de5bb00df6950?s=53&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D53&amp;r=G' class='avatar avatar-53 photo' height='53' width='53' /></a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=319#comment-59">Our review on the movie Up</a></h1> <br  /> <span class="date">Nullam condimentum magna id diam hendrerit facilisis. Donec hendrerit </span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside">
                                            <a href="http://www.londonthemes.com/themes/londonlive/?p=467#comment-75"><img alt='' src='http://0.gravatar.com/avatar/207c3a86af3d4725c54de5bb00df6950?s=53&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D53&amp;r=G' class='avatar avatar-53 photo' height='53' width='53' /></a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=467#comment-75">John F Kennedy Voted one of the best presidents</a></h1> <br  /> <span class="date">Nullam condimentum magna id diam hendrerit facilisis. Donec hendrerit </span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside">
                                            <a href="http://www.londonthemes.com/themes/londonlive/?p=467#comment-74"><img alt='' src='http://0.gravatar.com/avatar/207c3a86af3d4725c54de5bb00df6950?s=53&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D53&amp;r=G' class='avatar avatar-53 photo' height='53' width='53' /></a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=467#comment-74">John F Kennedy Voted one of the best presidents</a></h1> <br  /> <span class="date">Mauris tempor, elit eget viverra lacinia, velit enim vestibulum mi, sc</span></div><!-- #content closer -->
                                        </div><!-- #tab_inside -->
                                        <div class="tab_inside">
                                            <a href="http://www.londonthemes.com/themes/londonlive/?p=473#comment-83"><img alt='' src='http://0.gravatar.com/avatar/207c3a86af3d4725c54de5bb00df6950?s=53&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D53&amp;r=G' class='avatar avatar-53 photo' height='53' width='53' /></a>
                                            <div class="content"><h1><a href="http://www.londonthemes.com/themes/londonlive/?p=473#comment-83">Toy Story 3 One of the best movies (Video)</a></h1> <br  /> <span class="date">Mauris tempor, elit eget viverra lacinia, velit enim vestibulum mi, sc</span></div><!-- #content closer -->
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

                                <div id="lt_300x250_widget-3" class="widget-container lt_300x250_widget rightwidget"><div id="ad_300"><img src="/img/300x250.png" alt="300x250" /></div><!-- #ad 300 --></div><div id="lt_video_widget-3" class="widget-container lt_video_widget rightwidget"><h3 class="widget-title"><span class="title">Video Widget</span></h3>       <object width="480" height="270"><param name="movie" value="http://www.dailymotion.com/swf/video/xah5ul?width=&amp;theme=none&amp;foreground=%23F7FFFD&amp;highlight=%23FFC300&amp;background=%23171D1B&amp;start=&amp;animatedTitle=&amp;iframe=0&amp;additionalInfos=0&amp;autoPlay=0&amp;hideInfos=0"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed type="application/x-shockwave-flash" src="http://www.dailymotion.com/swf/video/xah5ul?width=&amp;theme=none&amp;foreground=%23F7FFFD&amp;highlight=%23FFC300&amp;background=%23171D1B&amp;start=&amp;animatedTitle=&amp;iframe=0&amp;additionalInfos=0&amp;autoPlay=0&amp;hideInfos=0" width="480" height="270" allowfullscreen="true" allowscriptaccess="always"></embed></object>	   </div>
                                <div style="width:315px; float:left; ">

                                    <div style="float:left; width:148px; ">

                                        <div id="pages-4" class="widget-container widget_pages rightwidget column-left"><h3 class="widget-title"><span class="title">Pages</span></h3>		<ul>
                                                <li class="page_item page-item-275"><a href="http://www.londonthemes.com/themes/londonlive/?page_id=275">Archives</a></li>
                                                <li class="page_item page-item-372"><a href="http://www.londonthemes.com/themes/londonlive/?page_id=372">Contact</a></li>
                                                <li class="page_item page-item-279"><a href="http://www.londonthemes.com/themes/londonlive/?page_id=279">Full Width</a></li>
                                                <li class="page_item page-item-277"><a href="http://www.londonthemes.com/themes/londonlive/?page_id=277">Page Elements</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div style="float:left; width:148px; margin-left:18px;">

                                        <div id="categories-3" class="widget-container widget_categories rightwidget column-right"><h3 class="widget-title"><span class="title">Categories</span></h3>		<ul>
                                                <li class="cat-item cat-item-26"><a href="http://www.londonthemes.com/themes/londonlive/?cat=26" title="View all posts filed under Business">Business</a>
                                                </li>
                                                <li class="cat-item cat-item-27"><a href="http://www.londonthemes.com/themes/londonlive/?cat=27" title="View all posts filed under Health">Health</a>
                                                </li>
                                                <li class="cat-item cat-item-28"><a href="http://www.londonthemes.com/themes/londonlive/?cat=28" title="View all posts filed under Movies">Movies</a>
                                                </li>
                                                <li class="cat-item cat-item-29"><a href="http://www.londonthemes.com/themes/londonlive/?cat=29" title="View all posts filed under Opinion">Opinion</a>
                                                </li>
                                                <li class="cat-item cat-item-30"><a href="http://www.londonthemes.com/themes/londonlive/?cat=30" title="View all posts filed under Politics">Politics</a>
                                                </li>
                                                <li class="cat-item cat-item-31"><a href="http://www.londonthemes.com/themes/londonlive/?cat=31" title="View all posts filed under Sports">Sports</a>
                                                </li>
                                                <li class="cat-item cat-item-32"><a href="http://www.londonthemes.com/themes/londonlive/?cat=32" title="View all posts filed under Technology">Technology</a>
                                                </li>
                                                <li class="cat-item cat-item-62"><a href="http://www.londonthemes.com/themes/londonlive/?cat=62" title="View all posts filed under World">World</a>
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
                                <li><a href="http://www.londonthemes.com/themes/londonlive/wp-login.php">Log in</a></li>
                                <li><a href="http://www.londonthemes.com/themes/londonlive/?feed=rss2" title="Syndicate this site using RSS 2.0">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
                                <li><a href="http://www.londonthemes.com/themes/londonlive/?feed=comments-rss2" title="The latest comments to all posts in RSS">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
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