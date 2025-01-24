jQuery(document).ready(function()
{
    autoFillGender(
    {
        'gender': 'gender'
    });

    autoFillNation(
    {
        'nationality': 'nationality',
        'ap_el' : '.personalInfoItp',
    });

    autoFillNation(
    {
        'nationality': 'nationality',
        'ap_el' : '.personalInfo',
    });

    autoFillOccu(
    {
        'occupation': 'occupation',
        'ap_el' : '.personalInfoItp',
    });

    autoFillGenderItp(
    {
        'gender': 'gender'
    });
// family family_personal_information
    autoFillAllItp(
    {
        'element': 'gender',
        'ap_el' : '.personalInfoItp [data-fieldset-row="family_personal_information"]',
    });

    autoFillAllItp(
    {
        'element': 'nationality',
        'ap_el' : '.personalInfoItp [data-fieldset-row="family_personal_information"]',
    });

    autoFillAllItp(
    {
        'element': 'occupation',
        'ap_el' : '.personalInfoItp [data-fieldset-row="family_personal_information"]',
    });
//group
    autoFillAllItp(
    {
        'element': 'gender',
        'ap_el' : '.personalInfoItp [data-fieldset-row="group_contact_person"]',
    });

    autoFillAllItp(
    {
        'element': 'nationality',
        'ap_el' : '.personalInfoItp [data-fieldset-row="group_contact_person"]',
    });

    autoFillAllItp(
    {
        'element': 'occupation',
        'ap_el' : '.personalInfoItp [data-fieldset-row="group_contact_person"]',
    });

    // field for company
    autoFillAllItp(
    {
        'element': 'gender',
        'ap_el' : '.personalInfoItp [data-fieldset-row="company_contact_person"]',
    });

    autoFillAllItp(
    {
        'element': 'nationality',
        'ap_el' : '.personalInfoItp [data-fieldset-row="company_contact_person"]',
    });

    autoFillAllItp(
    {
        'element': 'occupation',
        'ap_el' : '.personalInfoItp [data-fieldset-row="company_contact_person"]',
    });
    

    autoFillLocationGroupItp(
    {
        'location': 'province',
        'ap_el' : '.personalInfoItp [data-fieldset-row="mailing_address"]',
        'municipality' : 'municipality',
        'brgy' : 'brgy',
    });

    autoFillLocationGroupItp(
    {
        'location': 'province',
        'ap_el' : '.personalInfoItp [data-fieldset-row="group_contact_person_mailing_address"]',
        'municipality' : 'municipality',
        'brgy' : 'brgy',
    });

    autoFillLocationGroupItp(
    {
        'location': 'province',
        'ap_el' : '.personalInfoItp [data-fieldset-row="company_contact_person_mailing_address"]',
        'municipality' : 'municipality',
        'brgy' : 'brgy',
    });

    jQuery('[name="personal_information[nationality]"]').attr('data-builder-default-value', jQuery('[name="personal_information[nationality]"]').data('location-vehicle-value')).data('builder-default-value', jQuery('[name="personal_information[nationality]"]').data('location-vehicle-value'));

    jQuery('#megaForm-defaultForm-1').on('submit', function(event)
    {

        jQuery('[name="checkout[firstname]"]').val(jQuery('[name="personal_information[first_name]"]').val());
        jQuery('[name="checkout[lastname]"]').val(jQuery('[name="personal_information[last_name]"]').val());
        jQuery('[name="checkout[address]"]').val(jQuery('[name="mailing_address[address]"]').val());
        jQuery('[name="checkout[city]"]').val(jQuery('[name="mailing_address[city]"]').val());
        jQuery('[name="checkout[tel_no]"]').val(jQuery('[name="contact_information[telephone_number]"]').val());
        jQuery('[name="checkout[email]"]').val(jQuery('[name="contact_information[email]"]').val());

        var new_action = BASE_URL + "/checkout/onepage/index/previous_form_key/" + jQuery(this).find('[name="form_key"]').val();

        jQuery(this).attr('action', new_action);

        // event.preventDefault();
    });

    jQuery('[name="mailing_address[same_location]"]').on('change', function()
    {
        if (this.checked)
        {
            jQuery('[name="mailing_address[province]"]')
                .attr('data-builder-default-value', jQuery('[name="mailing_address[province]"]').data('location-default-value'))
                .data('builder-default-value', jQuery('[name="mailing_address[province]"]').data('location-default-value'));
            jQuery('[name="mailing_address[city]"]')
                .attr('data-builder-default-value', jQuery('[name="mailing_address[city]"]').data('location-default-value'))
                .data('builder-default-value', jQuery('[name="mailing_address[city]"]').data('location-default-value'));
            jQuery('[name="mailing_address[barangay]"]')
                .attr('data-builder-default-value', jQuery('[name="mailing_address[barangay]"]').data('location-default-value'))
                .data('builder-default-value', jQuery('[name="mailing_address[barangay]"]').data('location-default-value'));
            autoFillLocation(
            {
                'location': 'province',
                'ap_el' : '.personalInfo'
            });
        }
        else
        {
            jQuery('[name="mailing_address[province]"]')
                .data('builder-default-value', '')
                .removeAttr('data-builder-default-value');
            jQuery('[name="mailing_address[city]"]')
                .data('builder-default-value', '')
                .removeAttr('data-builder-default-value');
            jQuery('[name="mailing_address[barangay]"]')
                .data('builder-default-value', '')
                .removeAttr('data-builder-default-value');

            jQuery('[name="mailing_address[province]"]').val("");
            jQuery('[name="mailing_address[city]"]').val("");
            jQuery('[name="mailing_address[barangay]"]').val("");

            jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').resetForm();
        }
    }); 
});
