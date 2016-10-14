jQuery(document).ready(function($){
  $('.cards--carousel').each(function() {
    var container = $(this).find('.cards--carousel--container');
    var prevClass = $(this).find('button[class^="slick-prev"]');
    var nextClass = $(this).find('button[class^="slick-next"]');
    console.log($(prevClass));
    container.slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: false,
            dots: true
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1

          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ],
      nextArrow: $(nextClass),
      prevArrow: $(prevClass)
      });
  });

});