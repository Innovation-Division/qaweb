$(document).ready(function() {
    $("input").on("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Prevent default form submission or new line
            return false;
        }
    });

    $('#goToPolicyholder').on('click', function() {
        $('#accountAs').hide();
        $('#form1').show();
        $("#form1, #form2, #form3, #form4, #form5")[0].reset();
    });

    $('#goToPartner').on('click', function() {
        $('#accountAs').hide();
        $('#asPartner').show();
    });

})