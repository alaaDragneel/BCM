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
          results.html('<div class="alert alert-info text-center" style="margin-top:20px;">Not Found</div>');
        }else{
          // view the response with json
          results.html(msg['results']);

        }
        // run the request button
        $('.requestBtn').click(function(){
             var id = $(this).siblings('input');
             $.ajax({
               method: 'GET',
               url: urlBtn,
               data: {id: id.val(), _token: token},

          }).done(function(msg) {
               // view the response with json
               $('#Partner').append(msg['resultsBtn']);
          });
        });
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
     var locationText = $(this).find('option:selected');
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

     var people = $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.peoples').find('option:selected').text();

      Segments = '<div class="userInfo">';
      Segments += '<h4 class="fullName"><i class="fa fa-user"></i> gender</h4><div class="clearfix"></div>';
      Segments += '<h6 class="num"><i class="fa fa-user"></i> '+ gender +'</h4><div class="clearfix"></div>';
      Segments += '<h4 class="fullName"><i class="fa fa-user"></i> age From</h4><div class="clearfix"></div>';
      Segments += '<h6 class="num"><i class="fa fa-user"></i> '+ ageFrom +'</h4><div class="clearfix"></div>';
      Segments += '<h4 class="fullName"><i class="fa fa-user"></i> age To</h4><div class="clearfix"></div>';
      Segments += '<h6 class="num"><i class="fa fa-user"></i> '+ ageTo +'</h4><div class="clearfix"></div>';
      Segments += '<h4 class="fullName"><i class="fa fa-user"></i> location </h4><div class="clearfix"></div>';
      Segments += '<h6 class="num"><i class="fa fa-user"></i> '+ location +'</h4><div class="clearfix"></div>';
      if(people === ''){
          Segments += '<div class="alert alert-info">You Didn\'t choose any Fields</div>';
      } else {
        Segments += '<h4 class="fullName"><i class="fa fa-user"></i> people</h4><div class="clearfix"></div>';
        Segments += '<h6 class="email"><i class="fa fa-user"></i> '+ people +'</h4><div class="clearfix"></div>';
      }
      $('#Segments').append(Segments);

     $('#addSegmentsModal').modal('hide');
   });
});
