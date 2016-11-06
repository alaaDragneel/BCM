$(document).ready(function() {
  $('.Info').hover(function() {
    $(this).popover('show');
  }, function() {
    $(this).popover('hide');
  });

   $("html").niceScroll({
     cursorcolor:"#2c3e50",
     cursorwidth: "10px",
     scrollspeed: "40",
     mousescrollstep:"30",
   });


});
