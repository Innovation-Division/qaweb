$( document ).ready(function() {
    var url = $('input[name=url]').val();
    var _token = $('input[name=_token]').val();
    jQuery.ajax({
        url: url + '/epartnerhub/get/notifications',
        method: "POST",
        data: {
            '_token': _token
        },   error: function(data){
            var errors = data.responseJSON;
            jQuery.each(data, function(key, value){
              });
          }, 

        success: function (response) {
           if(response.length === 0){
            var newNotification ='<div class="list-group-item">\
                                    <div class="row align-items-center">\
                                        <div class="col text-truncate">\
                                            <a href="#" class="text-body d-block"> </a>\
                                            <div class="d-block text-muted text-truncate mt-n1" styles="witdh:100%">\
                                               <i>No notification &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>';
                $('#divNotification').append(newNotification);
           }else{
            jQuery.each(response, function(key, value) {
                var incon = "";
                if(value.status === "Unread"){
                    $('#divnotifyicon').append('<span class="badge bg-red"></span>');
                }
                if(value.status === "Unread"){
                    incon = "bg-red";
                }

                var urllink = $('input[name=url]').val() + "/"+ value.link;
                var newNotification = '\
                    <div class="list-group-item">\
                        <div class="row align-items-center">\
                            <div class="col-auto"><span class="status-dot status-dot-animated '+ incon +' d-block"></span></div>\
                            <div class="col text-truncate">\
                                <a href="'+urllink+'" class="text-body d-block">'+value.name+' &bull; '+value.created_at+' </a>\
                                <div class="d-block text-muted text-truncate mt-n1">\
                                    '+value.description+'\
                                </div>\
                            </div>\
                            <div class="col-auto">\
                                <a href="#" class="list-group-item-actions">\
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"\
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"\
                                        stroke="currentColor" fill="none" stroke-linecap="round"\
                                        stroke-linejoin="round">\
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />\
                                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />\
                                    </svg>\
                                </a>\
                            </div>\
                        </div>\
                    </div>\
                ';
                $('#divNotification').append(newNotification);
            });
           }
        }
    })

    $('#btn-notification').click(function (e) {
        jQuery.ajax({
            url: url + '/epartnerhub/update/notifications',
            method: "POST",
            data: {
                '_token': _token
            }, 
            success: function (response) {
            }
        })
    });
});