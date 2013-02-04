/*-----------------------------------------------------------------------------------*/
/*	Begin
/*-----------------------------------------------------------------------------------*/


jQuery(document).ready(function ($) {	  
	  
/*-----------------------------------------------------------------------------------*/
/*	Contact Form
/*-----------------------------------------------------------------------------------*/

	$('.contact form').submit( function(){
		
		var name = $(this).find('.name');
		var email = $(this).find('.email');
		var website = $(this).find('.website');
		var message = $(this).find('.message');
		
		var subject = $(this).attr('data-subject');
		var admin_email = $(this).attr('data-email');
		
		
		if(name.val() == '' || email.val() == '' || message.val() == '' || !validateEmail(email.val())) {
		
			$(this).find('.error').hide(0, function(){
				$(this).fadeIn(200);
			});
		
		} else {
			
			$('.contact form').prepend('<img class="loading" src="'+ $(this).attr('data-loading') +'" alt="Loading…" />');
			
			$.ajax( {
		      url: $(this).attr( 'action' ) + "?ajax=true",
		      type: $(this).attr( 'method' ),
		      data: 'name='+name.val()+'&email='+email.val()+'&website='+website.val()+'&message='+message.val()+'&subject='+subject+'&admin_email='+admin_email,
		      success: submitFinished
		    } );
    
		}
		
		return false;
	});
	
	function validateEmail($email) {
	  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  if( !emailReg.test( $email ) ) {
	    return false;
	  } else {
	    return true;
	  }
	}
	
	function submitFinished( response ) {
	
	  $('.contact form').find('.loading').hide();
		
	  response = $.trim( response );
	  
	  console.log(response);
	 
	  if ( response == "success" ) {
	 
	    // Form submitted successfully:
	    // 1. Display the success message
	    // 2. Clear the form fields
	 
	    $('.contact form').find('.error').hide(0, function(){
			$(this).parent().find('.success').fadeIn(200);
		});
			
		$('.contact form').find('p').fadeOut(200);
	 
	  } else {
	 
	    $('.contact form').find('.error').hide(0, function(){
			$(this).fadeIn(200);
		});
		
	  }
	}
  	

/*-----------------------------------------------------------------------------------*/
/*	The End
/*-----------------------------------------------------------------------------------*/	
	

});