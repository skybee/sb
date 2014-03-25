function imgError(image){
    image.onerror = "";
    image.src = "/img/default_news_error.jpg";
    return true;
}