$("#infoCandidat ").on('submit',function(e){
  e.preventDefault();
  $('#NextStepBtn').attr('class',"disabled")
    $.ajax({
        url: config.routes.saveCandidatStepOne,
        type: 'post',
        data: $(this).serialize(),
       
        success: function(response) {
          $('#NextStepBtn').attr('class',"Next")
        }
        
    })
});

$("#infoParent").on('submit',function(e){
  e.preventDefault();
    $.ajax({
        url: config.routes.saveCandidatStepTwo,
        type: 'post',
        data:{
          data : $(this).serialize(),
        },
        success: function(response) {
          
        }
        
    })
});








$("#infoBaccalaureat").on('submit',function(e){

  e.preventDefault();

    $.ajax({
        url: config.routes.saveCandidatStepThree,
        type: 'post',
        data: $(this).serializeArray(),
        
        success: function(response) {
          console.log(response);
        },
        error: function(response) {
          console.log(response.responseText);
        }
        
    })
});






$(function() {
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
           });

           this.on("error", function (file, serverFileName) {
            alert('error accrured');
              
           });
       }
   });
});

   















$("#choixFormation").on('submit',function(e){
  e.preventDefault();
    $.ajax({
        url: config.routes.saveCandidatStepFive,
        type: 'post',
        data: $(this).serializeArray(),

        success: function(response) {
          console.log(response);
        },
        error: function(response) {
          console.log(response.responseText);
        }
        
    })
});