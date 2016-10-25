$(document).ready(function(){
  $(window).scroll(function() {
    var content = $('#main-content');
    var news = $('#news');
    if(news.height() < $(this).height())
      news.height($(this).height());
    var top = content.offset().top + news.height() - $(this).height();
    var bottom = content.offset().top + content.height() - $(this).height();
    var scrollTop = $(document).scrollTop();
    if($(this).width() >= 768 && top < bottom) {
      if (scrollTop > bottom) {
        news.removeClass("news-fixed");
        news.addClass("news-absolute");
      } else if (scrollTop >= top && scrollTop <= bottom) {
        news.removeClass("news-absolute");
        news.addClass("news-fixed");
      } else {
        news.removeClass("news-fixed");
        news.removeClass("news-absolute");
      }
    }
  });
});
