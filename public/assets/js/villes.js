    const key = "00000000000000000000000000000000";

    $(document).ready(function(){
        $.getJSON("https://geo-battuta.net/api/country/all/?key="+key+"&callback=?",function(response){
            for(pays of response){
                var option = `<option value=${pays.code}>${pays.name}</option>`;
                $("#paysOptionsParent").append(option);
            }
        })
        .fail((xhr, status) => console.log('error:', status));
    });

    $("#paysOptionsParent").change(e => {
        $("#regionOptionsParent").html('<option selected disabled>-----------</option>');
        $("#villeOptionsParent").html('<option selected disabled>-----------</option>');
        let codePays = e.target.value;
        listRegions(codePays);
    });

    function listRegions(codePays) {
        $.getJSON("https://geo-battuta.net/api/region/"+codePays+"/all/?key="+key+"&callback=?",function(response){
            for (data of response) {
                $("#regionOptionsParent").append(`<option>${data.region}</option>`);
            }
        })
        .fail((xhr, status) => console.log('error:', status));
    }

    $("#regionOptionsParent").change(e => {
        $("#villeOptionsParent").html('<option selected disabled>-----------</option>');
        let regionSelected = e.target.value;
        listVilles(regionSelected);
    });


    function listVilles(region) {
        currentPays=$("#paysOptionsParent").val();
        $.getJSON("https://geo-battuta.net/api/city/"+currentPays+"/search/?region="+region+"&key="+key+"&callback=?",function(response){
            for (data of response) {
                $("#villeOptionsParent").append(`<option>${data.city}</option>`);
            }
        })
        .fail((xhr, status) => console.log('error:', status));
    }
