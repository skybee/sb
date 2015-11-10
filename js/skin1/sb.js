function imgError(image){
    image.onerror = "";
    image.src = "/img/default_news_error.jpg";
    return true;
}

$( document ).ready(function(){
    
    // <add url link to copy post>
    var source_link = '<p>Источник: <a href="' + location.href + '">' + location.href + '</a></p>';
    $(
        function($)
        {
            if (window.getSelection) $('.copy-url').bind(
                'copy',
                function()
                {
                    var selection = window.getSelection();
                    var range = selection.getRangeAt(0);

                    var magic_div = $('<div>').css({ overflow : 'hidden', width: '1px', height : '1px', position : 'absolute', top: '-10000px', left : '-10000px' });
                    magic_div.append(range.cloneContents(), source_link);
                    $('body').append(magic_div);

                    var cloned_range = range.cloneRange();
                    selection.removeAllRanges();

                    var new_range = document.createRange();
                    new_range.selectNode(magic_div.get(0));
                    selection.addRange(new_range);

                    window.setTimeout(
                        function()
                        {
                            selection.removeAllRanges();
                            selection.addRange(cloned_range);
                            magic_div.remove();
                        }, 0
                    );
                }
            );
        }
    );
    // </add url link to copy post>
    
    
    setTimeout('setTop()', 15000);
    
    // <likeArt in Text Add Link>
    likeInTxtLink = $('h2.look_more_hdn').attr('rel');
    $('h2.look_more_hdn').wrapInner('<a href="'+likeInTxtLink+'"></a>');

    
    if(!$('#right').is(':visible')){
        ifMobile();
    }
    else{
        ifDesktop();
    }
});


function loadGAd( blockName ){
    
    if(!$('#right').is(':visible')){
        return loadGAdMobile(blockName);
    }
    
    function getRandomInt(min, max){
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }


    google_ad_client = "ca-pub-6096727633142370";

    if( blockName == 'content noImg' ){
        /* Content NoImg Block */
        google_ad_slot = "7412278844";
        google_ad_width = 300;
        google_ad_height = 250;
    }
    if( blockName == 'content bottom Netboard' ){
        /* Bottom Content Netboard */
        google_ad_slot = "5547096043";
        google_ad_width = 580;
        google_ad_height = 400;
    }
    if( blockName == 'right top' ){
        google_ad_slot = "4927119649";
        google_ad_width     = 300;
        google_ad_height    = 600;
    }
    if( blockName == 'text link blue' ){
        /* Content Blue Link */
        google_ad_slot = "6371985643";
        google_ad_width = 480;
        google_ad_height = 15;
    }
    if( blockName == 'under slider'){
        /* Under Slider */
        google_ad_slot = "7088605248";
        google_ad_width = 956;
        google_ad_height = 120;
    }
    if( blockName == 'under slider grey'){
        /* Under Slider Gray */
        google_ad_slot = "4454379644";
        google_ad_width = 956;
        google_ad_height = 120;
    }
    if( blockName == 'content greyInTxt'){
        /* Grey in Text */
        google_ad_slot = "2811858046";
        google_ad_width = 468;
        google_ad_height = 60;
    }


    document.write('<script type="text/javascript" src="//pagead2.googlesyndication.com/pagead/show_ads.js"></script>');
}

function loadGAdMobile(blockName){
    
}

function setTop(){
    var docId = $('#docId').attr('docId');
    if( !docId ){ return; }
    
    $.post( '/ajax/background/set_top/', {docId: docId, ref: document.referrer} );
}

//===================== <if Mobile> =====================//
function ifMobile(){
    
    $('#mobile_menu_tabs').tabs();
    
    $('#mobile_nav_btn').click(function(){
            $('#mobile_menu').slideToggle();
        }
    );
    
    //change mobile menu link
    $('#mobile_menu li span').each(function(){
        spanUrl     = $(this).attr('data-url');
        spanAnchor  = $(this).attr('data-anchor');
        $(this).replaceWith('<a href="'+spanUrl+'">'+spanAnchor+'</a>');
    });
}
//===================== </if Mobile> =====================//


//===================== <if Desktop> =====================//
function ifDesktop(){
    //========== <Sliders> ==========//
    function lazySliderBefore(thisBlock){
        thisImg = $('img', thisBlock);
        newSrc = thisImg.attr('data-src');
        if(newSrc !== undefined){
            thisImg.attr('src',newSrc);
            thisImg.removeAttr('data-src');
        }
    }

    function loadSliderPagerImg(){
        imges = $('#bx-pager li img');
        $('#bx-pager li img').each(function(){
            newSrc = $(this).attr('data-src');
            $(this).attr('src',newSrc);
        });
    }
    loadSliderPagerImg();

    $('.slider-block').bxSlider(
        {
            speed: 1000,
            pause: 6000,
            auto: true,
            //randomStart: true,
            pager: false
        });

    $('#right-top-news-slider').bxSlider({
        speed: 1000,
        pause: 6000,
        auto: true,
        //randomStart: true,
        pager: false,
        onSlideBefore: lazySliderBefore
    });    

    $('.bxslider').bxSlider({
        mode: 'fade',
        pagerCustom: '#bx-pager',
        controls: false,
        auto: true,
        speed: 600,
        pause: 6000,
        onSlideBefore: lazySliderBefore
    });    
    //========== </Sliders> ==========//


    // <zoom img>
    $('.image-popup-no-margins').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                image: {
                        verticalFit: true
                },
                zoom: {
                        enabled: true,
                        duration: 300 // don't foget to change the duration also in CSS
                }
        });
    // </zoom img>

    // <show this cat>
    if( $('span').is('#opt-tag-main-cat') ){ 
        $mainCatName = $('#opt-tag-main-cat').text();
        $('.firstnav-menu li[catname='+$mainCatName+']').addClass('main-nav-cat-active');
    }
     if( $('span').is('#opt-tag-sub-cat') ){ 
        $subCatName = $('#opt-tag-sub-cat').text();
        $('.secondnav-menu li[catname='+$subCatName+']').addClass('sub-nav-cat-active');
    }
    // </show this cat>

    $('#right-ajax-block').load('/ajax/background/get_right_hc/');

    // <serp result add link>
    if($('.serp_block').length > 0){
        var serp_h4 = $('.serp_block h4');
        var serp_length = serp_h4.length;

        for(i=0; i<serp_length; i++)
        {
            $('.serp_block h4').eq(i).wrap('<a href="'+$('.serp_block h4').eq(i).attr('rel')+'" target="_blank"></a>')
        }
    }
    // <serp result add link>
}
//===================== <if Desktop> =====================//