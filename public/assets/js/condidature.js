$("#infoCandidat ").on('submit',function(e){
  e.preventDefault();
    $.ajax({
        url: config.routes.saveCandidatStepOne,
        type: 'post',
        data:{
          data : $(this).serializeArray(),
        },
        success: function(response) {

        }

    })
});

$("#infoParent").on('submit',function(e){
  e.preventDefault();
    $.ajax({
        url: config.routes.saveCandidatStepTwo,
        type: 'post',
        data:{
          data : $(this).serializeArray(),
        },
        success: function(response) {
            console.log(response);
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

$("#fichierBac").on('submit',function(e){
  e.preventDefault();
  var form = $(this)[0]; // You need to use standard javascript object here
  var formData = new FormData(form);
    $.ajax({
        url: config.routes.saveCandidatStepFour,
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          console.log(response);
        },
        error: function(response) {
          console.log(response.responseText);
        }

    })
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
// on ready return all values to inputes
