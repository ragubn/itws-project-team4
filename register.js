//form validation for register.php

(function($) {
    "use strict";

	// Register Form (code from: http://bootsnipp.com/snippets/featured/custom-login-registration-amp-forgot-password)
	//----------------------------------------------
	// Validation
  $("#register-form").validate({
    //requires username, password, password confirmation, email, full name, and agreement to terms to be filled out
  	rules: {
      username: "required",
  	  reg_password: {
        //password nust be at least 7 characters
  			required: true,
  			minlength: 7
  		},
   		reg_password_confirm: {
        //must be equal to reg_password
  			required: true,
  			minlength: 7,
  			equalTo: "#register-form [name=reg_password]"
  		},
  		reg_email: {
        //must be valid email
  	    required: true,
  			email: true
  		},
      reg_fullname: "required",
  		reg_agree: "required",
    },
	  errorClass: "form-invalid",
	  errorPlacement: function( label, element ) {
  	  label.insertAfter( element ); // standard behaviour
    }
  });


})(jQuery);
