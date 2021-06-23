$(document).ready(function(){
    $.ajax({
        url: config.routes.getAcademies,
        type: 'get',
        dataType : 'json',
        success: function(response) {
             for(var i=0; i<response.length; i++){

                (candidat.academie_id==response[i]['id'])?option = "<option selected value='"+response[i]['id']+"'>"+response[i]['name']+"</option>":option = "<option value='"+response[i]['id']+"'>"+response[i]['name']+"</option>"
               
                $("#academiesOptions").append(option); 
            }
        }
        
    })
});
