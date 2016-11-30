(function($) {
    "use strict";
	
	// Register Form (code from: http://bootsnipp.com/snippets/featured/custom-login-registration-amp-forgot-password)
	//----------------------------------------------
	// Validation
  $("#register-form").validate({
  	rules: {
      username: "required",
  	  reg_password: {
  			required: true,
  			minlength: 7
  		},
   		reg_password_confirm: {
  			required: true,
  			minlength: 7,
  			equalTo: "#register-form [name=reg_password]"
  		},
  		reg_email: {
  	    required: true,
  			email: true
  		},
  		reg_agree: "required",
    },
	  errorClass: "form-invalid",
	  errorPlacement: function( label, element ) {
	    if( element.attr( "type" ) === "checkbox" || element.attr( "type" ) === "radio" ) {
    		element.parent().append( label ); // this would append the label after all your checkboxes/labels (so the error-label will be the last element in <div class="controls"> )
	    }
			else {
  	  	label.insertAfter( element ); // standard behaviour
  	  }
    }
  });

	
})(jQuery);