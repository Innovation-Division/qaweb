$("#phone").mask("(999) 999-9999");
	function phoneMaskPHno() {
	  var key = window.event.key;
	  var element = window.event.target;
	  var isAllowed = /\d|Backspace|Tab/;
	  if(!isAllowed.test(key)) window.event.preventDefault();
	  if(element.value.length < 15){
		  var inputValue = element.value;
		  inputValue = inputValue.replace(/\D/g,'');
		  inputValue = inputValue.replace(/(^\d{4})(\d)/,'($1) $2');
		  inputValue = inputValue.replace(/(\d{1,5})(\d{3}$)/,'$1-$2');
		 
		  element.value = inputValue;
	  }
	  
	}

	function noonly() {
	  var key = window.event.key;
	  var element = window.event.target;
	  var isAllowed = /\d|Backspace|Tab/;
	  if(!isAllowed.test(key)) window.event.preventDefault();
		  var inputValue = element.value;		 
		  element.value = inputValue;  
	}

	