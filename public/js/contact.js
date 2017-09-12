$(document).ready(function() {
$("#myForm").validate({
			rules: {
				
                "name": {
				    required:true,
                                    minlength: 3,
			            maxlength: 40,
				},
		  "email":{
				    required:true,
				    email: false,
				    emailRegex: true
				},
                  "text":{
                                                required:true,
                                                minlength:10,
                                                maxlength: 200
                                                }
},
				 messages: {
		  "name":{
                                 required: "Моля, въведете име и фамилия!",
                                 minlength: " Tрябва да има поне три символа!",
		                 maxlength:"Името ви не може да съдържа повече от 40 символа!"
      },		 
     
	     "email": {
	         required: "Моля,въведете валиден email адрес!"
    },
                       "text":{
                                
                                 minlength: " Tрябва да има поне десет символа!",
		                 maxlength:"Името ви не може да съдържа повече от 200 символа!"
      },		 
},
	
	success: function(label) {
    label.text("Коректно попълване!");
    },
        
 submitHandler: function(form) {
if($("#myForm").valid()==true){
 $("#myForm").submit();

 }

}        
});
  
         jQuery.validator.addMethod("emailRegex", function(value, element) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(value);
		}, "Въведете валиден email адрес!");
})