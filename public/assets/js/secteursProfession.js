$(document).ready(function(){
    $.ajax({
        url: config.routes.getSecteurProfessions,
        type: 'get',
        dataType : 'json',
        success: function(response) {
                for(secteur of response){
                   // var option = `<option value=${secteur.id}>${secteur.name}</option>`;

                   (candidat.sec_profession_pere_id==secteur.id)?option = "<option selected value="+secteur.id+">"+secteur.name+"</option>":option = "<option value='"+secteur.id+"'>"+secteur.name+"</option>";
                   (candidat.sec_profession_mere_id==secteur.id)?option2 = "<option selected value="+secteur.id+">"+secteur.name+"</option>":option2 = "<option value='"+secteur.id+"'>"+secteur.name+"</option>";

                    $("#secteur_pere_name").append(option);
                    $("#secteur_mere_name").append(option2);
                }
        },
        error: function(response) {
            console.log(response.responseText);
        }
    })
});
