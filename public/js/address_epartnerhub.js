jQuery('#claim_motor_permanent_province').change(function(){
    if(jQuery(this).val() != '')
    {   
        var province = jQuery(this).val();   
         var _token = jQuery('input[name="_token"]').val();
         var url = jQuery('input[name="url"]').val();
         jQuery.ajax({
             url:url + '/api/covid/city/get',
              method:"GET",
              data:{ _token:_token,province:province}, 
              success:function(result)
              {        
                  jQuery('#permanent_municipality_motor').empty();
                  $('#permanent_municipality_motor').append($('<option>', { 
                    value: "",
                    text : "- Select City/Municipality -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_municipality_motor').append($('<option>', { 
                    value: value.city,
                    text : value.city 
                }));			    	
            })  
                jQuery('#permanent_municipality_motor').selectpicker("refresh"); 
              }
        })
    }
}); 

jQuery('#claim_motor_permanent_province_view').change(function(){
    if(jQuery(this).val() != '')
    {         
        var province = jQuery(this).val();   
         var _token = jQuery('input[name="_token"]').val();
         var url = jQuery('input[name="url"]').val();
         jQuery.ajax({
             url:url + '/api/covid/city/get',
              method:"GET",
              data:{ _token:_token,province:province}, 
              success:function(result)
              {        
                  jQuery('#permanent_municipality_motor_view').empty();
                  $('#permanent_municipality_motor_view').append($('<option>', { 
                    value: "",
                    text : "- Select City/Municipality -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_municipality_motor_view').append($('<option>', { 
                    value: value.city,
                    text : value.city 
                }));			    	
            })  
                jQuery('#permanent_municipality_motor_view').selectpicker("refresh"); 
              }
        })
    }
});

jQuery('#claim_motor_permanent_province_not').change(function(){
    if(jQuery(this).val() != '')
    {         
        var province = jQuery(this).val();   
         var _token = jQuery('input[name="_token"]').val();
         var url = jQuery('input[name="hidURL"]').val();
         jQuery.ajax({
             url:url + '/api/covid/city/get',
              method:"GET",
              data:{ _token:_token,province:province}, 
              success:function(result)
              {        
                  jQuery('#permanent_municipality_motor_not').empty();
                  $('#permanent_municipality_motor_not').append($('<option>', { 
                    value: "",
                    text : "- Select City/Municipality -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_municipality_motor_not').append($('<option>', { 
                    value: value.city,
                    text : value.city 
                }));			    	
            })  
                jQuery('#permanent_municipality_motor_not').selectpicker("refresh"); 
              }
        })
    }
});

jQuery('#permanent_province_pa').change(function(){
    if(jQuery(this).val() != '')
    {         
        var province = jQuery(this).val();   
         var _token = jQuery('input[name="_token"]').val();
         var url = jQuery('input[name="url"]').val();
         jQuery.ajax({
             url:url + '/api/covid/city/get',
              method:"GET",
              data:{ _token:_token,province:province}, 
              success:function(result)
              {        
                  jQuery('#permanent_municipality_pa').empty();
                  $('#permanent_municipality_pa').append($('<option>', { 
                    value: "",
                    text : "- Select City/Municipality -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_municipality_pa').append($('<option>', { 
                    value: value.city,
                    text : value.city 
                }));			    	
            })  
                jQuery('#permanent_municipality_pa').selectpicker("refresh"); 
              }
        })
    }
}); 

jQuery('#permanent_province_pa_view').change(function(){
    if(jQuery(this).val() != '')
    {         
        var province = jQuery(this).val();   
         var _token = jQuery('input[name="_token"]').val();
         var url = jQuery('input[name="url"]').val();
         jQuery.ajax({
             url:url + '/api/covid/city/get',
              method:"GET",
              data:{ _token:_token,province:province}, 
              success:function(result)
              {        
                  jQuery('#permanent_municipality_pa_view').empty();
                  $('#permanent_municipality_pa_view').append($('<option>', { 
                    value: "",
                    text : "- Select City/Municipality -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_municipality_pa_view').append($('<option>', { 
                    value: value.city,
                    text : value.city 
                }));			    	
            })  
                jQuery('#permanent_municipality_pa_view').selectpicker("refresh"); 
              }
        })
    }
}); 

jQuery('#permanent_province_property').change(function(){
    if(jQuery(this).val() != '')
    {         
        var province = jQuery(this).val();   
         var _token = jQuery('input[name="_token"]').val();
         var url = jQuery('input[name="url"]').val();
         jQuery.ajax({
             url:url + '/api/covid/city/get',
              method:"GET",
              data:{ _token:_token,province:province}, 
              success:function(result)
              {        
                  jQuery('#permanent_municipality_property').empty();
                  $('#permanent_municipality_property').append($('<option>', { 
                    value: "",
                    text : "- Select City/Municipality -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_municipality_property').append($('<option>', { 
                    value: value.city,
                    text : value.city 
                }));			    	
            })  
                jQuery('#permanent_municipality_property').selectpicker("refresh"); 
              }
        })
    }
}); 

jQuery('#permanent_province_property_view').change(function(){
    if(jQuery(this).val() != '')
    {         
        var province = jQuery(this).val();   
         var _token = jQuery('input[name="_token"]').val();
         var url = jQuery('input[name="url"]').val();
         jQuery.ajax({
             url:url + '/api/covid/city/get',
              method:"GET",
              data:{ _token:_token,province:province}, 
              success:function(result)
              {        
                  jQuery('#permanent_municipality_property_view').empty();
                  $('#permanent_municipality_property_view').append($('<option>', { 
                    value: "",
                    text : "- Select City/Municipality -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_municipality_property_view').append($('<option>', { 
                    value: value.city,
                    text : value.city 
                }));			    	
            })  
                jQuery('#permanent_municipality_property_view').selectpicker("refresh"); 
              }
        })
    }
}); 

jQuery('#permanent_municipality_motor').change(function(){
    if(jQuery(this).val() != '')
    {         
        var city = jQuery(this).val();   
        var _token = jQuery('input[name="_token"]').val();
        var url = jQuery('input[name="url"]').val();
        jQuery.ajax({
            url:url + '/api/covid/barangay/get',
            method:"GET",
            data:{ _token:_token,city:city}, 
            success:function(result)
            {        
                jQuery('#permanent_barangay_motor').empty();
                $('#permanent_barangay_motor').append($('<option>', { 
                    value: "",
                    text : "- Select Barangay -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_barangay_motor').append($('<option>', { 
                    value: value.barangay,
                    text : value.barangay 
                }));			    	
            })  
                jQuery('#permanent_barangay_motor').selectpicker("refresh"); 
            }
        })
    }
});

jQuery('#permanent_municipality_motor_view').change(function(){
    if(jQuery(this).val() != '')
    {         
        var city = jQuery(this).val();   
        var _token = jQuery('input[name="_token"]').val();
        var url = jQuery('input[name="url"]').val();
        jQuery.ajax({
            url:url + '/api/covid/barangay/get',
            method:"GET",
            data:{ _token:_token,city:city}, 
            success:function(result)
            {        
                jQuery('#permanent_barangay_motor_view').empty();
                $('#permanent_barangay_motor_view').append($('<option>', { 
                    value: "",
                    text : "- Select Barangay -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_barangay_motor_view').append($('<option>', { 
                    value: value.barangay,
                    text : value.barangay 
                }));			    	
            })  
                jQuery('#permanent_barangay_motor_view').selectpicker("refresh"); 
            }
        })
    }
});

jQuery('#permanent_municipality_motor_not').change(function(){
    if(jQuery(this).val() != '')
    {         
        var city = jQuery(this).val();   
        var _token = jQuery('input[name="_token"]').val();
        var url = jQuery('input[name="hidURL"]').val();
        jQuery.ajax({
            url:url + '/api/covid/barangay/get',
            method:"GET",
            data:{ _token:_token,city:city}, 
            success:function(result)
            {        
                jQuery('#permanent_barangay_motor_not').empty();
                $('#permanent_barangay_motor_not').append($('<option>', { 
                    value: "",
                    text : "- Select Barangay -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_barangay_motor_not').append($('<option>', { 
                    value: value.barangay,
                    text : value.barangay 
                }));			    	
            })  
                jQuery('#permanent_barangay_motor_not').selectpicker("refresh"); 
            }
        })
    }
});


jQuery('#permanent_municipality_pa').change(function(){
    if(jQuery(this).val() != '')
    {         
        var city = jQuery(this).val();   
        var _token = jQuery('input[name="_token"]').val();
        var url = jQuery('input[name="url"]').val();
        jQuery.ajax({
            url:url + '/api/covid/barangay/get',
            method:"GET",
            data:{ _token:_token,city:city}, 
            success:function(result)
            {        
                jQuery('#permanent_barangay_pa').empty();
                $('#permanent_barangay_pa').append($('<option>', { 
                    value: "",
                    text : "- Select Barangay -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_barangay_pa').append($('<option>', { 
                    value: value.barangay,
                    text : value.barangay 
                }));			    	
            })  
                jQuery('#permanent_barangay_pa').selectpicker("refresh"); 
            }
        })
    }
});

jQuery('#permanent_municipality_pa_view').change(function(){
    if(jQuery(this).val() != '')
    {         
        var city = jQuery(this).val();   
        var _token = jQuery('input[name="_token"]').val();
        var url = jQuery('input[name="url"]').val();
        jQuery.ajax({
            url:url + '/api/covid/barangay/get',
            method:"GET",
            data:{ _token:_token,city:city}, 
            success:function(result)
            {        
                jQuery('#permanent_barangay_pa_view').empty();
                $('#permanent_barangay_pa_view').append($('<option>', { 
                    value: "",
                    text : "- Select Barangay -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_barangay_pa_view').append($('<option>', { 
                    value: value.barangay,
                    text : value.barangay 
                }));			    	
            })  
                jQuery('#permanent_barangay_pa_view').selectpicker("refresh"); 
            }
        })
    }
});

jQuery('#permanent_municipality_property').change(function(){
    if(jQuery(this).val() != '')
    {         
        var city = jQuery(this).val();   
        var _token = jQuery('input[name="_token"]').val();
        var url = jQuery('input[name="url"]').val();
        jQuery.ajax({
            url:url + '/api/covid/barangay/get',
            method:"GET",
            data:{ _token:_token,city:city}, 
            success:function(result)
            {        
                jQuery('#permanent_barangay_property').empty();
                $('#permanent_barangay_property').append($('<option>', { 
                    value: "",
                    text : "- Select Barangay -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_barangay_property').append($('<option>', { 
                    value: value.barangay,
                    text : value.barangay 
                }));			    	
            })  
                jQuery('#permanent_barangay_property').selectpicker("refresh"); 
            }
        })
    }
});

jQuery('#permanent_municipality_property_view').change(function(){
    if(jQuery(this).val() != '')
    {         
        var city = jQuery(this).val();   
        var _token = jQuery('input[name="_token"]').val();
        var url = jQuery('input[name="url"]').val();
        jQuery.ajax({
            url:url + '/api/covid/barangay/get',
            method:"GET",
            data:{ _token:_token,city:city}, 
            success:function(result)
            {        
                jQuery('#permanent_barangay_property_view').empty();
                $('#permanent_barangay_property_view').append($('<option>', { 
                    value: "",
                    text : "- Select Barangay -"
                }));
                jQuery.each(result, function(key, value){
                $('#permanent_barangay_property_view').append($('<option>', { 
                    value: value.barangay,
                    text : value.barangay 
                }));			    	
            })  
                jQuery('#permanent_barangay_property_view').selectpicker("refresh"); 
            }
        })
    }
});




