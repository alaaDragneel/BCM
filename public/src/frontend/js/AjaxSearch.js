
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
          $('.results .userInfo .requestBtn').click(function(){
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
