$(document).ready(function(){
    $.ajax({
        url: config.routes.getSecteurProfessions,
        type: 'get',
        dataType : 'json',
        success: function(response) {
                for(secteur of response){
                    var option = `<option value=${secteur.id}>${secteur.name}</option>`;
                    $("#secteur_pere_name").append(option);
                    $("#secteur_mere_name").append(option);
                }
        },
        error: function(response) {
            console.log(response.responseText);
        }
    })
});
