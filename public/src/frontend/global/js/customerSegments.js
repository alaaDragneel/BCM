$(document).ready(function() {
  /*=======================================Customer Segments Area ====================================*/

  /*gender btn*/
  $('.gender').on('click', function() {
    $(this).siblings().removeClass('btn-primary').addClass('btn-default');
    $(this).removeClass('btn-default').addClass('btn-primary');
  });
  /*gender btn*/

  /*location select*/
  $('#getCountries').on('change', function() {
    locationId = $(this).find('option:selected').val();
    $.ajax({
      method: 'GET',
      url: urlCustomer,
      data: {area: locationId, _token: token},

    }).done(function(msg) {
      // view the response with json
      $('.governorates').html(msg['ResultsCompanies']);

      // citeis ajax
      $('#cities').on('change', function() {
        governorateId = $(this).find('option:selected').val();
        $.ajax({
          method: 'GET',
          url: urlCustomerCities,
          data: {area: governorateId, _token: token},

        }).done(function(msg) {
          // view the response with json
          $('.cities').html(msg['ResultsCompanies']);
        });
      });

    });

  });
  /*location select*/

  $('#saveSegments').on('click', function() {
    var id = $('#bizcanvas').data('id');
    //gender
    var gender = $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children().children('.btn-primary').val();
    if(gender === undefined){
      gender = 'All';
    }
    // age
    var ageFrom = $(this).parents()
    .siblings('.modal-body').children().children('.panel-body')
    .children().children('.age').children().children()
    .children('.from').find('option:selected').val();
    var ageTo = $(this).parents().
    siblings('.modal-body').children().children('.panel-body')
    .children().children('.age').children().siblings()
    .children('.toCont').children().find('option:selected').val();

    // location
    var location =  $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.location').find('option:selected').text();
    // governorates
    var governorates =  $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.governorates').find('option:selected').text();
    // cities
    var cities =  $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.cities').find('option:selected').text();
    $.ajax({
      method: 'POST',
      url: CSurl,
      data: {
        id: id,
        gender: gender,
        ageFrom: ageFrom,
        ageTo: ageTo,
        location: location,
        governorates: governorates,
        cities: cities,
        _token: token,
      },

    }).done(function(msg) {
      // view the response with json
      $('#Segments').append(msg['outPut']);
      $('#success').html('');
      // show the success delete div
      $('#success').slideDown(300);
      // put the outPut
      $('#success').append(msg['success']);
      //hide the success delete div
      $('#success').delay(2000).slideUp();
      $('#addSegmentsModal').modal('hide');
      csDynamic();
    }).fail(function (xhr){
      $('#addSegmentsModal').modal('hide');
      var errors = xhr.responseJSON;
      $.each(errors ,function(key, value) {
        $('#errors ul').html('');
        // show the success delete div
        $('#errors').slideDown(500);
        // put the outPut
        $('#errors ul').append('<li>'+value+'</li>');
        //hide the success delete div
        $('#errors').delay(2000).slideUp();
      });
    });
  });
  function csDynamic(){
    $('.infoCS').on('click', function() {
      $(this).parents().siblings('.infoCSDiv').slideToggle(500);
    });
    // view the key-activity option
    $('.optionsCS').on('mouseenter', function() {
      // show the card option
      $(this).children('.card-optionCS').slideDown(500);
      // hide the key-activity option
    }).on('mouseleave', function() {
      $(this).children('.card-optionCS').slideUp(500);
      // hide the card option
    });

    //delete CS
    $('.deleteCS').on('click', function() {
      //id
      var IdDelete = $(this).parents().parents().data('cs');
      $(this).parents('.optionsCS').slideUp(500, function() {
        $(this).remove();
      });
      $.ajax({ //ajax call
        method:'get',
        url: CSurlDelete,
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

    //edit
    $('.editCS').on('click', function() {
      id = $(this).parents().parents().data('cs');

      gender = $(this).parents().siblings('.genderVal');
      ageFrom = $(this).parents().siblings('.ageFrom');
      ageTo = $(this).parents().siblings('.ageTo');
      country = $(this).parents().siblings('.country');
      governorate = $(this).parents().siblings('.governorate');
      city = $(this).parents().siblings('.city');
      // click the gender button
      $('.gendersEdit .gender').each(function() {
        if($(this).val() == gender.text()) {
          $(this).removeClass('btn-default').addClass('btn-primary');
        }
      });

      // select the ages
      // age from
      $('.ageEdit .fromEdit').find('option:contains('+ageFrom.text()+')').attr('selected', true);
      // age to
      $('.ageEdit .toContEdit').find('option:contains('+ageTo.text()+')').attr('selected', true);

      // country
      $('#editSegmentsModal .location #getCountries').find('option:contains('+country.text()+')').attr('selected', true);

      locationId = $('#editSegmentsModal .location #getCountries').find('option:selected').val();
      $.ajax({
        method: 'GET',
        url: urlCustomer,
        data: {area: locationId, _token: token},

      }).done(function(msg) {
        // view the response with json
        $('#editSegmentsModal .governorates').html(msg['ResultsCompanies']);
        $('#editSegmentsModal #cities').find('option:contains('+governorate.text()+')').attr('selected', true);
        // citeis ajax
        governorateId = $('#editSegmentsModal #cities').find('option:selected').val();
        $.ajax({
          method: 'GET',
          url: urlCustomerCities,
          data: {area: governorateId, _token: token},

        }).done(function(msg) {
          // view the response with json
          $('#editSegmentsModal .cities').html(msg['ResultsCompanies']);
          $('#editSegmentsModal #city').find('option:contains('+city.text()+')').attr('selected', true);
        });
        $('#editSegmentsModal #cities').on('change', function() {
          governorateId = $('#editSegmentsModal #cities').find('option:selected').val();
          $.ajax({
            method: 'GET',
            url: urlCustomerCities,
            data: {area: governorateId, _token: token},

          }).done(function(msg) {
            // view the response with json
            $('#editSegmentsModal .cities').html(msg['ResultsCompanies']);
            $('#editSegmentsModal #city').find('option:contains('+city+')').attr('selected', true);
          });
        });

      });
      /****************************************************************************************/

      /*location select*/
      $('#editSegmentsModal .location #getCountries').on('change', function() {
        locationId = $(this).find('option:selected').val();
        $.ajax({
          method: 'GET',
          url: urlCustomer,
          data: {area: locationId, _token: token},

        }).done(function(msg) {
          // view the response with json
          $('#editSegmentsModal .governorates').html(msg['ResultsCompanies']);
          // citeis ajax
          $('#editSegmentsModal #cities').on('change', function() {
            governorateId = $(this).find('option:selected').val();
            $.ajax({
              method: 'GET',
              url: urlCustomerCities,
              data: {area: governorateId, _token: token},

            }).done(function(msg) {
              // view the response with json
              $('#editSegmentsModal .cities').html(msg['ResultsCompanies']);
              $('#editSegmentsModal #city').find('option:contains('+city+')').attr('selected', true);
            });
          });

        });
      });

      $('#editSegmentsModal').modal();
    });
    /**/
    $('#updateSegments').on('click', function () {
      //gender
      var genderField = $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children().children('.btn-primary').val();
      if(genderField === undefined){
        gender = 'All';
      }
      // age
      var ageFromField = $(this).parents()
      .siblings('.modal-body').children().children('.panel-body')
      .children().children('.ageEdit').children().children()
      .children('.fromEdit').find('option:selected').val();
      var ageToField = $(this).parents().
      siblings('.modal-body').children().children('.panel-body')
      .children().children('.ageEdit').children().siblings()
      .children('.toContEdit').children().find('option:selected').val();

      // location
      var locationField =  $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.location').find('option:selected').text();
      // governorates
      var governoratesField =  $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.governorates').find('option:selected').text();
      // cities
      var citiesField =  $(this).parents().siblings('.modal-body').children().children('.panel-body').children().children('.cities').find('option:selected').text();
      // update ajax call
      $.ajax({
        method: 'POST',
        url: CSurlUpdate,
        data: {
          id: id,
          gender: genderField,
          ageFrom: ageFromField,
          ageTo: ageToField,
          location: locationField,
          governorates: governoratesField,
          cities: citiesField,
          _token: token,
        },

      }).done(function(msg) {
        // view the response with json
        gender.text(genderField)
        ageFrom.text(ageFromField)
        ageTo.text(ageToField)
        country.text(locationField)
        governorate.text(governoratesField)
        city.text(citiesField)
        // show the success delete div
        $('#success').slideDown(300);
        // put the outPut
        $('#success').append(msg['successUpdate']);
        //hide the success delete div
        $('#success').delay(2000).slideUp();
        $('#editSegmentsModal').modal('hide');
      }).fail(function (xhr){
        $('#editSegmentsModal').modal('hide');
        var errors = xhr.responseJSON;
        $.each(errors ,function(key, value) {
          $('#errors ul').html('');
          // show the success delete div
          $('#errors').slideDown(500);
          // put the outPut
          $('#errors ul').append('<li>'+value+'</li>');
          //hide the success delete div
          $('#errors').delay(2000).slideUp();
        });
      });
    });

  }
  csDynamic();
});
