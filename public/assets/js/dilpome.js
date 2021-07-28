
function alertFunction(e, btn) {
    e.preventDefault();
    var form = $(btn).parents('form');
    console.log(form.attr('action'));
    Swal.fire({
        title: 'êtes vous sûr de supprimer ce diplôme?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'J\'annule',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, je le supprime!'
    }).then((result) => {
        if (result.value) {
            form.submit();
        }
    });
}

$('#nvEtude').on('change', function (event) {
    var value = $(this).val();
    var divs = $('.col-lg-6');
    if (value == "BAC+2" || value == "BAC+4" || value == "BAC+5") {
        if (divs.length == 8) {
            var val = divs.last().clone();
            var label = val.find('label');
            label.html('Attestation de réussite');
            label.attr('for', 'attestation');
            var input = val.find('input[type=file]');
            input.attr('id', 'attestation')
            input.attr('value', 'Attestation_Reussite');
            $(val).insertAfter($('.col-lg-6').last());
        }
    } else {
        if (divs.length == 9) {
            divs.last().remove();
        }
    }
})
