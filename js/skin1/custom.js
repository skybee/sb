// JavaScript Document


$(document).ready(function() { 
$('.toparrow').click(function(){ 
$('html, body').animate({scrollTop:0}, 'slow'); return false; 
}); 
});

//$(document).ready(function(){ 
//$("ul.firstnav-menu").superfish({ 
//animation: {opacity:'show', height:'show', width:'show'},   // slide-down effect without fade-in 
//delay:200,               // 1.2 second delay on mouseout 
//autoArrows: false, 
//speed: 'fast',
//dropShadows: false
//}); 
//})
//
//$(document).ready(function(){ 
//$("ul.secondnav-menu").superfish({ 
//animation: {opacity:'show', height:'show', width:'show'},   // slide-down effect without fade-in 
//delay:200,               // 1.2 second delay on mouseout 
//autoArrows: false, 
//speed: 'fast',
//dropShadows: false
//}); 
//})

jQuery(document).ready(function() {
    jQuery('#slide_').jcarousel();
});

$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto({
			default_width:640,
			default_height:344
			});
			
		});