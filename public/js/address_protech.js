jQuery('#residence_province').change(function(){
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
		      		jQuery('#residence_municipality').empty();
		      		$('#residence_municipality').append($('<option>', { 
				        value: "",
				        text : "- Select City/Municipality -"
			    	}));
			        jQuery.each(result, function(key, value){
	            	$('#residence_municipality').append($('<option>', { 
				        value: value.city,
				        text : value.city 
			    	}));			    	
	            })  
			        jQuery('#residence_municipality').selectpicker("refresh"); 
		      	}
	    	})
	    }
}); 

jQuery('#mailing_province').change(function(){
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
	      		jQuery('#mailing_municipality').empty();
	      		$('#mailing_municipality').append($('<option>', { 
			        value: "",
			        text : "- Select City/Municipality -"
		    	}));
		        jQuery.each(result, function(key, value){
            	$('#mailing_municipality').append($('<option>', { 
			        value: value.city,
			        text : value.city 
		    	}));			    	
            })  
		        jQuery('#mailing_municipality').selectpicker("refresh"); 
	      	}
    	})
    }
}); 

jQuery('#residence_municipality').change(function(){
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
	      		jQuery('#residence_barangay').empty();
	      		$('#residence_barangay').append($('<option>', { 
			        value: "",
			        text : "- Select Barangay -"
		    	}));
		        jQuery.each(result, function(key, value){
            	$('#residence_barangay').append($('<option>', { 
			        value: value.barangay,
			        text : value.barangay 
		    	}));			    	
            })  
		        jQuery('#residence_barangay').selectpicker("refresh"); 
	      	}
    	})
    }
});

jQuery('#mailing_municipality').change(function(){
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
	      		jQuery('#mailing_barangay').empty();
	      		$('#mailing_barangay').append($('<option>', { 
			        value: "",
			        text : "- Select Barangay -"
		    	}));
		        jQuery.each(result, function(key, value){
            	$('#mailing_barangay').append($('<option>', { 
			        value: value.barangay,
			        text : value.barangay 
		    	}));			    	
            })  
		        jQuery('#mailing_barangay').selectpicker("refresh"); 
	      	}
    	})
    }
}); 

$( "#chckSameAddress" ).click(function() { 
    if (jQuery(this).is(':checked') === true) {
   		var residence_address = jQuery('#residence_address').val();
   		var residence_province = jQuery('#residence_province').val();
   		var residence_municipality = jQuery('#residence_municipality').val();
   		var residence_barangay = jQuery('#residence_barangay').val();


        jQuery('#mailing_address').val(residence_address);   
        $('#mailing_province').append('<option selected value="' + residence_province + '">' + residence_province + '</option>');			
        $('#mailing_municipality').append('<option selected value="' + residence_municipality + '">' + residence_municipality + '</option>');			
        $('#mailing_barangay').append('<option selected value="' + residence_barangay + '">' + residence_barangay + '</option>');			
        jQuery('#mailing_province').selectpicker("refresh"); 
        jQuery('#mailing_municipality').selectpicker("refresh"); 
        jQuery('#mailing_barangay').selectpicker("refresh"); 

  	}else{
        jQuery('#mailing_address').val("");        
        jQuery('#mailing_province').val("");        
        jQuery('#mailing_municipality').val("");        
        jQuery('#mailing_barangay').val("");
             jQuery('#mailing_province').selectpicker("refresh"); 
        jQuery('#mailing_municipality').selectpicker("refresh"); 
        jQuery('#mailing_barangay').selectpicker("refresh");    

  	}         
});

$( "#chckSameAddressLocation" ).click(function() { 
    if (jQuery(this).is(':checked') === true) {
   		var residence_address = jQuery('#residence_address').val();
   		var residence_province = jQuery('#residence_province').val();
   		var residence_municipality = jQuery('#residence_municipality').val();
   		var residence_barangay = jQuery('#residence_barangay').val();


        jQuery('#device_address').val(residence_address);   
        $('#device_province').append('<option selected value="' + residence_province + '">' + residence_province + '</option>');			
        $('#device_municipality').append('<option selected value="' + residence_municipality + '">' + residence_municipality + '</option>');			
        $('#device_barangay').append('<option selected value="' + residence_barangay + '">' + residence_barangay + '</option>');			
        jQuery('#device_province').selectpicker("refresh"); 
        jQuery('#device_municipality').selectpicker("refresh"); 
        jQuery('#device_barangay').selectpicker("refresh"); 

  	}else{
        jQuery('#device_address').val("");        
        jQuery('#device_province').val("");        
        jQuery('#device_municipality').val("");        
        jQuery('#device_barangay').val("");
             jQuery('#device_province').selectpicker("refresh"); 
        jQuery('#device_municipality').selectpicker("refresh"); 
        jQuery('#device_barangay').selectpicker("refresh");    

  	}         
});

jQuery('#device_province').change(function(){
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
	      		jQuery('#device_municipality').empty();
	      		$('#device_municipality').append($('<option>', { 
			        value: "",
			        text : "- Select City/Municipality -"
		    	}));
		        jQuery.each(result, function(key, value){
            	$('#device_municipality').append($('<option>', { 
			        value: value.city,
			        text : value.city 
		    	}));			    	
            })  
		        jQuery('#device_municipality').selectpicker("refresh"); 
	      	}
    	})
    }
}); 

jQuery('#device_municipality').change(function(){
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
	      		jQuery('#device_barangay').empty();
	      		$('#device_barangay').append($('<option>', { 
			        value: "",
			        text : "- Select Barangay -"
		    	}));
		        jQuery.each(result, function(key, value){
            	$('#device_barangay').append($('<option>', { 
			        value: value.barangay,
			        text : value.barangay 
		    	}));			    	
            })  
		        jQuery('#device_barangay').selectpicker("refresh"); 
	      	}
    	})
    }
});