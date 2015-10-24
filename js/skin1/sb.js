function imgError(image){
    image.onerror = "";
    image.src = "/img/default_news_error.jpg";
    return true;
}


//function addLink() {
//    var body_element = document.getElementsByTagName('body')[0];
//    var selection = window.getSelection();
//
//    // Вы можете изменить текст в этой строчке
//    var pagelink = "<p>Источник: <a href='"+document.location.href+"'>"+document.location.href+"</a></p>";
//
//    var copytext = selection + pagelink;
//    var newdiv = document.createElement('div');
//    newdiv.style.position = 'absolute';
//    newdiv.style.left = '-99999px';
//    body_element.appendChild(newdiv);
//    newdiv.innerHTML = copytext;
//    selection.selectAllChildren(newdiv);
//    window.setTimeout( function() {
//        body_element.removeChild(newdiv);
//    }, 0);
//}
//document.oncopy = addLink;

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
    
    $('.slider-block, #right-top-news-slider').bxSlider(
        {
            speed: 1000,
            pause: 6000,
            auto: true,
            //randomStart: true,
            pager: false
        });
    
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
    
    setTimeout('setTop()', 15000);
    
    $('#right-ajax-block').load('/ajax/background/get_right_hc/');
    
    // <likeArt in Text Add Link>
    likeInTxtLink = $('h2.look_more_hdn').attr('rel');
    $('h2.look_more_hdn').wrapInner('<a href="'+likeInTxtLink+'"></a>');
    
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
});


function loadGAd( blockName ){
    
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

function setTop(){
    var docId = $('#docId').attr('docId');
    if( !docId ){ return; }
    
    $.post( '/ajax/background/set_top/', {docId: docId, ref: document.referrer} );
}