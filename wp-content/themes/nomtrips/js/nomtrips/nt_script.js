/***
 * miscellaneous js scripts
***/

jQuery(document).ready( function( $ ) {

  /**
  * image captions in blog posts(reviews. dishes, blogs)
  **/
  $(".single .content--post img").each(function () {
    if($(this).attr("alt").length > 0) {
      //get caption
      var caption = $(this).attr("alt");

      //create new element to contain image and add class to it
      var imageDiv = document.createElement("div");
      $(imageDiv).addClass("content--post-img");

      //create caption element and html
      var captionDiv = document.createElement("div");
      $(captionDiv).addClass("content--post-img-caption").html(caption);


      //add it to before the image
      $(imageDiv).insertBefore($(this));

      //add caption and image to image div
      $(this).appendTo(imageDiv);
      $(captionDiv).appendTo(imageDiv);
    }
  });

});