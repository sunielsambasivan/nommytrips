jQuery(document).ready(function($){
  $('.cards--carousel').each(function() {
    var container = $(this).find('.cards--carousel--container');

    //button class names need to be unique to have multiple carousels on one page.
    var prevClass = $(this).find('button[class^="slick-prev"]');
    var nextClass = $(this).find('button[class^="slick-next"]');

    container.slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 6,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1366,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true
          }
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: true
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true
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