//$(document).ready(function() {
//	$('#londontabs > ul').tabs({ fx: { height: 'toggle', opacity: 'toggle' } });
//	$('#tabsheader > ul').tabs({fx: {height:'toggle', opacity:'toggle'}});
//	$('#featuredvid > ul').tabs();
//});
	$(document).ready(function(){
		$("#featured > ul").tabs( {fx:{opacity: "toggle", duration: 200}} ).tabs("rotate", 6000, false );
	});
	
/*window.onload = function() {$('#Picture').hide().fadeIn(3000);};*/