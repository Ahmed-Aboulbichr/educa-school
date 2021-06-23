$(document).ready(function(){



    $.ajax({
        url: config.routes.getFormations,
        type: 'get',
        dataType : 'json',
        success: function(response) {
            var option;
             for(var i=0; i<response.length; i++){

              (candidat.candidatures[candidat.candidatures.length-1].formation_id==response[i]['id'])?option = "<option selected value='"+response[i]['id']+"'>"+response[i]['name']+"</option>":option = "<option value='"+response[i]['id']+"'>"+response[i]['name']+"</option>"
            

                $("#formationsOptions").append(option); 
            }
        },
        error: function(error) {
         
           console.log(error);
        }
        
    })
});