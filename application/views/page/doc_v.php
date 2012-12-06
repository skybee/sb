<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div class="single">
    <div class="active"><h1><?=$doc_data['title']?></h1></div>
    <div class="date">
        <div class="left">
            <span class="date">
                <a href="" title="Перейти к разделу" rel="category"><?=$main_cat_ar['name'].': '.$doc_data['cat_name']?></a>
                <span class="time"> — 11 December 2010</span>        
            </span>
        </div><!-- #left -->
    </div><!-- #date -->

    <div class="content">
        <div class="thumb ">
            <a href="/upload/news/<?=$doc_data['main_img']?>" rel="prettyPhoto" title="<?=$doc_data['title']?>">
                <img src="/upload/news/<?=$doc_data['main_img']?>" alt="<?=$doc_data['title']?>" class="imgf" style="opacity: 1;">
            </a>
        </div>
        
    <?=$doc_data['text']?>
        
    </div><!-- #content -->
    <div id="video_holder" style="display:none;"></div>
    <div class="othernews">
        <div class="listing other_news_listing" style="margin-bottom:10px;">
            <div class="header">
                <h1>Related News</h1>
            </div><!-- #header -->
            <div class="left_other_news" style="margin-right:34px;">
                <a href="http://www.londonthemes.com/themes/londonlive/?p=473">
                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/toy-story-3.jpg&amp;w=85&amp;h=69&amp;zc=1&amp;q=100" alt="Toy Story 3 One of the best movies (Video)">
                </a>
                <div class="content"><h4><a href="http://www.londonthemes.com/themes/londonlive/?p=473">Toy Story 3 One of the best movies (Video)</a></h4> <span class="date">December 11,  2010</span></div><!-- #content -->
            </div><!-- #left_other_news -->
            <div class="left_other_news" style="margin-right:0;">
                <a href="http://www.londonthemes.com/themes/londonlive/?p=319">
                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/up.png&amp;w=85&amp;h=69&amp;zc=1&amp;q=100" alt="Our review on the movie Up">
                </a>
                <div class="content"><h4><a href="http://www.londonthemes.com/themes/londonlive/?p=319">Our review on the movie Up</a></h4> <span class="date">December 01,  2010</span></div><!-- #content -->
            </div><!-- #left_other_news -->
            <div class="left_other_news" style="margin-right:34px;">
                <a href="http://www.londonthemes.com/themes/londonlive/?p=310">
                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/monster-inc.png&amp;w=85&amp;h=69&amp;zc=1&amp;q=100" alt="Monster inc, Voted Coolest Movie">
                </a>
                <div class="content"><h4><a href="http://www.londonthemes.com/themes/londonlive/?p=310">Monster inc, Voted Coolest Movie</a></h4> <span class="date">December 01,  2010</span></div><!-- #content -->
            </div><!-- #left_other_news -->
            <div class="left_other_news" style="margin-right:0;">
                <a href="http://www.londonthemes.com/themes/londonlive/?p=1037">
                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/01/cars.png&amp;w=85&amp;h=69&amp;zc=1&amp;q=100" alt="Cars tops editors choice">
                </a>
                <div class="content"><h4><a href="http://www.londonthemes.com/themes/londonlive/?p=1037">Cars tops editors choice</a></h4> <span class="date">January 03,  2010</span></div><!-- #content -->
            </div><!-- #left_other_news -->
        </div><!-- #listing -->
    </div><!-- #othernews -->


</div>



<div id="comments">
    <div id="respond">
        <h3 id="reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/themes/londonlive/?p=470#respond" style="display:none;">Cancel reply</a></small></h3>
        <form action="http://www.londonthemes.com/themes/londonlive/wp-comments-post.php" method="post" id="commentform">
            <p class="comment-notes">Your email address will not be published. Required fields are marked <span class="required">*</span></p>							<p class="comment-form-author"><label for="author">Name</label> <span class="required">*</span><input id="author" name="author" type="text" value="" size="30" aria-required="true"></p>
            <p class="comment-form-email"><label for="email">Email</label> <span class="required">*</span><input id="email" name="email" type="text" value="" size="30" aria-required="true"></p>
            <p class="comment-form-url"><label for="url">Website</label><input id="url" name="url" type="text" value="" size="30"></p>
            <p class="comment-form-comment"><label for="comment">Comment</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>						<p class="form-allowed-tags">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></p>						<p class="form-submit">
                <input name="submit" type="submit" id="submit" value="Post Comment">
                <input type="hidden" name="comment_post_ID" value="470" id="comment_post_ID">
                <input type="hidden" name="comment_parent" id="comment_parent" value="0">
            </p>
        </form>
    </div><!-- #respond -->
</div>