$(document).ready(function () {

  /*
  **======================================================================
  ** All Url For the Ajax Can Found In The Includes/proSearch/searchForm
  **======================================================================
  */
  // define the search , fillter and results elements
  var search = $('#search');

  var results = $('.results');

  // start send the data when the user keyup from the search box
  search.on('keyup', function() {
    $.ajax({
      method: 'GET',
      url: url,
      data: { body: search.val(), _token: token},

    }).done(function(msg) {
      // check if the response undifined and hide it to give more security
      if(msg['results'] === undefined || msg['results'] === ''){
        results.css('border-color', '#bce8f1');
        results.html('<div class="alert alert-info text-center" style="margin-top:20px;">Not Found But If You No the Company You Can Add It By Click <i class="fa fa-plus"></i></div>');
      }else{
        // view the response with json
        results.html(msg['results']);

      }

      // run the request button
      $('.requestBtn').click(function(){
        var kp = '';
        var id = $(this).siblings('input');
        var bmc_id = $('#bizcanvas').data('id');
        var name = $(this).siblings('.userInfo').children('.fullName').text();
        var email = $(this).siblings('.userInfo').children('.email').text();
        var job = $(this).siblings('.userInfo').children('.job').text();
        var desc = $(this).siblings('.userInfo').children('.Desc').text();

        $.ajax({
          method: 'post',
          url: urlBtn,
          data: {id: id.val(), name: name, email: email, job: job, desc: desc, bmc_id: bmc_id, _token: token},

        }).done(function(msg) {


          $('#Partner').append(msg['resultsBtn']);
          // view the key-activity option
          $('.optionsKP').on('mouseenter', function() {
            // show the card option
            $(this).children('.card-optionKP').slideDown(500);
            // hide the key-activity option
          }).on('mouseleave', function() {
            // hide the card option
            $(this).children('.card-optionKP').slideUp(500);
          });

          // delete request
          $('.deleteKP').on('click', function() {
            //id
            var IdDelete = $(this).parents().parents().data('kp');
            $(this).parents('.optionsKP').slideUp(500, function() {
              $(this).remove();
            });

            $.ajax({ //ajax call
              method:'get',
              url: KPurlBtnDelete,
              data:{id: IdDelete, _token: token},
              success: function(msg){ //success
                $('#successDelete').html();
                // show the success delete div
                $('#successDelete').slideDown(300);
                // put the outPut
                $('#successDelete').append(msg['successDelete']);
                //hide the success delete div
                $('#successDelete').delay(2000).slideUp();
              }, //success
            });
          });

        });
      });
    });
  });

  // view the key-activity option
  $('.optionsKP').on('mouseenter', function() {
    // show the card option
    $(this).children('.card-optionKP').slideDown(500);
    // hide the key-activity option
  }).on('mouseleave', function() {
    // hide the card option
    $(this).children('.card-optionKP').slideUp(500);
  });

  // delete request
  $('.deleteKP').on('click', function() {
    //id
    var IdDelete = $(this).parents().parents().data('kp');
    $(this).parents('.optionsKP').slideUp(500, function() {
      $(this).remove();
    });

    $.ajax({ //ajax call
      method:'get',
      url: KPurlBtnDelete,
      data:{id: IdDelete, _token: token},
      success: function(msg){ //success
        $('#successDelete').html('');
        // show the success delete div
        $('#successDelete').slideDown(300);
        // put the outPut
        $('#successDelete').append(msg['successDelete']);
        //hide the success delete div
        $('#successDelete').delay(2000).slideUp();
      }, //success
    });
  });

  /*start show and hide the result element*/
  search.on('keyup', function() {
    if($(this).val() !== ''){
      results.css('display', 'block');
    } else {
      results.css('display', 'none');
    }
  });
  /*end show and hide the result element*/

  /*style and animate search box*/
  search.on('focus', function() {
    // strt style and animete
    $('.back').css({
      "width": '100%',
      "height": '100%',
      "background-color": 'rgba(68, 64, 64, 0.64)',
      "position": 'absolute',
      'left': '0',
      'top': '0'
    });
    $('.back span').css({
      "position": 'absolute',
      'right': '0',
      'top': '0',
      'display': 'inline'
    });
    $(this).animate({
      width: '85%',
      left: '7.5%',
      top: '30%'
    }, "slow").css({
      'position': 'absolute',
      'z-index': '999',
      'left': '7.5%',
      'top': '10%'

    });

    $('.results').animate({
      width: '85%',
      left: '7.5%',
      top: '35.5%'
    }, "slow").css({
      'position': 'absolute',
      'z-index': '999'
    });
  });
  /*style and animate search box*/
  $('.back, .back span').click(function() {
    $('.back').css({
      "width": '0',
      "height": '0',
      "background-color": 'none',
      "position": 'static',
      'left': '0',
      'top': '0'
    });
    search.css({
      'position': 'static',
      'left': '0',
      'top': '0'

    });

    $('.results').css('display', 'none');
    $('.back span').css('display', 'none');
  });


});
