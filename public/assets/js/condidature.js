$("#infoCandidat").on('submit',function(){
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

$("#infoBaccalaureat").on('submit',function(){
    $.ajax({
        url: config.routes.saveCandidatStepThree,
        type: 'post',
        data:{
          data : $(this).serialize(),
        },
        success: function(response) {

        }

    })
});

$("#fichierBac").on('submit',function(){
    $.ajax({
        url: config.routes.saveCandidatStepFour,
        type: 'post',
        data:{
          data : $(this).serialize(),
        },
        success: function(response) {

        }

    })
});

$("#choixFormation").on('submit',function(){
    $.ajax({
        url: config.routes.saveCandidatStepFive,
        type: 'post',
        data:{
          data : $(this).serialize(),
        },
        success: function(response) {

        }

    })
});
// on ready return all values to inputes
