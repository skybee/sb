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
            <a href="/upload/images/real/<?=$doc_data['main_img']?>" rel="prettyPhoto" title="<?=$doc_data['title']?>">
                <img src="/upload/images/medium/<?=$doc_data['main_img']?>" alt="<?=$doc_data['title']?>" class="imgf" style="opacity: 1;">
            </a>
        </div>
        
    <?=$doc_data['text']?>
        
    </div><!-- #content -->
    <div id="video_holder" style="display:none;"></div>
    <div class="othernews">
        <div class="listing other_news_listing" style="margin-bottom:10px;">
            <div class="header">
                <h1>Похожие новости:</h1>
            </div><!-- #header -->
            <div class="left_other_news" style="margin-right:34px;">
                <a href="/">
                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/toy-story-3.jpg&amp;w=85&amp;h=69&amp;zc=1&amp;q=100" alt="Toy Story 3 One of the best movies (Video)">
                </a>
                <div class="content"><h4><a href="/">December 11,  2010</span></div><!-- #content -->
            </div><!-- #left_other_news -->
            <div class="left_other_news" style="margin-right:0;">
                <a href="/">
                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/up.png&amp;w=85&amp;h=69&amp;zc=1&amp;q=100" alt="Our review on the movie Up">
                </a>
                <div class="content"><h4><a href="/">December 01,  2010</span></div><!-- #content -->
            </div><!-- #left_other_news -->
            <div class="left_other_news" style="margin-right:34px;">
                <a href="/">
                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/12/monster-inc.png&amp;w=85&amp;h=69&amp;zc=1&amp;q=100" alt="Monster inc, Voted Coolest Movie">
                </a>
                <div class="content"><h4><a href="/">December 01,  2010</span></div><!-- #content -->
            </div><!-- #left_other_news -->
            <div class="left_other_news" style="margin-right:0;">
                <a href="/">
                    <img src="http://www.londonthemes.com/themes/londonlive/wp-content/themes/LondonLive_Demo_1_4/thumb.php?src=/wp-content/uploads/2010/01/cars.png&amp;w=85&amp;h=69&amp;zc=1&amp;q=100" alt="Cars tops editors choice">
                </a>
                <div class="content"><h4><a href="/">January 03,  2010</span></div><!-- #content -->
            </div><!-- #left_other_news -->
        </div><!-- #listing -->
    </div><!-- #othernews -->


</div>



<div id="comments">
    <div id="respond">
        <h3 id="reply-title">Оставить комментарий</h3>
        <form action="#" method="post" id="commentform">
            <p class="comment-form-author">
                <label for="author">Имя</label> <span class="required">*</span>
                <input id="author" name="author" type="text" value="" size="30" aria-required="true">
            </p>
            <p class="comment-form-comment">
                <label for="comment">Комментарий</label>
                <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
            </p>												
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" value="Добавить">
                <input type="hidden" name="comment_post_ID" value="470" id="comment_post_ID">
                <input type="hidden" name="comment_parent" id="comment_parent" value="0">
            </p>
        </form>
    </div><!-- #respond -->
</div>