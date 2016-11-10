$(document).ready(function () {

/*
**======================================================================
** All Url For the Ajax CAn Found In The Includes/proSearch/searchForm
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
             var phone = $(this).siblings('.userInfo').children('.num').text();
             var email = $(this).siblings('.userInfo').children('.email').text();
             var job = $(this).siblings('.userInfo').children('.job').text();
             var desc = $(this).siblings('.userInfo').children('.Desc').text();

             $.ajax({
               method: 'post',
               url: urlBtn,
               data: {id: id.val(), name: name, phone: phone, email: email, job: job, desc: desc, bmc_id: bmc_id, _token: token},

          }).done(function(msg) {
               kp += '<div class="callout callout-info optionsKP" data-kp="'+ msg['resultsBtn'] +'">';
               kp += '<div class="card-optionKP">';
               kp += '<span class="pull-right deleteKP"><i class="fa fa-close"></i></span>';
               kp += '</div>';
               kp += '<h4 class="fullName"><i class="fa fa-user"></i> '+ name +'</h4>';
               kp += '<h4 class="num"><i class="fa fa-phone"></i> '+ phone +'</h4>';
               kp += '<h4 class="email"><i class="fa fa-envelope"></i> '+ email +'</h4>';
               kp +=  '<h4 class="job"><i class="fa fa-briefcase"></i> '+ job +'</h4>';
               kp += '<p class="Desc"><i class="fa fa-black-tie"></i> '+ desc +'</p>';
               kp += '</div>';

               $('#Partner').append(kp);
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

                  $.ajax({ //ajax call
                    method:'get',
                    url: KPurlBtnDelete,
                    data:{id: IdDelete, _token: token},
                    success: function(msg){ //success
                      // show the success delete div
                      $('#successDelete').slideDown(300);
                      // put the outPut
                      $('#successDelete').append(msg['successDelete']);
                      //hide the success delete div
                      $('#successDelete').delay(2000).slideUp();
                      //reload the page after ....s
                      setTimeout(function(){
                        location.reload()
                      }, 2500);
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

       $.ajax({ //ajax call
         method:'get',
         url: KPurlBtnDelete,
         data:{id: IdDelete, _token: token},
         success: function(msg){ //success
           // show the success delete div
           $('#successDelete').slideDown(300);
           // put the outPut
           $('#successDelete').append(msg['successDelete']);
           //hide the success delete div
           $('#successDelete').delay(2000).slideUp();
           //reload the page after ....s
           setTimeout(function(){
             location.reload()
           }, 2500);
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

   /*=======================================Customer Segments Area ====================================*/

   /*gender btn*/
   $('.gender').on('click', function() {
     $(this).siblings().removeClass('btn-primary').addClass('btn-default');
     $(this).removeClass('btn-default').addClass('btn-primary');
   });
   /*gender btn*/

   /*location select*/
   $('.location').on('change', function() {
     locationText = $(this).find('option:selected');
     $.ajax({
       method: 'GET',
       url: urlCustomer,
       data: {area: locationText.text(), _token: token},

      }).done(function(msg) {
       // view the response with json
       $('.peoples').html(msg['ResultsCompanies']);
      });

   });
   /*location select*/

   $('#saveSegments').on('click', function() {
     //gender
     var gender = $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children().children('.btn-primary').val();
     if(gender === undefined){
       gender = 'All';
     }
     // age
     var ageFrom = $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.age').children().children().children('.from').find('option:selected').val();
     var ageTo = $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.age').children().siblings().children('.toCont').children().find('option:selected').val();

     // location
     var location =  $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.location').find('option:selected').text();

     var people = $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.peoples').find('option:selected').val();
       Segments = '<div class="userInfo">';
       Segments +='<i class="fa fa-close pull-right deleteSegments"></i>';
       Segments +='<i class="fa fa-edit editSegments pull-right SegmentsEdit"></i>';
       Segments +='<button class="save btn btn-primary">Save</button>';
       Segments +='<div class="clearfix"></div>';
      Segments += '<h4 class="fullName"><i class="fa fa-user"></i> gender</h4><div class="clearfix"></div>';
      Segments += '<h6 class="num" id="gender"><i class="fa fa-user"></i>'+ gender +'</h4><div class="clearfix"></div>';
      Segments += '<select class="genderSelect form-control">';
      Segments += '<option>All</option>';
      Segments += '<option>Male</option>';
      Segments += '<option>Female</option>';
      Segments += '</select>';
      Segments += '<h4 class="fullName"><i class="fa fa-user"></i> age From</h4><div class="clearfix"></div>';
      Segments += '<h6 class="num" id="ageFrom"><i class="fa fa-user"></i>'+ ageFrom +'</h4><div class="clearfix"></div>';
      Segments += '<select class="fromSelect form-control">';
        for (i=16; i <= 65 ; i++) {
            Segments += '<option value="'+i+'">'+i+'</option>'
        }
      Segments += '</select>';
      Segments += '<h4 class="fullName"><i class="fa fa-user"></i> age To</h4><div class="clearfix"></div>';
      Segments += '<h6 class="num" id="ageTo"><i class="fa fa-user"></i>'+ ageTo +'</h4><div class="clearfix"></div>';
      Segments += '<select class="toSelect form-control">';
        for (i=16; i <= 65 ; i++) {
            Segments += '<option value="'+i+'">'+i+'</option>'
        }
      Segments += '</select>';
      Segments += '<h4 class="fullName"><i class="fa fa-user"></i> location </h4><div class="clearfix"></div>';
      Segments += '<h6 class="num" id="location"><i class="fa fa-user"></i>'+ location +'</h4><div class="clearfix"></div>';
      Segments += '<select class="countrySelect form-control">';
        Segments += '<option value="Egypt">Egypt</option>';
        Segments += '<option value="cairo">cairo</option>';
        Segments += '<option value="Giza">Giza</option>';
      Segments += '</select>';
      if(people === ''){
          Segments += '<div class="alert alert-info">You Didn\'t choose any Fields</div>';
      } else {

        Segments += '<h4 class="fullName"><i class="fa fa-user"></i> people</h4><div class="clearfix"></div>';
        Segments += '<h6 class="email" id="people"><i class="fa fa-user"></i>'+ people +'</h4><div class="clearfix"></div>';
        Segments += '<div class="companies2"></div>';

      }
      $('#Segments').append(Segments);

     $('#addSegmentsModal').modal('hide');

     $('.deleteSegments').on('click', function () {
        $(this).parents('.userInfo').remove();
     });

     $('.SegmentsEdit').on('click', function() {
       $(this).fadeOut();
       $(this).siblings('.save').fadeIn();
       var id = $(this).parents().data('id');
       var gender = $(this).siblings('#gender');
       var ageFrom = $(this).siblings('#ageFrom');
       var ageTo = $(this).siblings('#ageTo');
       var location = $(this).siblings('#location');
       var people = $(this).siblings('#people').text();

       $(this).siblings('.genderSelect').fadeIn();
       $(this).siblings('.genderSelect').find("option:contains("+gender.text()+")").attr('selected', 'selected');

       $(this).siblings('.fromSelect').fadeIn();
       $(this).siblings('.fromSelect').find("option:contains("+ageFrom.text()+")").attr('selected', 'selected');

       $(this).siblings('.toSelect').fadeIn();
       $(this).siblings('.toSelect').find("option:contains("+ageTo.text()+")").attr('selected', 'selected');

       $(this).siblings('.countrySelect').fadeIn();
       $(this).siblings('.countrySelect').find("option:contains("+location.text()+")").attr('selected', 'selected');

      //  $(this).siblings('.companies2').fadeIn();

        $.ajax({
          method: 'GET',
          url: urlCustomer,
          data: {area: location.text(), _token: token},

         }).done(function(msg) {
          // view the response with json
          $('.companies2').html(msg['ResultsCompanies']);
         });
       //
      //    $(this).siblings('.countrySelect').on('change', function() {
      //      locationText = $(this).siblings('.countrySelect').find('option:selected');
      //      console.log(locationText.text());
      //      $.ajax({
      //        method: 'GET',
      //        url: urlCustomer,
      //        data: {area: locationText.text(), _token: token},
       //
      //       }).done(function(msg) {
      //        // view the response with json
      //        $('.companies2').html(msg['ResultsCompanies']);
      //       });
      //    });
       //
      //  test = $(this).parents().children().siblings('.companies2').children().find("option:contains("+people+")").text();
      //  console.log(test);
       $('.save').on('click', function() {
         var selectorGender = $(this).siblings('.genderSelect').find('option:selected');
         gender.text(selectorGender.text());

         var selectorFrom = $(this).siblings('.fromSelect').find('option:selected');
         ageFrom.text(selectorFrom.text());

         var selectorTo = $(this).siblings('.toSelect').find('option:selected');
         ageTo.text(selectorTo.text());

         var selectorCountry = $(this).siblings('.countrySelect').find('option:selected');
         location.text(selectorCountry.text());


          $(this).fadeOut();
          $(this).siblings('.SegmentsEdit').fadeIn();
          $(this).siblings('.genderSelect').fadeOut();
          $(this).siblings('.fromSelect').fadeOut();
          $(this).siblings('.toSelect').fadeOut();
          $(this).siblings('.countrySelect').fadeOut();
          $(this).siblings('.companies2').fadeOut();
       });
     });
   });
});
