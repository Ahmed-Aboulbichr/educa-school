$(document).ready(function(){
    $.ajax({
        url: config.routes.getPays,
        type: 'get',
        dataType : 'json',
        success: function(response) {
                for(var i=0; i<response.length; i++){
                var option = "<option value='"+response[i]['id']+"'>"+response[i]['name']+"</option>";
                $("#paysOptions").append(option);
            }
        }

    })
});
