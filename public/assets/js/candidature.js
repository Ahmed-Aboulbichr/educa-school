



$("#choixFormation").on('submit',function(e){
  e.preventDefault();
  $('#NextStepBtn').attr('class',"disabled");
  action =  $('#NextStepBtn').attr('onclick');
  $('#NextStepBtn').attr('onclick',"");
    $.ajax({
        url: config.routes.saveCandidature,
        type: 'post',
        data: $(this).serialize(),

        success: function(response) {
          
          $('#NextStepBtnA').html('generer l\'attestation de préinscription');
          $('#NextStepBtn').removeClass('disabled');
           $('#progrss-wizard').bootstrapWizard('next');
           $('#NextStepBtn').off();
           config.routes.showPDF = response.url;
           $('#NextStepBtnA').attr('href',config.routes.showPDF);
        },
        error: function(response) {
          console.log(response);
          $('#NextStepBtn').attr('class',"");
          $('#NextStepBtn').attr('onclick',action);
        }

    });
});


