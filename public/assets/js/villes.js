    const key = "00000000000000000000000000000000";

    $(document).ready(function(){
        $.getJSON("https://geo-battuta.net/api/country/all/?key="+key+"&callback=?",function(response){
            for(pays of response){
                var option = `<option value=${pays.code}>${pays.name}</option>`;
                $("#paysOptionsParent").append(option);
                $("#paysOptionsEtud").append(option);
            }
        })
        .fail((xhr, status) => console.log('error:', status));
    });

    $("#paysOptionsParent").change(e => {
        $("#regionOptionsParent").html('<option selected disabled>-----------</option>');
        $("#villeOptionsParent").html('<option selected disabled>-----------</option>');
        let codePays = e.target.value;
        listRegions(codePays,"Parent");
    });


    $("#paysOptionsEtud").change(e => {
        $("#regionOptionsEtud").html('<option selected disabled>-----------</option>');
        $("#villeOptionsEtud").html('<option selected disabled>-----------</option>');
        let codePays = e.target.value;
        listRegions(codePays,"Etud");
    });
    function listRegions(codePays,element) {
        $.getJSON("https://geo-battuta.net/api/region/"+codePays+"/all/?key="+key+"&callback=?",function(response){
            for (data of response) {
                $("#regionOptions"+element).append(`<option>${data.region}</option>`);
            }
        })
        .fail((xhr, status) => console.log('error:', status));
    }

    $("#regionOptionsParent").change(e => {
        $("#villeOptionsParent").html('<option selected disabled>-----------</option>');
        let regionSelected = e.target.value;
        listVilles(regionSelected,"Parent");
    });

    $("#regionOptionsEtud").change(e => {
        $("#villeOptionsEtud").html('<option selected disabled>-----------</option>');
        let regionSelected = e.target.value;
        listVilles(regionSelected,"Etud");
    });


    function listVilles(region,element) {
        currentPays=$("#paysOptions"+element).val();
        $.getJSON("https://geo-battuta.net/api/city/"+currentPays+"/search/?region="+region+"&key="+key+"&callback=?",function(response){
            for (data of response) {
                $("#villeOptions"+element).append(`<option>${data.city}</option>`);
            }
        })
        .fail((xhr, status) => console.log('error:', status));
    }
