$(document).ready(function() {
  $('h4[rel=popover]').click(function() {
    $(this).popover('toggle');
  });
  $('h4[rel=popover]').hover(function() {
    $(this).popover('show');
  }, function() {
    $(this).popover('hide');
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

       $('.deleteKeyActivity').on('click', function () {
            $(this).parents('.keyInfo').remove();
       });

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

 /*start runvalue modal*/
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

      $('.deleteValue').on('click', function () {
          $(this).parents('.valueInfo').remove();
      });

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
/*start run relation modal*/
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

     $('.deleteRelation').on('click', function () {
         $(this).parents('.RelationInfo').remove();
     });

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

});
