$(document).ready(function(){
   $("#registerForm").validate({
			rules: {
			"name": {
				    required:true,
                                       minlength: 3,
					maxlength: 40,
				},
				"password": {
				    required:true,
					minlength: 6,
					passDigitRule: true,
				},
				"confirm_password": {
				   required:true,
				   equalTo: ".password",
				},
				"email":{
				    required:true,
					email: false,
					emailRegex: true,
				}},
 errorElement : 'div',

	messages: {
      "name":{
        required:"Въведете валидно име!",
        minlength: " Tрябва да има поне три символа!",
       maxlength:"Името ви не може да съдържа повече от 30 символа!"

      },		 
     "password": {
        required: "Моля, въведете парола!",
        minlength: "Паролата ви трябва да има поне шест символа!",
		
      },
     "confirm_password":{
        required: "Моля, повторете паролата!",
        minlength: "Паролата ви трябва да има поне шест символа!"
      },
	  "email": {
	  required: "Моля,въведете валиден email адрес!"
    }},		
	
     submitHandler: function(form) {
 if($("#registerForm").valid()==true){
 $("#registerForm").submit();


}

}           
 
});

    
         jQuery.validator.addMethod("emailRegex", function(value, element) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(value);
		}, "Въведете валиден email адрес!");
		jQuery.validator.addMethod("passDigitRule", function(value, element) {
			for (var i = 0; i < value.length; i++) {
				var currentSymbolCode = value[i].charCodeAt();
				var isDigit = (48 <= currentSymbolCode && currentSymbolCode <= 57);
				if(isDigit) {
					return true;
				}
			}
			return false;
		}, "Въведете поне една цифра!");
   })