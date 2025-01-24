<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

    var onloadCallback = function() {
        grecaptcha.render('recaptcha', {
            'sitekey': '{{ config('app.recaptchaKey') }}'
        });
    };

    $(document).ready(function() {

        @if ($errors->any())
            $('#inquiry-modal').modal('show');
        @endif

        $(document).on('hidden.bs.modal', '#inquiry-modal', function (e) {
            clearModalFields();
        });

        $('#product-inquiry-form').on('submit', function(e){
            e.preventDefault();
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Please confirm if you're not a robot.");
                return false;
            } else {
                this.submit();
            }
        });

        var clearModalFields = function() {
            $('#first_name').val('');
            $('#last_name').val('');
            $('#email_address').val('');
            $('#message').val('');
            $('.feedback').remove();
            $('#inquiry-modal').find('div').removeClass('invalid invalid-required');
        };

        $(document).on('show.bs.modal', '#inquiry-modal', function(e){
            let target = $(e.relatedTarget);
            let modalForm = $(e.currentTarget).find('.modal-form');

            if (target.data('isnew')) {
                clearModalFields();
            }

            if (target.data('product-name')) {
                var $newOption = $("<option selected='selected'></option>").val(target.data('product-name')).text(target.data('product-name'));
                $('#product').empty();
                $('#product').append($newOption).trigger('change');
            }

            $('#topic').select2({
                minimumResultsForSearch: Infinity,
                dropdownParent: $('#inquiry-modal')
            });

            $('#product').select2({
                minimumResultsForSearch: Infinity,
                dropdownParent: $('#inquiry-modal')
            });
        });

    });

</script>
