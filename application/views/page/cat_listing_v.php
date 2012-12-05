<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<? foreach( $mainpage_cat_list as $catlist_ar ): ?>

<div class="cat_listing">

    <div class="header">

        <h1>
            <a href="/<?=$catlist_ar['s_cat_ar']['f_cat_uname']?>/<?=$catlist_ar['s_cat_ar']['url_name']?>/">
                <?=$catlist_ar['s_cat_ar']['name']?>
            </a>
        </h1>

    </div><!-- #header -->

    <div class="content">

        <div class="left">

            <div class="imgholder">

                <a href="http://www.londonthemes.com/themes/londonlive/?p=473">

                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/toy-story-3.jpg&amp;w=276&amp;h=221&amp;zc=1&amp;q=100" alt="Toy Story 3 One of the best movies (Video)" class="imgf"  border="0" style="height:213px;" />

                </a>

                <div class="description"><h3><a href="http://www.londonthemes.com/themes/londonlive/?p=473">Toy Story 3 One of the best movies (Video)</a></h3></div><!-- #description -->

            </div><!-- #imgholder -->

        </div><!-- #left -->

        <div class="right">

            <div class="small-listing">
                <div class="thumb">
                    <a href="http://www.londonthemes.com/themes/londonlive/?p=470">

                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/spider-man.jpg&amp;w=106&amp;h=69&amp;zc=1&amp;q=100" alt="Spider-man 4 Coming Soon in 2012" class="shareimg" border="0" />
                    </a>
                </div><!-- #thumb -->
                <div class="description"><h4><a href="http://www.londonthemes.com/themes/londonlive/?p=470">Spider-man 4 Coming Soon in 2012</a></h4><span class="date">December 11,  2010</span></div><!-- #description -->

            </div><!-- #small-listing -->

            <div class="small-listing">
                <div class="thumb">
                    <a href="http://www.londonthemes.com/themes/londonlive/?p=319">

                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/up.png&amp;w=106&amp;h=69&amp;zc=1&amp;q=100" alt="Our review on the movie Up" class="shareimg" border="0" />
                    </a>
                </div><!-- #thumb -->
                <div class="description"><h4><a href="http://www.londonthemes.com/themes/londonlive/?p=319">Our review on the movie Up</a></h4><span class="date">December 01,  2010</span></div><!-- #description -->

            </div><!-- #small-listing -->

            <div class="small-listing">
                <div class="thumb">
                    <a href="http://www.londonthemes.com/themes/londonlive/?p=310">

                        <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/monster-inc.png&amp;w=106&amp;h=69&amp;zc=1&amp;q=100" alt="Monster inc, Voted Coolest Movie" class="shareimg" border="0" />
                    </a>
                </div><!-- #thumb -->
                <div class="description"><h4><a href="http://www.londonthemes.com/themes/londonlive/?p=310">Monster inc, Voted Coolest Movie</a></h4><span class="date">December 01,  2010</span></div><!-- #description -->

            </div><!-- #small-listing -->

        </div><!-- #right -->

    </div><!-- #content -->

</div><!-- #listing -->

<? endforeach; ?>

