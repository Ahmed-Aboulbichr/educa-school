$(document).ready(function(){
    $.ajax({
        url: config.route.getSecteurProfessions,
        type: 'get',
        dataType : 'json',
        success: function(response) {
                console.log(response);
            }
        }

    })
});
