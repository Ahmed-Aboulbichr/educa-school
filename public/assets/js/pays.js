

        $(document).ready(function(){
            $.ajax({
                url: config.routes.getPays,
                type: 'get',
                dataType : 'json',
                success: function(response) {
                     for(var i=0; i<response.length; i++){

                        //var option = "<option value='"+response[i]['id']+"'>"+response[i]['name']+"</option>";

                         (candidat.pay_id==response[i]['id'])?option = "<option selected value="+response[i]['id']+">"+response[i]['name']+"</option>":option = "<option value='"+response[i]['id']+"'>"+response[i]['name']+"</option>"

                        $("#paysOptionsEtud").append(option);
                        $("#paysOptionsParent").append(option);

                    }
                }

            });
            $.ajax({
                url: config.routes.getNationality,
                type: 'get',
                dataType : 'json',
                success: function(response) {
                     for(var i=0; i<response.length; i++){

                        //var option = "<option value='"+response[i]['id']+"'>"+response[i]['name']+"</option>";

                         (candidat.nationalite_id==response[i]['id'])?option = "<option selected value="+response[i]['id']+">"+response[i]['name']+"</option>":option = "<option value='"+response[i]['id']+"'>"+response[i]['name']+"</option>"

                        $("#nationalities").append(option);
                    }
                }

            });
        });
