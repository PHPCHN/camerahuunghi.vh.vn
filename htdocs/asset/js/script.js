$(document).ready(function(){
  news_height($('#news'), $(window));
  scroll_position($('#news'), $('#main-content'), $(window));

  $(window).scroll(function() {
    var content = $('#main-content');
    var news = $('#news');
    scroll_position(news, content, $(this));
  });

  $('#to-top').on('click', function() {
    var top = $(document).scrollTop();
    var to_top = setInterval(function(){
      top = top - 200;
      if(top <= 0) {
        clearInterval(to_top);
        top = 0;
      }
      $(document).scrollTop(top);
    }, 1);
  });

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86814912-1', 'auto');
  ga('send', 'pageview');

});

function news_height(news, windo) {
  if(news.height() < windo.height())
    news.height(windo.height());
}

function scroll_position(news, content, windo) {
  var top = content.offset().top + news.height() - windo.height();
  var bottom = content.offset().top + content.height() - windo.height();
  var scrollTop = $(document).scrollTop();
  if(windo.width() >= 768 && top < bottom) {
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
}
