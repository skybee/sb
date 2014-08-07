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
});

