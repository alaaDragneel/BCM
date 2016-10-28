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

  /*start run key activity modal*/
  $('#saveKeyActivity').on('click', function () {
       var keyActivity;
       var title = $(this).parents().siblings('.modal-body').children().children().siblings('#keyActivityTitle');
       var description = $(this).parents().siblings('.modal-body').children('#content').children().siblings('#keyActivityContent');
       /*
       keyInfo
       keyTitle
       keyDesc
       */
     $('.activities').css('display', 'block');
       if($('.activities').children().length == 0){
               keyActivity = '<div class="keyInfo">';
                    keyActivity += '<div class="keyTitle">';
                         keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                         keyActivity += '<span class="pull-right"><i class="fa fa-close deleteKeyActivity"></i></span>';
                         keyActivity += '<span class="pull-right"><i class="fa fa-edit editKeyActivity"></i></span>';
                         keyActivity += '<input type="text" class="editKey  form-control"> ';
                         keyActivity += '<div class="clearfix"></div>';
                    keyActivity += '</div>';
                    keyActivity += ' <div class="keyDesc">';
                         keyActivity += '<p>'+ description.val() +'</p>';
                         keyActivity += '<textarea type="text" class="editKeyDesc  form-control"></textarea>';
                    keyActivity += '</div>';
               keyActivity += '</div>';
            $('.activities').html(keyActivity);
            title.val('');
            description.val('');
            $('#addActivityModal').modal('hide');
       } else {
            keyActivity = '<div class="keyInfo">';
                keyActivity += '<div class="keyTitle">';
                     keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                     keyActivity += '<span class="pull-right"><i class="fa fa-close deleteKeyActivity"></i></span>';
                     keyActivity += '<span class="pull-right"><i class="fa fa-edit editKeyActivity"></i></span>';
                     keyActivity += '<input type="text" class="editKey form-control"> ';
                     keyActivity += '<div class="clearfix"></div>';
                keyActivity += '</div>';
                keyActivity += ' <div class="keyDesc">';
                     keyActivity += '<p>'+ description.val() +'</p>';
                     keyActivity += '<textarea type="text" class="editKeyDesc  form-control"></textarea>';
                keyActivity += '</div>';
           keyActivity += '</div>';
        $('.activities').append(keyActivity);
        title.val('');
        description.val('');
        $('#addActivityModal').modal('hide');
       }
       // delete part
       $('.deleteKeyActivity').on('click', function () {
            $(this).parents('.keyInfo').remove();
       });
       // edit part
       $('.editKeyActivity').on('click', function () {
            var titleEdit = $(this).parents().siblings('h6');
            var descEdit = $(this).parents().parents().children('.keyDesc').children('p');
              titleEditText = titleEdit.text();
              descEditText = descEdit.text();
            $(this).parents().siblings('input').val(titleEditText);
            $(this).parents().children('.keyDesc').children('textarea').val(descEditText);
            $(this).after("<button type='button' class='save btn btn-sm btn-primary'>save</button>");
            $(this).parents().siblings('input').fadeIn();
            $(this).parents().children('.keyDesc').children('textarea').fadeIn();
            $(this).remove();
            //update part
            $('.save').on('click', function() {
                 titleUpdateVal = $(this).parents().siblings('input').val();
                 descUpdateVal = $(this).parents().children('.keyDesc').children('textarea').val();
                 $(this).parents().siblings('h6').text(titleUpdateVal);
                 $(this).parents().parents().children('.keyDesc').children('p').text(descUpdateVal);
                 $(this).before('<span class="pull-right"><i class="fa fa-edit editKeyActivity"></i></span>');

                 $(this).parents().siblings('input').fadeOut();
                 $(this).parents().children('.keyDesc').children('textarea').fadeOut();
                 $(this).remove();
            });

       });
 });

 /*start run value modal*/////////////////////////////////////////////////////////////////////////////////////////////////
 $('#saveValue').on('click', function () {
      var keyActivity;
      var title = $(this).parents().siblings('.modal-body').children().children().siblings('#valueTitle');
      var description = $(this).parents().siblings('.modal-body').children('#contentValue').children().siblings('#valueContent');
      /*
      keyInfo
      keyTitle
      keyDesc
      */
    $('#Values').css('display', 'block');
      if($('#Values').children().length == 0){
              keyActivity = '<div class="valueInfo">';
                   keyActivity += '<div class="valueTitle">';
                        keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                        keyActivity += '<span class="pull-right"><i class="fa fa-close deleteValue"></i></span>';
                        keyActivity += '<span class="pull-right"><i class="fa fa-edit editValue"></i></span>';
                        keyActivity += '<input type="text" class="editvalue  form-control"> ';
                        keyActivity += '<div class="clearfix"></div>';
                   keyActivity += '</div>';
                   keyActivity += ' <div class="valueDesc">';
                        keyActivity += '<p>'+ description.val() +'</p>';
                        keyActivity += '<textarea type="text" class="editValueDesc  form-control"></textarea>';
                   keyActivity += '</div>';
              keyActivity += '</div>';
          $('#Values').html(keyActivity);
          title.val('');
          description.val('');
          $('#addValueModal').modal('hide');
      } else {
           keyActivity = '<div class="valueInfo">';
                keyActivity += '<div class="valueTitle">';
                     keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                     keyActivity += '<span class="pull-right"><i class="fa fa-close deleteValue"></i></span>';
                     keyActivity += '<span class="pull-right"><i class="fa fa-edit editValue"></i></span>';
                     keyActivity += '<input type="text" class="editvalue  form-control"> ';
                     keyActivity += '<div class="clearfix"></div>';
                keyActivity += '</div>';
                keyActivity += ' <div class="valueDesc">';
                     keyActivity += '<p>'+ description.val() +'</p>';
                     keyActivity += '<textarea type="text" class="editValueDesc  form-control"></textarea>';
                keyActivity += '</div>';
           keyActivity += '</div>';
       $('#Values').append(keyActivity);
       title.val('');
       description.val('');
       $('#addValueModal').modal('hide');
      }
      //   delete part
      $('.deleteValue').on('click', function () {
          $(this).parents('.valueInfo').remove();
      });
      // edit part
      $('.editValue').on('click', function () {
          var titleEdit = $(this).parents().siblings('h6');
          var descEdit = $(this).parents().parents().children('.valueDesc').children('p');
            titleEditText = titleEdit.text();
            descEditText = descEdit.text();
          $(this).parents().siblings('input').val(titleEditText);
          $(this).parents().children('.valueDesc').children('textarea').val(descEditText);
          $(this).after("<button type='button' class='save btn btn-sm btn-primary'>save</button>");
          $(this).parents().siblings('input').fadeIn();
          $(this).parents().children('.valueDesc').children('textarea').fadeIn();
          $(this).remove();
          //update part
          $('.save').on('click', function() {
               titleUpdateVal = $(this).parents().siblings('input').val();
               descUpdateVal = $(this).parents().children('.valueDesc').children('textarea').val();
               $(this).parents().siblings('h6').text(titleUpdateVal);
               $(this).parents().parents().children('.valueDesc').children('p').text(descUpdateVal);
               $(this).before('<span class="pull-right"><i class="fa fa-edit editValue"></i></span>');

               $(this).parents().siblings('input').fadeOut();
               $(this).parents().children('.valueDesc').children('textarea').fadeOut();
               $(this).remove();
          });

      });
});

/*END run value modal*//////////////////////////////////////////////////////////////////////////////////////////////

/*start run relation modal*//////////////////////////////////////////////////////////////////////////////////////////////
$('#saveRelation').on('click',function () {
     var keyActivity;
     var title = $(this).parents().siblings('.modal-body').children().children().siblings('#relationTitle');
     var description = $(this).parents().siblings('.modal-body').children('#contentRelation').children().siblings('#relationContent');
     /*
     keyInfo
     keyTitle
     keyDesc
     */
   $('#relations').css('display', 'block');
     if($('#relations').children().length == 0){
            keyActivity = '<div class="RelationInfo">';
                  keyActivity += '<div class="RelationTitle">';
                       keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                       keyActivity += '<span class="pull-right"><i class="fa fa-close deleteRelation"></i></span>';
                       keyActivity += '<span class="pull-right"><i class="fa fa-edit editrelation"></i></span>';
                       keyActivity += '<input type="text" class="editRelation  form-control"> ';
                       keyActivity += '<div class="clearfix"></div>';
                  keyActivity += '</div>';
                  keyActivity += ' <div class="RelationDesc">';
                       keyActivity += '<p>'+ description.val() +'</p>';
                       keyActivity += '<textarea type="text" class="editRelationDesc  form-control"></textarea>';
                  keyActivity += '</div>';
            keyActivity += '</div>';
         $('#relations').html(keyActivity);
         title.val('');
         description.val('');
         $('#addRelationModal').modal('hide');
     } else {keyActivity = '<div class="RelationInfo">';
           keyActivity += '<div class="RelationTitle">';
               keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
               keyActivity += '<span class="pull-right"><i class="fa fa-close deleteRelation"></i></span>';
               keyActivity += '<span class="pull-right"><i class="fa fa-edit editrelation"></i></span>';
               keyActivity += '<input type="text" class="editRelation  form-control"> ';
               keyActivity += '<div class="clearfix"></div>';
           keyActivity += '</div>';
           keyActivity += ' <div class="RelationDesc">';
               keyActivity += '<p>'+ description.val() +'</p>';
               keyActivity += '<textarea type="text" class="editRelationDesc  form-control"></textarea>';
           keyActivity += '</div>';
     keyActivity += '</div>';
  $('#relations').append(keyActivity);
      title.val('');
      description.val('');
      $('#addRelationModal').modal('hide');
     }
     // delete part
     $('.deleteRelation').on('click', function () {
         $(this).parents('.RelationInfo').remove();
     });
     //edit part
     $('.editrelation').on('click', function () {
         var titleEdit = $(this).parents().siblings('h6');
         var descEdit = $(this).parents().parents().children('.RelationDesc').children('p');
          titleEditText = titleEdit.text();
          descEditText = descEdit.text();
         $(this).parents().siblings('input').val(titleEditText);
         $(this).parents().children('.RelationDesc').children('textarea').val(descEditText);
         $(this).after("<button type='button' class='save btn btn-sm btn-primary'>save</button>");
         $(this).parents().siblings('input').fadeIn();
         $(this).parents().children('.RelationDesc').children('textarea').fadeIn();
         $(this).remove();
         // update part
         $('.save').on('click', function() {
              titleUpdateVal = $(this).parents().siblings('input').val();
              descUpdateVal = $(this).parents().children('.RelationDesc').children('textarea').val();
              $(this).parents().siblings('h6').text(titleUpdateVal);
              $(this).parents().parents().children('.RelationDesc').children('p').text(descUpdateVal);
              $(this).before('<span class="pull-right"><i class="fa fa-edit editrelation"></i></span>');

              $(this).parents().siblings('input').fadeOut();
              $(this).parents().children('.RelationDesc').children('textarea').fadeOut();
              $(this).remove();
         });

     });
});
/*end run relation modal*//////////////////////////////////////////////////////////////////////////////////////////////


/*start run resource modal*/////////////////////////////////////////////////////////////////////////
$('#saveResources').on('click',function () {
     var keyActivity;
     var title = $(this).parents().siblings('.modal-body').children().children().siblings('#resourceTitle');
     var description = $(this).parents().siblings('.modal-body').children('#contentResource').children().siblings('#resourceContent');
     /*
     keyInfo
     keyTitle
     keyDesc
     */
   $('#resources').css('display', 'block');
     if($('#resources').children().length == 0){
            keyActivity = '<div class="ResourceInfo">';
                  keyActivity += '<div class="ResourceTitle">';
                       keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                       keyActivity += '<span class="pull-right"><i class="fa fa-close deleteResource"></i></span>';
                       keyActivity += '<span class="pull-right"><i class="fa fa-edit editresource"></i></span>';
                       keyActivity += '<input type="text" class="editResource  form-control"> ';
                       keyActivity += '<div class="clearfix"></div>';
                  keyActivity += '</div>';
                  keyActivity += ' <div class="ResourceDesc">';
                       keyActivity += '<p>'+ description.val() +'</p>';
                       keyActivity += '<textarea type="text" class="editResourceDesc  form-control"></textarea>';
                  keyActivity += '</div>';
            keyActivity += '</div>';
         $('#resources').html(keyActivity);
         title.val('');
         description.val('');
         $('#addResourceModal').modal('hide');
     } else {
          keyActivity = '<div class="ResourceInfo">';
               keyActivity += '<div class="ResourceTitle">';
                    keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                    keyActivity += '<span class="pull-right"><i class="fa fa-close deleteResource"></i></span>';
                    keyActivity += '<span class="pull-right"><i class="fa fa-edit editresource"></i></span>';
                    keyActivity += '<input type="text" class="editResource  form-control"> ';
                    keyActivity += '<div class="clearfix"></div>';
               keyActivity += '</div>';
               keyActivity += ' <div class="ResourceDesc">';
                    keyActivity += '<p>'+ description.val() +'</p>';
                    keyActivity += '<textarea type="text" class="editResourceDesc  form-control"></textarea>';
               keyActivity += '</div>';
          keyActivity += '</div>';
      $('#resources').append(keyActivity);
      title.val('');
      description.val('');
      $('#addResourceModal').modal('hide');
     }
     // delete part
     $('.deleteResource').on('click', function () {
         $(this).parents('.ResourceInfo').remove();
     });
     // edit part
     $('.editresource').on('click', function () {
         var titleEdit = $(this).parents().siblings('h6');
         var descEdit = $(this).parents().parents().children('.ResourceDesc').children('p');
          titleEditText = titleEdit.text();
          descEditText = descEdit.text();
         $(this).parents().siblings('input').val(titleEditText);
         $(this).parents().children('.ResourceDesc').children('textarea').val(descEditText);
         $(this).after("<button type='button' class='save btn btn-sm btn-primary'>save</button>");
         $(this).parents().siblings('input').fadeIn();
         $(this).parents().children('.ResourceDesc').children('textarea').fadeIn();
         $(this).remove();
         // update part
         $('.save').on('click', function() {
              titleUpdateVal = $(this).parents().siblings('input').val();
              descUpdateVal = $(this).parents().children('.ResourceDesc').children('textarea').val();
              $(this).parents().siblings('h6').text(titleUpdateVal);
              $(this).parents().parents().children('.ResourceDesc').children('p').text(descUpdateVal);
              $(this).before('<span class="pull-right"><i class="fa fa-edit editresource"></i></span>');

              $(this).parents().siblings('input').fadeOut();
              $(this).parents().children('.ResourceDesc').children('textarea').fadeOut();
              $(this).remove();
         });

     });
});



/*start run relation modal*/
$('#saveChaneel').on('click',function () {
     var keyActivity;
     var title = $(this).parents().siblings('.modal-body').children().children().siblings('#chaneelTitle');
     var description = $(this).parents().siblings('.modal-body').children('#contentChaneel').children().siblings('#chaneelContent');
     /*
     keyInfo
     keyTitle
     keyDesc
     */
   $('#chaneels').css('display', 'block');
     if($('#chaneels').children().length == 0){
            keyActivity = '<div class="ChaneelInfo">';
                  keyActivity += '<div class="ChaneelTitle">';
                       keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                       keyActivity += '<span class="pull-right"><i class="fa fa-close deleteChaneel"></i></span>';
                       keyActivity += '<span class="pull-right"><i class="fa fa-edit editchaneel"></i></span>';
                       keyActivity += '<input type="text" class="editChaneel  form-control"> ';
                       keyActivity += '<div class="clearfix"></div>';
                  keyActivity += '</div>';
                  keyActivity += ' <div class="ChaneelDesc">';
                       keyActivity += '<p>'+ description.val() +'</p>';
                       keyActivity += '<textarea type="text" class="editChaneelDesc  form-control"></textarea>';
                  keyActivity += '</div>';
            keyActivity += '</div>';
         $('#chaneels').html(keyActivity);
         title.val('');
         description.val('');
         $('#addChaneelModal').modal('hide');
     } else {
          keyActivity = '<div class="ChaneelInfo">';
               keyActivity += '<div class="ChaneelTitle">';
                    keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                    keyActivity += '<span class="pull-right"><i class="fa fa-close deleteChaneel"></i></span>';
                    keyActivity += '<span class="pull-right"><i class="fa fa-edit editchaneel"></i></span>';
                    keyActivity += '<input type="text" class="editChaneel  form-control"> ';
                    keyActivity += '<div class="clearfix"></div>';
               keyActivity += '</div>';
               keyActivity += ' <div class="ChaneelDesc">';
                    keyActivity += '<p>'+ description.val() +'</p>';
                    keyActivity += '<textarea type="text" class="editChaneelDesc  form-control"></textarea>';
               keyActivity += '</div>';
          keyActivity += '</div>';
      $('#chaneels').append(keyActivity);
      title.val('');
      description.val('');
      $('#addChaneelModal').modal('hide');
     }

     $('.deleteChaneel').on('click', function () {
         $(this).parents('.ChaneelInfo').remove();
     });

     $('.editchaneel').on('click', function () {
         var titleEdit = $(this).parents().siblings('h6');
         var descEdit = $(this).parents().parents().children('.ChaneelDesc').children('p');
          titleEditText = titleEdit.text();
          descEditText = descEdit.text();
         $(this).parents().siblings('input').val(titleEditText);
         $(this).parents().children('.ChaneelDesc').children('textarea').val(descEditText);
         $(this).after("<button type='button' class='save btn btn-sm btn-primary'>save</button>");
         $(this).parents().siblings('input').fadeIn();
         $(this).parents().children('.ChaneelDesc').children('textarea').fadeIn();
         $(this).remove();

         $('.save').on('click', function() {
              titleUpdateVal = $(this).parents().siblings('input').val();
              descUpdateVal = $(this).parents().children('.ChaneelDesc').children('textarea').val();
              $(this).parents().siblings('h6').text(titleUpdateVal);
              $(this).parents().parents().children('.ChaneelDesc').children('p').text(descUpdateVal);
              $(this).before('<span class="pull-right"><i class="fa fa-edit editchaneel"></i></span>');

              $(this).parents().siblings('input').fadeOut();
              $(this).parents().children('.ChaneelDesc').children('textarea').fadeOut();
              $(this).remove();
         });

     });
});


/*start run relation modal*/
$('#saveCost').on('click',function () {
     var keyActivity;
     var title = $(this).parents().siblings('.modal-body').children().children().siblings('#costTitle');
     var description = $(this).parents().siblings('.modal-body').children('#contentCost').children().siblings('#costContent');

   $('#costs').css('display', 'block');
     if($('#costs').children().length == 0){
            keyActivity = '<div class="CostInfo">';
                  keyActivity += '<div class="CostTitle">';
                       keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                       keyActivity += '<span class="pull-right"><i class="fa fa-close deleteCost"></i></span>';
                       keyActivity += '<span class="pull-right"><i class="fa fa-edit editcost"></i></span>';
                       keyActivity += '<input type="text" class="editCost  form-control"> ';
                       keyActivity += '<div class="clearfix"></div>';
                  keyActivity += '</div>';
                  keyActivity += ' <div class="CostDesc">';
                       keyActivity += '<p>'+ description.val() +'</p>';
                       keyActivity += '<textarea type="text" class="editCostDesc  form-control"></textarea>';
                  keyActivity += '</div>';
            keyActivity += '</div>';
         $('#costs').html(keyActivity);
         title.val('');
         description.val('');
         $('#addCostModal').modal('hide');
     } else {
          keyActivity = '<div class="CostInfo">';
               keyActivity += '<div class="CostTitle">';
                    keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                    keyActivity += '<span class="pull-right"><i class="fa fa-close deleteCost"></i></span>';
                    keyActivity += '<span class="pull-right"><i class="fa fa-edit editcost"></i></span>';
                    keyActivity += '<input type="text" class="editCost  form-control"> ';
                    keyActivity += '<div class="clearfix"></div>';
               keyActivity += '</div>';
               keyActivity += ' <div class="CostDesc">';
                    keyActivity += '<p>'+ description.val() +'</p>';
                    keyActivity += '<textarea type="text" class="editCostDesc  form-control"></textarea>';
               keyActivity += '</div>';
          keyActivity += '</div>';
      $('#costs').append(keyActivity);
      title.val('');
      description.val('');
      $('#addCostModal').modal('hide');
     }

     $('.deleteCost').on('click', function () {
         $(this).parents('.CostInfo').remove();
     });

     $('.editcost').on('click', function () {
         var titleEdit = $(this).parents().siblings('h6');
         var descEdit = $(this).parents().parents().children('.CostDesc').children('p');
          titleEditText = titleEdit.text();
          descEditText = descEdit.text();
         $(this).parents().siblings('input').val(titleEditText);
         $(this).parents().children('.CostDesc').children('textarea').val(descEditText);
         $(this).after("<button type='button' class='save btn btn-sm btn-primary'>save</button>");
         $(this).parents().siblings('input').fadeIn();
         $(this).parents().children('.CostDesc').children('textarea').fadeIn();
         $(this).remove();

         $('.save').on('click', function() {
              titleUpdateVal = $(this).parents().siblings('input').val();
              descUpdateVal = $(this).parents().children('.CostDesc').children('textarea').val();
              $(this).parents().siblings('h6').text(titleUpdateVal);
              $(this).parents().parents().children('.CostDesc').children('p').text(descUpdateVal);
              $(this).before('<span class="pull-right"><i class="fa fa-edit editcost"></i></span>');

              $(this).parents().siblings('input').fadeOut();
              $(this).parents().children('.CostDesc').children('textarea').fadeOut();
              $(this).remove();
         });

     });
});


/*start run relation modal*/
$('#saveRev').on('click',function () {
     var keyActivity;
     var title = $(this).parents().siblings('.modal-body').children().children().siblings('#revTitle');
     var description = $(this).parents().siblings('.modal-body').children('#contentRev').children().siblings('#revContent');

   $('#revs').css('display', 'block');
     if($('#revs').children().length == 0){
            keyActivity = '<div class="RevInfo">';
                  keyActivity += '<div class="RevTitle">';
                       keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                       keyActivity += '<span class="pull-right"><i class="fa fa-close deleteRev"></i></span>';
                       keyActivity += '<span class="pull-right"><i class="fa fa-edit editrev"></i></span>';
                       keyActivity += '<input type="text" class="editRev  form-control"> ';
                       keyActivity += '<div class="clearfix"></div>';
                  keyActivity += '</div>';
                  keyActivity += ' <div class="RevDesc">';
                       keyActivity += '<p>'+ description.val() +'</p>';
                       keyActivity += '<textarea type="text" class="editRevDesc  form-control"></textarea>';
                  keyActivity += '</div>';
            keyActivity += '</div>';
         $('#revs').html(keyActivity);
         title.val('');
         description.val('');
         $('#addRevModal').modal('hide');
     } else {
          keyActivity = '<div class="RevInfo">';
                keyActivity += '<div class="RevTitle">';
                    keyActivity += '<h6 class="pull-left">'+ title.val() +'</h6>';
                    keyActivity += '<span class="pull-right"><i class="fa fa-close deleteRev"></i></span>';
                    keyActivity += '<span class="pull-right"><i class="fa fa-edit editrev"></i></span>';
                    keyActivity += '<input type="text" class="editRev  form-control"> ';
                    keyActivity += '<div class="clearfix"></div>';
                keyActivity += '</div>';
                keyActivity += ' <div class="RevDesc">';
                    keyActivity += '<p>'+ description.val() +'</p>';
                    keyActivity += '<textarea type="text" class="editRevDesc  form-control"></textarea>';
                keyActivity += '</div>';
          keyActivity += '</div>';
       $('#revs').append(keyActivity);
      title.val('');
      description.val('');
      $('#addRevModal').modal('hide');
     }

     $('.deleteRev').on('click', function () {
         $(this).parents('.RevInfo').remove();
     });

     $('.editrev').on('click', function () {
         var titleEdit = $(this).parents().siblings('h6');
         var descEdit = $(this).parents().parents().children('.RevDesc').children('p');
          titleEditText = titleEdit.text();
          descEditText = descEdit.text();
         $(this).parents().siblings('input').val(titleEditText);
         $(this).parents().children('.RevDesc').children('textarea').val(descEditText);
         $(this).after("<button type='button' class='save btn btn-sm btn-primary'>save</button>");
         $(this).parents().siblings('input').fadeIn();
         $(this).parents().children('.RevDesc').children('textarea').fadeIn();
         $(this).remove();

         $('.save').on('click', function() {
              titleUpdateVal = $(this).parents().siblings('input').val();
              descUpdateVal = $(this).parents().children('.RevDesc').children('textarea').val();
              $(this).parents().siblings('h6').text(titleUpdateVal);
              $(this).parents().parents().children('.RevDesc').children('p').text(descUpdateVal);
              $(this).before('<span class="pull-right"><i class="fa fa-edit editrev"></i></span>');

              $(this).parents().siblings('input').fadeOut();
              $(this).parents().children('.RevDesc').children('textarea').fadeOut();
              $(this).remove();
         });

     });
});

});
