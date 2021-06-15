$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#enquiryform').validate({
            rules: {
                uname: {
                    required: true,
                    minlength: 2
                },
                uemail: {
                    required: true,
                    email: true
                },
                uphone: {
                    required: true,
                    minlength: 9
                },
                selectstore: {
                    required: true,
                },
                umessage: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                uname: {
                    required: "Come on, you have a name, don't you?",
                    minlength: "Your name must consist of at least 2 characters"
                },
                email: {
                    required: "No email, no message"
                },
                uphone: {
                    required: "Come on, you have a mobile, don't you?",
                    minlength: "Your mobile no must consist of at least 10 characters"
                },
                selectstore: {
                    required: "Please select store"
                },
                umessage: {
                    required: "Um...yea, you have to write something to send this form.",
                    minlength: "Thats all? really?"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"contact_process.php",
                    success: function() 
                    {
                        $('#enquiryform :input').attr('disabled', 'disabled');
                        $('#enquiryform').fadeTo( "slow", 1, function() 
                        {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');
                        })
                    },
                    error: function() 
                    {
                        $('#enquiryform').fadeTo( "slow", 1, function() 
                        {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})