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
    
    $('.slider-block').bxSlider(
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
});


function loadGAd( blockName ){
        
        google_ad_client = "ca-pub-6096727633142370";
        
        if( blockName == 'content top' ){
            /* Top Content Block */
            google_ad_slot = "1019922045";
            google_ad_width = 468;
            google_ad_height = 60;
        }
        if( blockName == 'content noImg' ){
            /* Content NoImg Block */
            google_ad_slot = "7412278844";
            google_ad_width = 300;
            google_ad_height = 250;
        }
        if( blockName == 'content bottom' ){
            /* Bottom Content Block */
            google_ad_slot = "7550806846";
            google_ad_width = 468;
            google_ad_height = 60;
        }
        if( blockName == 'content bottom Netboard' ){
            /* Bottom Content Netboard */
            google_ad_slot = "5547096043";
            google_ad_width = 580;
            google_ad_height = 400;
        }
        if( blockName == 'right top' ){
            /* Right Top Block */
            google_ad_slot = "1853866844";
            google_ad_width = 300;
            google_ad_height = 250;
        }
        
        document.write('<script type="text/javascript" src="//pagead2.googlesyndication.com/pagead/show_ads.js"></script>');
}
