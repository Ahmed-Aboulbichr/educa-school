
    $(document).ready(function(){
        $.getJSON('https://countriesnow.space/api/v0.1/countries/')
        .done(function(response) {
            for(data of response.data){
                var option = `<option>${data.country}</option>`;
                $("#paysOptionsParent").append(option);

            }
        })
        .fail((xhr, status) => console.log('error:', status));
    });


    $("#paysOptionsParent").change(e => {
        $("#villeOptionsParent").html('<option selected disabled>-----------</option>');
        let paySelected = e.target.value;
        listVilles(paySelected);
    });


// Function for list cities

function listVilles(paySelected) {
    $.getJSON('https://countriesnow.space/api/v0.1/countries/')
    .done(function(response) {

        let villes = response.data.filter(c => {
            return c.country.includes(paySelected);
        })
        for (data of villes[0].cities) {
            $("#villeOptionsParent").append(`<option>${data}</option>`);
        }
    })
    .fail((xhr, status) => console.log('error:', status));

}

