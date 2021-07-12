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
          console.log(response);
          $('#NextStepBtn').attr( 'class',"next");
           $('#progrss-wizard').bootstrapWizard('next');
           (uploadFile)? $('#NextStepBtn').attr( 'class',"upload-file"):$('#NextStepBtn').attr( 'class',"");
           $('#NextStepBtn').off();
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

                  
          $('#NextStepBtnA').html('Finish');
          $('#NextStepBtn').removeClass('disabled');
           $('#progrss-wizard').bootstrapWizard('next');
           $('#NextStepBtn').off();
           config.routes.Finish = response.url;
           $('#NextStepBtnA').attr('href',config.routes.Finish);

           
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

var uploadFile = true;
$(function() {

  $('.upload-file').on('click',function(){

    alert('please upload required files first ');

 });


  
 

  var fileList = new Array;
  var i = 0;

   $("#fichierBac").dropzone({
      
       resizeWidth: 1000,
       resizeHeight: 644,
       dictDefaultMessage: 'Default Message',
       dictFileTooBig: 'File Too Big >5MB ',
       dictRemoveFile: 'Remove File',
       dictCancelUpload: 'Cancel Upload',
       dictMaxFilesExceeded: 'Max Files Exceeded !',
       url: config.routes.saveCandidatStepFour,
       addRemoveLinks: true,
       maxFiles: 1,
       acceptedFiles: 'image/*',
       maxFilesize: 5,
       init: function () {
        let myDropzone = this;
       
        for (const key in docFiles) {
         if (Object.hasOwnProperty.call(docFiles, key)) {
          const element = docFiles[key];
          let mockFile = { name: element.path, size: 1024 };
          uploadFile = false ;
          myDropzone.displayExistingFile(mockFile,  element.path  );
           }
          } 
           this.on("success", function (response,file, serverFileName) {
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
