$(document).ready(function(){

    $.ajax({
        url: config.routes.getFormations,
        type: 'get',
        dataType : 'json',
        success: function(response) {
            console.log(response);
        },
        error: function(error) {

           console.log(error);
        }

    })
});
