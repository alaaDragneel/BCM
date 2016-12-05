$(document).ready(function () {
  $('#profile-img').addClass('activeInfo');
  $('#profile-img').next().addClass('nextElm');
  $('#profile-imgCon').addClass('activeInfoCon');
  $('#startInfo').on('click', function () {
    $(this).slideUp(500, function() {
      $(this).remove();
    });
    $('#btns').slideDown(1000);
    $('#home').slideUp(500);
    $('#profile-imgCon').slideDown(500);
    // hide the profile box
    $(this).parents().siblings('.col-md-4').children('.activeInfo').removeClass('profile-imgHid').addClass('profile-img');

     // add the activeInfo class to the next elements
     $(this).parents().siblings('.col-md-4').children('.activeInfo').removeClass('activeInfo').next().addClass('activeInfo');
     // add activeCOn callout-success

     // add the nextElm class to the next elements
     $(this).parents().siblings('.col-md-4').children('.activeInfo').removeClass('nextElm').next().addClass('nextElm');

  });
  $('#nextInfo').on('click', function() {

    // get the new data name
    var dataName = $(this).parents().siblings('.col-md-4').children('.activeInfo').data('name');
    dataNameCon = $(this).parents().siblings('.col-md-8').children('.activeInfoCon').next().data('name');
    // hide the profile box
    $(this).parents().siblings('.col-md-4').children('.activeInfo').removeClass(dataName+'Hid').addClass(dataName);

     // add the activeInfo class to the next elements
     $(this).parents().siblings('.col-md-4').children('.activeInfo').removeClass('activeInfo').next().addClass('activeInfo');

     // add the nextElm class to the next elements
     $(this).parents().siblings('.col-md-4').children('.activeInfo').removeClass('nextElm').next().addClass('nextElm');

     $(this).parents().siblings('.col-md-8').children('.activeInfoCon').removeClass('activeInfoCon').next().addClass('activeInfoCon');
     $(this).parents().siblings('.col-md-8').children('.activeInfoCon').slideDown(500).siblings().slideUp(500);
     if (dataNameCon === 'quickInfoCon') {
       $('#nextInfo').slideUp(500);
     }
  });

  $('#finishInfo').on('click', function () {
    $('.main-info').remove();
  });
});
