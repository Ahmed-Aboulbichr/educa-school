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
          $('#NextStepBtn').attr('class',"Next");
          $('#NextStepBtn')[0].click();
          $('#NextStepBtn').attr('class',"");
          $('#NextStepBtn').attr('onclick',config.routes.saveCandidatStepTwo);
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
        data: $(this).serialize(),
       
        success: function(response) {

          $('#NextStepBtn').attr('class',"Next");
          $('#NextStepBtn')[0].click();
          $('#NextStepBtn').attr('class',"");
          $('#NextStepBtn').attr('onclick',config.routes.saveCandidatStepThree);
        },
        error: function(response) {
          console.log(response);
          $('#NextStepBtn').attr('class',"");
          $('#NextStepBtn').attr('onclick',action);
        }
        
    });
});








$("#infoBaccalaureat").on('submit',function(e){

  e.preventDefault();
  $('#NextStepBtn').attr('class',"disabled");
  action =  $('#NextStepBtn').attr('onclick');
  $('#NextStepBtn').attr('onclick',"");
    $.ajax({
        url: config.routes.saveCandidatStepThree,
        type: 'post',
        data: $(this).serialize(),
       
        success: function(response) {
          $('#NextStepBtn').attr('class',"Next");
          $('#NextStepBtn')[0].click();
          $('#NextStepBtn').attr('class',"upload-file");
          //$('#NextStepBtn').attr('onclick',config.routes.saveCandidatStepFour);
        },
        error: function(response) {
          console.log(response);
          $('#NextStepBtn').attr('class',"");
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

               $('#NextStepBtn').attr('onclick',config.routes.saveCandidatStepFour);
               $('#NextStepBtn').attr('class',"");
           });

           this.on("error", function (file, serverFileName) {
             
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
          $('#NextStepBtn').attr('class',"Next");
          $('#NextStepBtn')[0].click();
         // $('#NextStepBtn').attr('onclick',config.routes.saveCandidatStepFive);
        },
        error: function(response) {
          console.log(response);
          $('#NextStepBtn').attr('class',"");
          $('#NextStepBtn').attr('onclick',action);
        }
        
    });
});