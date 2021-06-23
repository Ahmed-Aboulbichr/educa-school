$("#infoCandidat ").on('submit',function(e){
  e.preventDefault();
  $('#NextStepBtn').attr('class',"disabled");
  action =  $('#NextStepBtn').attr('onclick');
  $('#NextStepBtn').attr('onclick',"");
    $.ajax({
        url: config.routes.saveCandidatStepOne,
        type: 'post',
        data: $(this).serialize(),

        success: function(response) {
          alert('success');
          
          $('#NextStepBtn').attr( 'class',"next");
           $('#progrss-wizard').bootstrapWizard('next');
          $('#NextStepBtn').attr('class',"");
          $('#NextStepBtn').off();
          $('#NextStepBtn').attr('onclick',"$('#infoParent').submit()");
         
         
          
        },
        error: function(response) {
          console.log(response);
         $('#NextStepBtn').attr('class',"");
        $('#NextStepBtn').attr('onclick',action);
        }

    });
});


$("#infoParent").on('submit',function(e){
  e.preventDefault();
  $('#NextStepBtn').attr('class',"disabled");
  action =  $('#NextStepBtn').attr('onclick');
  $('#NextStepBtn').attr('onclick',"");
    $.ajax({
        url: config.routes.saveCandidatStepTwo,
        type: 'post',
        data: $(this).serializeArray(),

        success: function(response) {
          alert('success');
          console.log(response);
          $('#NextStepBtn').attr( 'class',"next");
           $('#progrss-wizard').bootstrapWizard('next');
           $('#NextStepBtn').off();
          $('#NextStepBtn').attr('class',"upload-file");
          $('#NextStepBtn').attr('onclick',"$('#infoBaccalaureat').submit()");
         
         
          
        },
        error: function(response) {
          console.log(response);
          $('#NextStepBtn').off();
         $('#NextStepBtn').attr('class',"");
        $('#NextStepBtn').attr('onclick',action);
        }

    });
});


$("#infoBaccalaureat").on('submit',function(e){
  e.preventDefault();
  if($('#NextStepBtn').hasClass('upload-file')){
    $('#NextStepBtn').attr('class',"disabled upload-file");

   }else{
    $('#NextStepBtn').attr('class',"disabled");
   }

  action =  $('#NextStepBtn').attr('onclick');
  $('#NextStepBtn').attr('onclick',"");
    $.ajax({
        url: config.routes.saveCandidatStepThree,
        type: 'post',
        data: $(this).serialize(),

        success: function(response) {

           if($('#NextStepBtn').hasClass('upload-file')){
            alert('please upload required files first ');
            $('#NextStepBtn').attr('onclick',action);
           }else{
            $('#progrss-wizard').bootstrapWizard('next');
             $('#NextStepBtn').off();
             $('#NextStepBtn').attr('class',"");
            $('#NextStepBtn').attr('onclick',"$('#choixFormation').submit()");
           }
        },
        error: function(response) {
          console.log(response);
          if($('#NextStepBtn').hasClass('upload-file')){
            $('#NextStepBtn').attr('class',"upload-file");

           }else{
            $('#NextStepBtn').attr('class',"");
           }
          $('#NextStepBtn').attr('onclick',action);
        }

    });
});


$(function() {
 $('.upload-file').on('click',function(){

    alert('please upload required files first ');

 });


  var fileList = new Array;
  var i = 0;

   $("#fichierBac").dropzone({

       url: config.routes.saveCandidatStepFour,
       addRemoveLinks: true,
       maxFiles: 4,
       acceptedFiles: 'image/*',
       maxFilesize: 5,
       init: function () {
           this.on("success", function (file, serverFileName) {
            alert('uploaded successfully');
               file.serverFn = serverFileName;
               fileList[i] = {
                   "serverFileName": serverFileName,
                   "fileName": file.name,
                   "fileId": i
               };
               i++;

               $('#NextStepBtn').attr('class',"");
           });
           this.on("error", function (file, error) {
            console.log(error);
            $('#NextStepBtn').attr('class',"upload-file");
            alert('error accrured');
           });
       }
   });
});



$("#choixFormation").on('submit',function(e){
  e.preventDefault();
  $('#NextStepBtn').attr('class',"disabled");
  action =  $('#NextStepBtn').attr('onclick');
  $('#NextStepBtn').attr('onclick',"");
    $.ajax({
        url: config.routes.saveCandidatStepFive,
        type: 'post',
        data: $(this).serialize(),

        success: function(response) {
          $('#NextStepBtn').attr( 'class',"next");
           $('#progrss-wizard').bootstrapWizard('next');
           $('#NextStepBtn').off();
        $('#NextStepBtn').attr('onclick','');
        },
        error: function(response) {
          console.log(response);
          $('#NextStepBtn').attr('class',"");
          $('#NextStepBtn').attr('onclick',action);
        }

    });
});
