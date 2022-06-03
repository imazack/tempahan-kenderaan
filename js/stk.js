$(document).ready(function(){

    /* borang daftar akaun */

    //Contact Form Submission
	$('#stkcontact').on('submit', function(e){
	
		e.preventDefault();
		
		// $('.has-error').removeClass('has-error');
		// $('.js-show-feedback').removeClass('js-show-feedback');
		
		var form = $(this),
			name 	= form.find('#nama').val(),
			email 	= form.find('#email').val(),
			message = form.find('#noTel').val(),
			ajaxurl = form.data('url');
			
		// if(name === ''){
		// 	$('#name').parent('.form-group').addClass('has-error');
		// 	return;
		// }
		
		// if(email === ''){
		// 	$('#email').parent('.form-group').addClass('has-error');
		// 	return;
		// }
		
		// if(message === ''){
		// 	$('#message').parent('.form-group').addClass('has-error');
		// 	return;
		// }
		
		// form.find('input, button, textarea').attr('disabled', 'disabled');
		// $('.js-form-submission').addClass('js-show-feedback');
		
		$.ajax({
				
			url: ajaxurl,
			type : 'post',
			data : {
				name : nama,
				email : email,
				message : message,
				action : 'stk_save_user_daftar_form'
			},
			error : function(response){
                console.log(response);
				// $('.js-form-submission').removeClass('js-show-feedback');
				// $('.js-form-error').addClass('js-show-feedback');
				// form.find('input, button, textarea').removeAttr('disabled');
			},
			success : function(response){
				if(response == 0){
console.log('berjaya');
					// setTimeout(function(){
					// 	$('.js-form-submission').removeClass('js-show-feedback');
					// 	$('.js-form-error').addClass('js-show-feedback');
					// 	form.find('input, button, textarea').removeAttr('disabled');
					// }, 500);
					
				}else {
                    console.log('berjaya');
					// setTimeout(function(){
					// 	$('.js-form-submission').removeClass('js-show-feedback');
					// 	$('.js-form-success').addClass('js-show-feedback');
					// 	form.find('input, button, textarea').removeAttr('disabled').val('');
					// }, 500);
				}
				
			}
		});
		
	});

});


