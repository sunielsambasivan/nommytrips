/*********
 *  miscellaneous js scripts
*********/

jQuery(document).ready( function( $ ) {

  /*
   *  image captions in blog posts(reviews. dishes, blogs)
   */
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


  /*
   *  events drag vs click
   *  anytime a mousedown occurs x/y coordinates change after mouseup, drag is assumed.
   */
  var clickOrDrag = function(element) {
    element['dragFlag'] = 0;
    var clientX = -1;
    var clientY = -1;
    var threshold = 10;

    element.addEventListener("mousedown", function(e) {
        element['dragFlag'] = 0;
        clientX = e.clientX;
        clientY = e.clientY;
        console.log("X: " + e.clientX + " / Y: " + e.clientY);

    }, false);

    element.addEventListener("mouseup", function(e) {
      console.log("X: " + e.clientX + " / Y: " + e.clientY);
      if(e.clientX > (clientX - threshold) && e.clientX < (clientX + threshold)) {
        element['dragFlag'] = 0;
      }

      else {
        element['dragFlag'] = 1;
      }
    }, false);
  };

  /*
   *  for all of these elements, add event listeners add click event if not dragged.
   */
  $(".card--location").each(function() {
    var dragged = clickOrDrag(this);

    $(this).click(function() {
      window.location.href = $(this).data("url");
    });
  });
});