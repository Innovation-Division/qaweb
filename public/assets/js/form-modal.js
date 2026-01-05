$(document).ready(function () {
    $('#continueForm3').click(function (event) {
        event.preventDefault();
        $('#hidden-fields').html('');
        $('#form3 input').each(function () {
            console.log($(this).attr('id'));
            console.log($(this).attr('name'));
            console.log($(this).val());
            let fieldName = $(this).attr('name'); // Get input name
            let fieldId = $(this).attr('id'); // Get input ID
            let fieldValue = $(this).val(); // Get input value
            $('#hidden-fields').append('<input type="hidden" id="' + fieldId + '" name="' + fieldName + '" value="' + fieldValue + '">');
        });
        //$('#form_modal').submit();
    });
});